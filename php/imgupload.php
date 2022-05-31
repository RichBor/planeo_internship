<?php
session_start();

function getID(){
    //Connection

    $db_host = 'dev.internship.com';
    $db_username = 'root';
    $db_password = 'Password1';
    $db_name = 'internship';

    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);


    //get ID

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

$db_host = 'dev.internship.com';
$db_username = 'root';
$db_password = 'Password1';
$db_name = 'internship';

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

$_SESSION['uploadErr'] = "";

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $img = $_FILES['img'];

    $imgName = $_FILES['img']['name'];
    $imgTmpName = $_FILES['img']['tmp_name'];
    $imgSize = $_FILES['img']['size'];
    $imgError = $_FILES['img']['error'];

    $imgExt = explode('.', $imgName);
    $imgActualExt = strtolower(end($imgExt));

    $allowed = array('jpg', 'jpeg', 'png');
    if(!empty($imgName)) {
        if (in_array($imgActualExt, $allowed)) {
            if ($imgError === 0) {

                $imgNameNew = "profile" . getID() . "." . $imgActualExt;
                $imgDestination = "../profileimgs/" . $imgNameNew;
                echo '<pre>';
                var_dump(move_uploaded_file($imgTmpName, $imgDestination));
                move_uploaded_file($imgTmpName, $imgDestination);

                $sql = "UPDATE profileimg SET status=1 WHERE f_UID= '" . getID() . "' ";
                mysqli_query($conn, $sql);
                $sql = "UPDATE profileimg SET path='" . $imgNameNew . "' WHERE f_UID= '" . getID() . "' ";
                mysqli_query($conn, $sql);
                header("Location: ../index.php?uploadsuccess");
            } else {
                $_SESSION['uploadErr'] = "There was an Error!";
            }
        } else {
            $_SESSION['uploadErr'] = "Not allowed filetype. Allowed types: jpeg, jpg, png";
        }
    } else {
        $_SESSION['uploadErr']= "Nothing to upload!";
    }
}

header("Location: ../index.php");