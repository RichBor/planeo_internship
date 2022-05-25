<?php
session_start();


//Connection
$db_host = 'dev.internship.com';
$db_username = 'root';
$db_password = 'Password1';
$db_name = 'internship';

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

$_SESSION["regEmail"] = $_SESSION["regUsername"] = "";
$_SESSION["regEmailErr"] = $_SESSION["regUsernameErr"] = $_SESSION["regPasswordErr"] = "";
$regPassword = $confirmregPassword = $regPassword_hash = "";
$_SESSION["confirmRegistration"] = "";
$break = false;

//FORM DATA


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["username"])) {
        $_SESSION["regUsernameErr"] = "Username fehlt!";
        $break = true;
    } else {
        //Ist der Username schon vergeben?
        $statement = $conn->prepare("SELECT Username FROM users WHERE Username = " . $_POST['username'] . " ");
        $user = $statement->fetch();
        if ($user !== false) {
            $_SESSION["regUsernameErr"] = "Dieser Username ist bereits registriert!";
            $break = true;
        } else {
            $_SESSION["regUsername"] = test_input($_POST["username"]);
        }
    }

    //Ist die Email gültig?
    if (empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $_SESSION["regEmailErr"] = "Email fehlt oder ungültige Email!";
        $break = true;
        echo "1";
    } else {
        //Ist die Email schon vergeben?
        $statement = $conn->prepare("SELECT email FROM users WHERE email = " . $_POST['email'] . " ");
        $user = $statement->fetch();
        if ($user !== false) {
            $_SESSION["regEmailErr"] = "Diese Email-Adresse ist bereits registriert!";
            echo "2";

            $break = true;
        } else {
            $_SESSION["regEmail"] = test_input(["email"]);
        }
    }

    if (empty($_POST["regPassword"])) {
        $_SESSION["regPasswordErr"] = "Passwort fehlt!";
        $break = true;
        echo "3";

    } else {
        if (strcmp($regPassword, $confirmregPassword) !== 0) {
            //Stimmen die Passwörter überein?
            $_SESSION["regPasswordErr"] = "Die Passwörter stimmen nicht überein!";
            $break = true;

        } else {
            //Passwort wird verschlüsselt
            $regPassword_hash = password_hash($regPassword, PASSWORD_DEFAULT);
        }
    }

}

//Register User

