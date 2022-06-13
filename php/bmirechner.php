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

function getHeight() {
    //Connection
    $db_host = 'db';
    $db_username = 'root';
    $db_password = 'Password1';
    $db_name = 'internship';

    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

    $id="'".getuID()."'";

    $sql="SELECT * FROM bmirechner WHERE f_uID=$id ORDER BY p_bID DESC LIMIT 1";
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
    $db_host = 'db';
    $db_username = 'root';
    $db_password = 'Password1';
    $db_name = 'internship';

    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

    $id="'".getuID()."'";

    $sql="SELECT * FROM bmirechner WHERE f_uID=$id ORDER BY p_bID DESC LIMIT 1";
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
    $db_host = 'db';
    $db_username = 'root';
    $db_password = 'Password1';
    $db_name = 'internship';

    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

    $id="'".getuID()."'";

    $sql="SELECT * FROM bmirechner WHERE f_uID=$id ORDER BY p_bID DESC LIMIT 1";
    $result=mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);

    if(!empty($row["bmi"])) {
        return $row["bmi"];
    } else {
        return "";
    }
}

//Connection
$db_host = 'db';
$db_username = 'root';
$db_password = 'Password1';
$db_name = 'internship';

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

$bodyheightErr = $bodyweightErr = $confirmUpdate = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST["bodyheight"])) {
        if(!empty($_POST["bodyweight"])) {
            if(is_numeric($_POST['bodyheight'])) {
                if(is_numeric($_POST['bodyweight'])) {
                    $bmi = "'".round(($_POST["bodyweight"] / ($_POST["bodyheight"]*$_POST["bodyheight"])), 2)."'";
                    $id="'".getuID()."'";
                    $weight ="'".$_POST["bodyweight"]."'";
                    $height ="'".$_POST["bodyheight"]."'";
                    $sql="SELECT * FROM bmirechner WHERE f_uID=$id";
                    $result=mysqli_query($conn, $sql);
                    $timestamp ="'".date("y.m.d")."'";
                    $sql="INSERT INTO bmirechner (f_UID, height, weight, bmi, insertdate) VALUES ($id,$height,$weight,$bmi, $timestamp)";
                    mysqli_query($conn, $sql);
                    $confirmUpdate = "Daten erfolgreich aktualisiert!";
                } else {
                    $bodyweightErr="Gewicht ist keine Zahl. Versuch deine Kommazahl mit einem Punkt zu trennen!";
                }
            } else {
                $bodyheightErr="Körpergröße ist keine Zahl. Versuch deine Kommazahl mit einem Punkt zu trennen!";
            }
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
<br><br><br>

<form action="php/exportBmi.php" method="post">
    <button class="btn btn-success" name="csv" value="csv">Export table to .csv</button><br><br>
</form>


<table class='table'>
  <thead>
    <tr>
      <th scope='col'>EintragsID</th>
      <th scope='col'>Größe</th>
      <th scope='col'>Gewicht</th>
      <th scope='col'>BMI</th>
      <th scope='col'>Eintragsdatum</th>
    </tr>
  </thead>
  <tbody>

  <?php
    $id="'".getuID()."'";
    $sql="SELECT p_bID, height, weight, bmi, DATE_FORMAT(insertdate, '%d.%m.%Y') AS timestamp FROM bmirechner WHERE f_uID=$id ORDER BY p_bID DESC";
    $result=mysqli_query($conn, $sql);
    while($row=mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <th scope="row"><?php echo $row['p_bID']?></th>
            <td><?php echo $row['height']?></td>
            <td><?php echo $row['weight']?></td>
            <td><?php echo $row['bmi']?></td>
            <td><?php echo $row['timestamp']?></td>
        </tr>
        <?php
    }
  ?>
  </tbody>
</table>