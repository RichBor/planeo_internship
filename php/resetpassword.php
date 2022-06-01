<?php
session_start();

//Connection

$db_host = 'dev.internship.com';
$db_username = 'root';
$db_password = 'Password1';
$db_name = 'internship';

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

$_SESSION['oldpasswordErr'] = $_SESSION['newpasswordErr'] = $_SESSION['confirmReset'] = "";
$newpasswordhash="";

if($_SERVER["REQUEST_METHOD"]=="POST") {

    if(!empty($_POST["oldpassword"])) {
        $sql = "SELECT Password FROM users WHERE Username = '" . $_COOKIE['user'] . "'";
        $result = mysqli_query($conn, $sql);
        $row=mysqli_fetch_assoc($result);

        if(!empty($_POST['newpassword'])) {
            if ($_POST['newpassword'] == $_POST['newpasswordconfirm']) {
                if (password_verify($_POST['oldpassword'], $row['Password'])) {
                    $newpasswordhash = "'" . password_hash($_POST['newpassword'], PASSWORD_DEFAULT) . "'";
                    $sql = "UPDATE users SET Password=$newpasswordhash WHERE Username = '" . $_COOKIE['user'] . "'";
                    mysqli_query($conn, $sql);
                    $_SESSION['confirmReset'] = "Passwort erfolgreich geändert!";
                } else {
                    $_SESSION['oldpasswordErr'] = "Altes Passwort stimmt nicht mit dem aus der Datenbank überein!";
                }
            } else {
                $_SESSION['newpasswordErr'] = "neue Passwörter stimmen nicht überein!";
            }
        } else {
            $_SESSION['newpasswordErr'] = "neues Passwort ist leer!";
        }
    } else {
        $_SESSION['oldpasswordErr'] = "Altes Passwort fehlt oder stimmt nicht!";
    }

}

header("Location: ../index.php?s=settings");
