<?php
require base_path('vendor/autoload.php');

use GuzzleHttp\Client;
use core\Investment;

// Get query params
$userId  = $_GET['user_id'] ?? null;
$amount  = $_GET['amount'] ?? null;
$orderId = $_GET['token'] ?? null;

if (!$userId || !$amount || !$orderId) {
    die("Missing parameters.");
}

// PayPal sandbox credentials
$clientId = 'ASX3_SGI8nSp7oGKJz5q3VFduB6To_FUSVH7rdeePRitKXwJp_Y9I1OfDFFt4jP4xkn1Vh6gudBTwmdp';
$secret   = 'EFo_8VlmAqC4D0izjhImwYOsxHArjlsVo361Qz84PM3ghJWiLZBehaDBx1D6kLRHEJ7ZC1nw9l49PmmW';

$client = new Client();

try {
    // Step 1: Get access token
    $authResponse = $client->post('https://api-m.sandbox.paypal.com/v1/oauth2/token', [
        'auth' => [$clientId, $secret],
        'form_params' => ['grant_type' => 'client_credentials'],
        'headers' => [
            'Accept' => 'application/json',
            'Accept-Language' => 'en_US',
        ],
    ]);

    $authData = json_decode($authResponse->getBody(), true);
    $accessToken = $authData['access_token'];

    // Step 2: Capture the payment
    $captureResponse = $client->post("https://api-m.sandbox.paypal.com/v2/checkout/orders/{$orderId}/capture", [
        'headers' => [
            'Authorization' => "Bearer $accessToken",
            'Content-Type' => 'application/json'
        ]
    ]);

    $captureData = json_decode($captureResponse->getBody(), true);

    if (($captureData['status'] ?? '') === 'COMPLETED') {
        $transactionId = $captureData['purchase_units'][0]['payments']['captures'][0]['id'] ?? 'unknown';

      
        Investment::markAsCompleted($userId, $amount, $transactionId);

        echo " Payment successful!<br>Transaction ID: $transactionId";
        sleep(10);
        redirect('/manage');
        // Redirect to success page or show receipt
    } else {
        echo " Payment failed.<br>";
        echo "<pre>";
        print_r($captureData);
        echo "</pre>";
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
