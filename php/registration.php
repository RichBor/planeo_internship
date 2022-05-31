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
$regPassword_hash = "";
$_SESSION["confirmRegistration"] = "";
$break = false;

//Security check

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//FORM DATA

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["username"])) {
        $_SESSION["regUsernameErr"] = "Username fehlt!";
        $break = true;
    } else {
        //Ist der Username schon vergeben?
        $statement = $conn->prepare("SELECT Username FROM users WHERE Username = ?");
        $sql = "SELECT Username FROM users WHERE Username = '" . $_POST['username'] . "'";
        $result = $conn->query($sql);
        if (mysqli_num_rows($result) != 0) {
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
        $sql = "SELECT Email FROM users WHERE Email = '" . $_POST['email'] . "'";
        $result = $conn->query($sql);
        if (mysqli_num_rows($result) != 0) {
            $_SESSION["regEmailErr"] = "Diese Email-Adresse ist bereits registriert!";
            $break = true;
        } else {
            $_SESSION["regEmail"] = test_input($_POST["email"]);
        }
    }

    if (empty($_POST["password"])) {
        $_SESSION["regPasswordErr"] = "Passwort fehlt!";
        $break = true;
    } else {
        if ($_POST["password"] !== $_POST["confirmpassword"]) {
            //Stimmen die Passwörter überein?
            $_SESSION["regPasswordErr"] = "Die Passwörter stimmen nicht überein!";
            $break = true;
        } else {
            //Passwort wird verschlüsselt
            $regPassword_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
        }
    }

}

//Register User

if (!$break) {

    if ($conn->connect_error) {
        die("Connection Failed: "
            . $conn->connect_error);
    }
    $regUsername = $_SESSION["regUsername"];
    $regEmail = $_SESSION["regEmail"];
    $timestamp = date("y.m.d");
    $sql = "INSERT INTO users (Username, Email, Password, registriert_am) VALUES ('$regUsername','$regEmail','$regPassword_hash','$timestamp')";
    $result = $conn->query($sql);
    //get user id
    $user="'".$_SESSION['regUsername']."'";
    $sql = "SELECT p_uID FROM users WHERE Username LIKE ".$user;
    $resultgetID=mysqli_query($conn, $sql);
    $rowgetID=mysqli_fetch_assoc($resultgetID);
    $id=$rowgetID['p_uID'];
    //insert default value for profile img
    $sql="INSERT INTO profileimg (f_UID, status) VALUES ($id, 0)";
    mysqli_query($conn, $sql);


    $_SESSION["confirmRegistration"] = "Registrierung erfolgreich! Sie können sich jetzt einloggen.";

    $_SESSION["regEmailErr"] = $_SESSION["regUsernameErr"] = $_SESSION["regPasswordErr"] = "";
    $_SESSION["regEmail"] = $_SESSION["regUsername"] = "";
}

//Head back to Registerpage

header("Location: ../?register=1");
