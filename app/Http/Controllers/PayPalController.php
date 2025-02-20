<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Accommodation;

class PaypalController extends Controller
{

public function createPayment(Request $request, $accommodation_id)
{
    try {
    $provider = new PayPalClient;
    $provider->setApiCredentials(config('paypal'));
    $token = $provider->getAccessToken();
    $provider->setAccessToken($token);
    $total_fee = session()->get('total_fee');
    $accommodation = Accommodation::findOrFail($accommodation_id);

    $request->validate([
        'check_in_date'     => 'required|date|after_or_equal:today',
        'check_out_date'    => 'required|date|after:check_in_date',
        'num_guest'         => [
                                'required',
                                'integer',
                                'min:1',
                                'max:' . $accommodation->capacity
                                ],
        'guest_name'        => 'required|string|max:50',
        'guest_email'             => 'required|email',
        'special_request'   => 'nullable|max:500',
    ]);

    $response = $provider->createOrder([
        "intent" => "CAPTURE",
        "application_context" => [
            "return_url" => route('paypal.capture', ['id' => $accommodation_id]),
            "cancel_url" => route('paypal.cancel')
        ],
        "purchase_units" => [
            [
                "amount" => [
                    "currency_code" => "USD",
                    "value" => $total_fee
                ]
            ]
        ]
    ]);

    if(isset($response["id"]) && $response['id'] != null){
    foreach ($response['links'] as $link){
        if($link['rel'] == 'approve') {
            session()->put('accommodation_id', $accommodation_id);
            session()->put('payment_info', $request->all());
            return redirect()->away($link['href']);
        }
    }
    }else {
        return redirect()->route('paypal.cancel');
    }
}catch(\Exception $e) {
    return redirect()->route('home');
}
}

public function capturePayment(Request $request)
{
    $provider = new PayPalClient;
    $provider->setApiCredentials(config('paypal'));
    $provider->getAccessToken();
    $response = $provider->capturePaymentOrder($request->token);

    if(isset($response['status']) && $response['status'] == 'COMPLETED'){

    $accommodation_id = session()->get('accommodation_id');
    $booking_info = session()->get('payment_info');

    $accommodation = Accommodation::findOrFail($accommodation_id);

    $payment = new Payment;
    $payment->payment_id = $response['id'];
    $payment->amount = $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'];
    $payment->payment_method = "PayPal";
    $payment->accommodation_id = (int) $accommodation_id;
    $payment->user_id = Auth::user()->id;
    $payment->save();

    $booking = new Booking;
    $booking->guest_id         = Auth::user()->id;
    $booking->guest_name       = $booking_info['guest_name'];
    $booking->host_id          = $accommodation->user->id;
    $booking->accommodation_id = $accommodation->id;
    $booking->check_in_date    = $booking_info['check_in_date'];
    $booking->check_out_date   = $booking_info['check_out_date'];
    $booking->host_name        = $accommodation->user->name;
    $booking->num_guest        = intval($booking_info['num_guest']);;
    $booking->guest_email      = $booking_info['guest_email'];
    $booking->special_request  = $booking_info['special_request'];
    $booking->save();

    // $coupon = new Coupon;
    // $coupon =$this->coupon->findOrFail($request->coupon_id);
    // $coupon->delete();

    session()->forget('payment_info');

    return redirect()->route('paypal.complete');

    }else{
        return redirect()->route('paypal.cancel');
    }
}

public function Cancel()
{
    $accommodation_id = session()->get('accommodation_id');

    session()->forget('payment_info');

    return view('paypal.paypal_cancel', compact('accommodation_id'));
}

public function Complete()
{
    session()->forget('accommodation_id');

    return view('paypal.complete_payment');
}

}
