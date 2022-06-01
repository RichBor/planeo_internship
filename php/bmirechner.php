<?php

function getuID(){
    //get ID
    $db_host = 'dev.internship.com';
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

function getHeight() {
    //Connection
    $db_host = 'dev.internship.com';
    $db_username = 'root';
    $db_password = 'Password1';
    $db_name = 'internship';

    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

    $id="'".getuID()."'";

    $sql="SELECT height FROM bmirechner WHERE f_uID=$id";
    $result=mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);

    if(!empty($row["height"])) {
        return $row["height"];
    } else {
        return "";
    }
}

function getWeight() {
    //Connection
    $db_host = 'dev.internship.com';
    $db_username = 'root';
    $db_password = 'Password1';
    $db_name = 'internship';

    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

    $id="'".getuID()."'";

    $sql="SELECT weight FROM bmirechner WHERE f_uID=$id";
    $result=mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);

    if(!empty($row["weight"])) {
        return $row["weight"];
    } else {
        return "";
    }
}

function getBMI() {
    //Connection
    $db_host = 'dev.internship.com';
    $db_username = 'root';
    $db_password = 'Password1';
    $db_name = 'internship';

    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

    $id="'".getuID()."'";

    $sql="SELECT bmi FROM bmirechner WHERE f_uID=$id";
    $result=mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);

    if(!empty($row["bmi"])) {
        return $row["bmi"];
    } else {
        return "";
    }
}

//Connection
$db_host = 'dev.internship.com';
$db_username = 'root';
$db_password = 'Password1';
$db_name = 'internship';

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

$bodyheightErr = $bodyweightErr = $confirmUpdate = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST["bodyheight"])) {
        if(!empty($_POST["bodyweight"])) {
            $bmi = "'".($_POST["bodyweight"] / ($_POST["bodyheight"]*$_POST["bodyheight"]))."'";

            $id="'".getuID()."'";
            $weight ="'".$_POST["bodyweight"]."'";
            $height ="'".$_POST["bodyheight"]."'";

            $sql="SELECT * FROM bmirechner WHERE f_uID=$id";
            $result=mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) == 0) {
                $sql="INSERT INTO bmirechner (f_UID, height, weight, bmi) VALUES ($id,$height,$weight,$bmi )";
                mysqli_query($conn, $sql);
            } else {
                $sql="DELETE FROM bmirechner WHERE f_uID=$id";
                mysqli_query($conn, $sql);

                $sql="INSERT INTO bmirechner (f_UID, height, weight, bmi) VALUES ($id,$height,$weight,$bmi )";
                mysqli_query($conn, $sql);
            }

            $confirmUpdate = "Daten erfolgreich aktualisiert!";
        } else {
            $bodyweightErr = "Körpergewicht ist leer!";
        }
    } else {
        $bodyheightErr = "Körpergröße ist leer!";
    }
}

?>


<h1>BMI Rechner</h1>
<br><br><br>
<form action="../index.php?s=bmirechner" method="post">

    <span class="errorbmi"><?php echo $bodyheightErr ?></span><br>
    <label for="bodyheight">Körpergröße in Meter</label><br>
    <input type="text" id="bodyheight" name="bodyheight" placeholder="1.80" value="<?php echo getHeight()?>"><br><br>
    <span class="errorbmi"><?php echo $bodyweightErr ?></span><br>
    <label for="bodyweight">Körpergewicht in Kg</label><br>
    <input type="text" name="bodyweight" id="bodyweight" placeholder="85" value="<?php echo getWeight()?>"><br><br>
    <span><?php echo $confirmUpdate?></span><br><br>
    <button type="submit" class="btn btn-success">BMI Berechnen und Daten in der Datenbank speichern</button>
</form>
<br>
<p class="text">Dein BMI beträgt: <?php echo getBMI()?></p>