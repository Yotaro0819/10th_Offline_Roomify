<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;


class PaypalController extends Controller
{
    
public function createPayment()
{
    $provider = new PayPalClient;
    $provider->setApiCredentials(config('paypal'));
    $token = $provider->getAccessToken();
    $provider->setAccessToken($token);

    $response = $provider->createOrder([
        "intent" => "CAPTURE",
        "purchase_units" => [
            [
                "amount" => [
                    "currency_code" => "USD",
                    "value" => "100.00" 
                ]
            ]
        ]
    ]);
    
    if (isset($response['id'])) {
        return redirect()->route('payment.capture', ['token' => $response['id']]);
    } else {
        return back()->with('error', '支払いに失敗しました。');
    }
    
}

public function capturePayment(Request $request)
{
    $provider = new PayPalClient;
    $provider->setApiCredentials(config('paypal'));
    $token = $provider->getAccessToken(); // アクセストークンの取得
    $provider->setAccessToken($token);

    // リダイレクトURLからtoken（注文ID）を取得
    $orderId = $request->query('token');  // PayPalからのトークンを受け取る

    // 注文ID（$orderId）を使用して支払い確認

    $response = $provider->confirmOrder($orderId, $additionalParam); // 注文IDを渡す

    if ($response['status'] == 'COMPLETED') {
        return view('payment.success'); // 支払い完了画面
    } else {
        return back()->with('error', '支払いに失敗しました。');
    }
}


}
