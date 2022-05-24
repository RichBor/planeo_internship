<?php

session_start();

$_SESSION["name"] = $_SESSION["vorname"] = $_SESSION["email"] = $_SESSION["nachricht"] = "";
$_SESSION["nameErr"] = $_SESSION["vornameErr"] = $_SESSION["emailErr"] = $_SESSION["nachrichtErr"] = "";
$break = false;

//Form Data wird bearbeitet um Angriffe zu verhindern

    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//Form Data

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(empty($_POST["name"])) {
        $_SESSION["nameErr"] = "Name fehlt!";
        $break = true;
    } else {
        $_SESSION["name"] = test_input($_POST["name"]);
    }

    if(empty($_POST["vorname"])) {
        $_SESSION["vornameErr"] = "Vorname fehlt!";
        $break = true;
    } else {
        $_SESSION["vorname"] = test_input($_POST["vorname"]);
    }

    if(empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $_SESSION["emailErr"] = "Email fehlt oder ungültige Email!";
        $break = true;
    } else {
        $_SESSION["email"] = test_input($_POST["email"]);
    }

    if(empty($_POST["nachricht"])) {
        $_SESSION["nachrichtErr"] = "Nachricht fehlt!";
        $break = true;
    } else {
        $_SESSION["nachricht"] = test_input($_POST["nachricht"]);
    }

}

// Connection

$db_host = 'dev.internship.com';
$db_username = 'root';
$db_password = 'Password1';
$db_name = 'internship';

if(!$break) {
    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

    if ($conn->connect_error) {
        die("Connection Failed: "
            . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("insert into contact(name, vorname, email, nachricht) 
                                        VALUES(?, ?, ?, ?)");
        $stmt->bind_param("ssss", $_SESSION["name"], $_SESSION["vorname"], $_SESSION["email"], $_SESSION["nachricht"]);
        $stmt->execute();
        $_SESSION["name"] = $_SESSION["vorname"] = $_SESSION["email"] = $_SESSION["nachricht"] = "";
        $_SESSION["nameErr"] = $_SESSION["vornameErr"] = $_SESSION["emailErr"] = $_SESSION["nachrichtErr"] = "";
    }
}

header("Location: ../index.php?s=contact");