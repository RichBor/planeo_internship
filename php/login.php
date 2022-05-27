<?php

session_start();

//Connection

$db_host = 'dev.internship.com';
$db_username = 'root';
$db_password = 'Password1';
$db_name = 'internship';

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

$logPassword = $_SESSION["logUsername"] = "";
$_SESSION ["logUsernameErr"] = $_SESSION ["logPasswordErr"] = "";
$_SESSION["confirmLogin"] = "";
$db_hash_password = "";

$break = false;

//Security check

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//Form Data

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(empty($_POST["username"])) {
        $_SESSION["logUsernameErr"] = "Username fehlt!";
        $break = true;
    } else {
        $sql = "SELECT Username FROM users WHERE Username = '" . $_POST['username'] . "'";
        $result = $conn->query($sql);
        if (mysqli_num_rows($result) == 0) {
            $_SESSION["logUsernameErr"] = "Diesen Usernamen gibt es nicht!";
            $break = true;
        } else {
            $_SESSION["logUsername"] = test_input($_POST["username"]);

            if(empty($_POST["password"])) {
                $_SESSION["logPasswordErr"] = "Password fehlt!";
                $break=true;
            } else {

                $sql = "SELECT Password FROM users WHERE Username = '" . $_SESSION['logUsername'] . "'";
                $result = $conn->query($sql);
                $db_hash_password = mysqli_fetch_row($result);

                if(!password_verify($_POST["password"], $db_hash_password[0])) {
                    $_SESSION["logPasswordErr"] = "Passwort stimmt nicht überein!";
                } else {
                    $_SESSION["confirmLogin"] = "Sie sind erfolgreich eingeloggt!";
                    setcookie("user", $_SESSION["logUsername"], time() + (86400*30), "/");
                }

            }

        }

    }

}

header("Location: ../?login=1");
