<?php

use GuzzleHttp\Client;

function sendOtpSms($phoneNumber,$otpCode)
{

    // return "SayHello";

    // $apiKey = env('SMS_GATEWAY_PROVIDER_API_KEY');
    // $client = new Client();
    // $response = $client->request('GET', 'https://sms-gateway-provider.com/send', [
        $data = [
            // 'apiKey' => $apiKey,
            'phoneNumber' => $phoneNumber,
            'message' => "Your OTP code is". $otpCode
        ];
        return response()->json([
            'status' => 200,
            'message' => 'Rider Updated successfully',
            'data' => $data,
            // 'image_url' => url(asset('admin/uploads/Driver')),
        ],200);
}
