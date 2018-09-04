<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstaController extends Controller
{   
    public function getCheckout(){
        return view('checkout');
    }
    
    public function postCheckout(Request $request){
        $ch = curl_init();
        
        
        curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["X-Api-Key:test_d15d61868718d34f1ff2921e377", "X-Auth-Token:test_e2b004847eef5d5e5938f35a399"]);
        $payload = Array(
            'purpose' =>    $request->purpose,
            'amount' =>     $request->amount,
            'phone' =>      $request->phone,
            'buyer_name' => $request->username,
            'redirect_url' => 'http://pay-insta.com/redirect',
            'send_email' => false,
            'webhook' => 'http://pay-insta.com/webhook',
            'send_sms' => false,
            'email' => $request->email,
            'allow_repeated_payments' => false
        );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch); 

        $data = json_decode($response, true);
        return redirect($data['payment_request']['longurl']);
        // echo $response;
    }

    public function instaRedirect(Request $request){
        return $request->all();
    }
}
