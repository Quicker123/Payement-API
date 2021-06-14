<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request)
    {

        $args = array('token' => $request->trans_token, 'amount' => $request->amount);

        $url = "https://khalti.com/api/v2/payment/verify/";

        # Make the call using API.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $headers = ['Authorization: Key test_secret_key_15eb057a7a704c0f8c8cfdda6ab51573'];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);

        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        $res = json_decode($response, true);

        return response()->json(['responsedArray'=>$res]);
    }
}

// $args = array('token' => $request->trans_token, 'amount' => $request->amount);
        // $url = "https://khalti.com/api/v2/payment/verify/"; 
        // $ch = curl_init();
        //     curl_setopt($ch, CURLOPT_URL, $url);
        //     curl_setopt($ch, CURLOPT_POST, 1);
        //     curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
        //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        //     $headers = ['Authorization: Key test_secret_key_15eb057a7a704c0f8c8cfdda6ab51573'];

        //     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        //     $response = curl_exec($ch);

        //     $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        //     curl_close($ch);

        //     $res = json_decode($response, true);

        //     return response()->json(['responseArray'=>$res]);