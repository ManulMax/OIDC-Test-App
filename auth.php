<?php
require 'vendor/autoload.php';

if (isset($_POST['google'])) {
    
    $clientId = '445659888050-a0n4aisrubg8l4gsb35si9gni9l6t0hn.apps.googleusercontent.com';
    $clientSecret = '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';

    // Scopes need to define according to the access level need. Get Id token and email of user 
    $scopes = ['openid', 'email'];

    $redirectUri = 'http://localhost:8000/callback.php';

    // OAuth 2.0 authorization URL
    $authUrl = 'https://accounts.google.com/o/oauth2/auth?' .
        'client_id=' . $clientId .
        '&redirect_uri=' . urlencode($redirectUri) .
        '&scope=' . urlencode(implode(' ', $scopes)) .
        '&response_type=code' .
        '&access_type=offline';

    header('Location: ' . $authUrl);
    exit;
}
if (isset($_POST['github'])) {
    $clientId = 'ba6d80e45e8180569fcf';
    $clientSecret = '8eb7bc6e511e92600055971228a78a6a40ae7b2f';

    $scopes = ['user', 'email'];

    $redirectUri = 'http://localhost:8000/callback.php';

    // GitHub OAuth 2.0 authorization URL.
    $authUrl = 'https://github.com/login/oauth/authorize?' .
        'client_id=' . $clientId .
        '&redirect_uri=' . urlencode($redirectUri) .
        '&scope=' . urlencode(implode(' ', $scopes));

    header('Location: ' . $authUrl);
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
        button {
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
        }
        button img {
            width: 15rem;
        }
    </style>
</head>
<body>
    <form method="post" action="auth.php">
        <button type="submit" name="google">
            <img src="./src/img/google.png" alt="">
        </button>
        <br/>
        <button type="submit" name="github">
            <img src="./src/img/github.png" alt="">
        </button>
    </form>
</body>
</html>
