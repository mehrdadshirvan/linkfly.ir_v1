<?php

use Illuminate\Http\JsonResponse;

function response_true($result = NULL, $message = NULL)
{
    return new JsonResponse(
        [
            'data' => $result,
            'status' => 'Success',
            'message' => $message,
        ]
    );
}


function response_false($errors = NULL, $message = Null, $code = 422)
{
    $message = !empty($message) ? $message : __("Your data is not validated correctly");
    return new JsonResponse(
        [
            'status' => 'Error',
            'message' => $message,
            'errors' => $errors,
        ],
        $code);
}


function curlGet($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Accept: application/json'
    ]);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    $data = json_decode($response, true);

    return ['data' => $data,'status_code' => $httpCode];
}
