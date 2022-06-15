<?php
session_start();



if (isset($_GET['dogselect'])) {

    $ch= curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://dog.ceo/api/breeds/image/random');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_response = curl_exec($ch);

    curl_close($ch);

    $server_response = json_decode($server_response, true);


    if($server_response["status"]=="success") {
        $_SESSION['img']=$server_response["message"];
    }
    header("Location: ../index.php?s=dog");
}