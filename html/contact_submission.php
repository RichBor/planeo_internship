<?php

//Form Data

$name = $_POST['name'];
$vorname = $_POST['vorname'];
$email = $_POST['email'];
$nachricht = $_POST['nachricht'];

// Connection

$db_host = 'dev.internship.com';
$db_username = 'root';
$db_password = 'Password1';
$db_name = 'internship';

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

if($conn->connect_error) {
    die("Connection Failed: "
        . $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into contact(name, vorname, email, nachricht) 
                                    VALUES(?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $vorname, $email, $nachricht);
    $stmt->execute();
    header("Location: contact.html");
}