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
$clientId = 'AY79nsNNRpxd12yPlHnvrCP-nCfP1IoQbHSs-RDN0EFqzUBv983lU7cvN9o0zY95szbUZybc_o0E1_jR';
$secret   = 'EIAeCC2UPWRROzasD3Gh2cShP7hPC1NYTFpWUpD-SfxT2PrG7NBguErMRB_l5CNh1q52Q7rMnMkJvdmf';

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

        // Mark investment complete
        Investment::markAsCompleted($userId, $amount, $transactionId);

        echo "✅ Payment successful!<br>Transaction ID: $transactionId";
        // Redirect to success page or show receipt
    } else {
        echo "❌ Payment failed.<br>";
        echo "<pre>";
        print_r($captureData);
        echo "</pre>";
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
