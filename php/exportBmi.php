<?php

function getuID(){
    //get ID
    $db_host = 'db';
    $db_username = 'root';
    $db_password = 'Password1';
    $db_name = 'internship';

    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

    $user="'".$_COOKIE['user']."'";
    $sql = "SELECT p_uID FROM users WHERE Username LIKE ".$user;

    $resultgetID = mysqli_query($conn, $sql);

    if(mysqli_num_rows($resultgetID) >0) {
        $rowgetID = mysqli_fetch_assoc($resultgetID);
        $id=$rowgetID['p_uID'];
    } else {
        return "error";
    }
    return $id;
}

//Connection
$db_host = 'db';
$db_username = 'root';
$db_password = 'Password1';
$db_name = 'internship';

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);


if (isset($_POST['csv'])) {
    $id = "'" . getuID() . "'";
    $sql = "SELECT p_bID AS EintragsID, height AS Größe, weight AS Gewicht, bmi AS BMI, DATE_FORMAT(insertdate, '%d.%m.%Y') AS Eintragsdatum FROM bmirechner WHERE f_uID=$id ORDER BY p_bID DESC";
    $result=mysqli_query($conn, $sql);

    header("Content-Type: application/octet-stream");
    header("Content-Transfer-Encoding: Binary");
    header("Content-disposition: attachment; filename=\"bmi-export.csv\"");

    echo implode(",", ["EintragsID", "Größe", "Gewicht", "BMI", "Eintragsdatum"]);
    echo "\r\n";
    echo "\r\n";
    while($row=mysqli_fetch_assoc($result)) {
        /*
        echo $row["EintragsID"]." ";
        echo $row["Größe"]." ";
        echo $row["Gewicht"]." ";
        echo $row["BMI"]." ";
        echo $row["Eintragsdatum"]." ";
        */
        echo implode(",", [$row["EintragsID"], $row["Größe"], $row["Gewicht"], $row["BMI"], $row["Eintragsdatum"]]);
        echo "\r\n";
    }
    echo "\r\n";
}
