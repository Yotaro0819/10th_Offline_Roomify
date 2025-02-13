<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class PaypalController extends Controller
{

public function createPayment(Request $request, $accommodation_id)
{
    $provider = new PayPalClient;
    $provider->setApiCredentials(config('paypal'));
    $token = $provider->getAccessToken();
    $provider->setAccessToken($token);

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
                    "value" => "100.00" 
                ]
            ]
        ]
    ]);

//  dd($response);
    if(isset($response["id"]) && $response['id'] != null){
    foreach ($response['links'] as $link){
        if($link['rel'] == 'approve') {
            // session() ->put('product_name', $request->product_name);
            // session() ->put('quantity', $request->quantity);
            session()->put('accommodation_id', $accommodation_id);
            session()->put('payment_info', $request->all());
            
            // dd(session()->get('accommodation_id'));
            return redirect()->away($link['href']);
        }
    }
    }else {
        return redirect()->route(paypal.cancel);
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

    // dd('Accommodation ID: ' . $accommodation_id);
    
    

    $payment = new Payment;
    $payment->payment_id = $response['id'];
    $payment->amount = $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'];
    $payment->payment_method = "PayPal";
    // $payment->accommodation_id = session()->get('accommodation_id');
    $payment->accommodation_id = (int) $accommodation_id; 
    $payment->user_id = Auth::user()->id;
    $payment->save();

    return redirect()->route('guest.booking.store', $accommodation_id);
    }else{
        return redirect()->route('bookingcansel');
    }
}

public function Cancel()
{
    return view('paypal_cancel');
}

}
