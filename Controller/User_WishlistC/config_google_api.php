<?php

    require ("google_api/vendor/autoload.php");

$google_client = new google_client();
$guzzleClient = new \GuzzleHttp\Client(["curl" => [
            CURLOPT_SSL_VERIFYPEER => false
        ]]);    
        $google_client->setHttpClient($guzzleClient);
    $google_client->setClientId("1000027183602-hkv9k9337618tf0i29m97aotilrnlv0u.apps.googleusercontent.com");
    $google_client->setClientSecret("-ZpfoRfFAzIdBpiuQLHMJexE");
    $google_client->setRedirectUri('http://localhost:7882/Naturimal/Controller/User_WishlistC/google_callback.php');
    $google_client->setAccessType('offline');
    $google_client->addScope("email");
    $google_client->addScope("profile");


?>