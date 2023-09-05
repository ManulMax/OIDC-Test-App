<?php
require 'vendor/autoload.php';

use Google_Client;
// use Google_Service_Oauth2;

$clientId = '445659888050-a0n4aisrubg8l4gsb35si9gni9l6t0hn.apps.googleusercontent.com';
$clientSecret = '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';

$redirectUri = 'http://localhost:8000/callback.php';

$client = new Google_Client();
$client->setClientId($clientId);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);

// $oauth2 = new Google_Service_Oauth2($client);

// Handle the callback from Google.
if (isset($_GET['code'])) {
    $code = $_GET['code'];

    // Exchange the authorization code for an access token.
    $client->authenticate($code);

    // Get the access token.
    $accessToken = $client->getAccessToken();

    // Use $accessToken['id_token'] to access the ID token.
    $idToken = $accessToken['id_token'];

    echo 'ID Token: ' . $idToken . '<br>';
    echo '<br>';

    echo 'Access token: ' . json_encode($accessToken) . '<br>';
    echo '<br>';

    // $userInfo = $oauth2->userinfo->get();
    // echo 'User Info: ' . json_encode($userInfo) . '<br>';
} else {
    echo 'Error: No code parameter in the URL.';
}


// Handle the callback from GitHub

?>