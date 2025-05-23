<?php
use core\App;
use core\Database;
use core\Authenticator;
use core\Investment;
use GuzzleHttp\Client;

require base_path('vendor/autoload.php');

$db = App::resolve(Database::class);
$auth = new Authenticator();

$userId = 12; // Example user
$amount = $_POST['amount'] ?? null;

if (!$amount || !is_numeric($amount) || $amount <= 0) {
    die("Invalid amount.");
}

// Save investment (optional here, can wait until capture)
Investment::create($userId, $amount);

// PayPal sandbox credentials
$clientId = 'ASX3_SGI8nSp7oGKJz5q3VFduB6To_FUSVH7rdeePRitKXwJp_Y9I1OfDFFt4jP4xkn1Vh6gudBTwmdp';
$secret   = 'EFo_8VlmAqC4D0izjhImwYOsxHArjlsVo361Qz84PM3ghJWiLZBehaDBx1D6kLRHEJ7ZC1nw9l49PmmW';

$http = new Client();

try {
    // Step 1: Get access token
    $authResponse = $http->post('https://api-m.sandbox.paypal.com/v1/oauth2/token', [
        'auth' => [$clientId, $secret],
        'form_params' => ['grant_type' => 'client_credentials'],
        'headers' => [
            'Accept' => 'application/json',
            'Accept-Language' => 'en_US',
        ],
    ]);

    $authData = json_decode($authResponse->getBody(), true);
    $accessToken = $authData['access_token'];
           
    // Step 2: Create the PayPal order
    $orderResponse = $http->post('https://api-m.sandbox.paypal.com/v2/checkout/orders', [
        'headers' => [
            'Authorization' => "Bearer $accessToken",
            'Content-Type' => 'application/json',
        ],
        'json' => [
            'intent' => 'CAPTURE',
            'purchase_units' => [[
                'amount' => [
                    'currency_code' => 'USD',
                    'value' => $amount
                ]
            ]],
            'application_context' => [
                'return_url' => "http://localhost/captureorder?user_id=$userId&amount=$amount",
                'cancel_url' => "http://localhost/cancel"
            ]
        ]
    ]);

    $orderData = json_decode($orderResponse->getBody(), true);
    dd($orderData);
    foreach ($orderData['links'] as $link) {
        if ($link['rel'] === 'approve') {
            header("Location: " . $link['href']);
            exit;
        }
    }

    echo "Approval link not found.";
} catch (Exception $e) {
    echo "Order creation failed: " . $e->getMessage();
}
