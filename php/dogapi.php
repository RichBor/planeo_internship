<?php
session_start();

if (isset($_GET['dogselect'])) {
    if ($_GET['dogselect'] == "random") {
        $dog_url="https://dog.ceo/api/breeds/image/random";
    } else {
        $dog_url="https://dog.ceo/api/breed/".$_GET['dogselect']."/images/random";
    }
    $dog_json = file_get_contents($dog_url);
    $dog = json_decode($dog_json, true);

    if($dog["status"]=="success") {
        $_SESSION['img']=$dog["message"];
    }
    header("Location: ../index.php?s=dog");
}
