<?php

include "config.php";

$url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";

$credentials = base64_encode(CONSUMER_KEY . ":" . CONSUMER_SECRET);

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Basic " . $credentials,
    "Accept: application/json"
]);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);

$response = curl_exec($ch);

echo "<h2>cURL Error Number:</h2>";
echo curl_errno($ch);

echo "<h2>cURL Error:</h2>";
echo curl_error($ch);

echo "<h2>HTTP Status:</h2>";
echo curl_getinfo($ch, CURLINFO_HTTP_CODE);

echo "<h2>Response:</h2>";
echo "<pre>";
var_dump($response);
echo "</pre>";

curl_close($ch);

?>