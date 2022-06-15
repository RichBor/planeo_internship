<?php
session_start();

if(isset($_GET["logout"])) {
    setcookie("user", "", time()-3600);
    header("Location: index.php");
    exit();
}

function getID(){
    //Connection

    $db_host = 'db';
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

function getimgStatus() {
    //Connection

    $db_host = 'db';
    $db_username = 'root';
    $db_password = 'Password1';
    $db_name = 'internship';

    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

    //get status
    $id="'".getID()."'";
    $sql="SELECT status FROM profileimg WHERE f_UID LIKE ".$id;
    $result=mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);
    return $row['status'];
}

function getFilePath() {
    //Connection

    $db_host = 'db';
    $db_username = 'root';
    $db_password = 'Password1';
    $db_name = 'internship';

    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

    //get file path
    $id="'".getID()."'";
    $sql="SELECT path FROM profileimg WHERE f_UID LIKE ".$id;
    $result=mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);

    return "/profileimgs/".$row['path'];
}
?>
<!DOCTYPE html>
<html lang="DE">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship Planeo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.js"></script>
    <script src="/js/modal.js"></script>
</head>


<body>
<div id="wrapper">
    <div class="header">
        <?php
            if(isset($_COOKIE["user"])) {
                include "php/loggedinHeader.php";
            } else {
                include "php/loggedoutHeader.php";
            }
        ?>

    </div>
    <section>
        <nav>
            <?php
                if(isset($_COOKIE["user"])) {
                    switch ($_GET["s"]) {
                        case 'tags':
                            echo "
                            <p class='navp'><a class='a' href='index.php'>| Start |</a></p>
                            <p class='navp''><a class='a' href='index.php?s=htmlandcss'>| HTML & CSS |</p>
                            <p class='navp' id='currentsite'>| HTML Tags |</a></p> 
                            <p class='navp'><a class='a' href='index.php?s=bmirechner'>| BMI Rechner |</a></p>
                            <p class='navp'><a class='a' href='index.php?s=isbnvalidator'>| ISBN Validator |</a></p>
                            <p class='navp'><a class='a' href='index.php?s=wurfel'>| Würfel |</a></p>
                            <p class='navp'><a class='a' href='index.php?s=dog'>| Hunde API |</a></p>";
                            break;
                        case 'htmlandcss':
                            echo "
                            <p class='navp'><a class='a' href='index.php'>| Start |</a></p>
                            <p class='navp' id='currentsite'>| HTML & CSS |</p>
                            <p class='navp'><a class='a' href='index.php?s=tags'>| HTML Tags |</a></p> 
                            <p class='navp'><a class='a' href='index.php?s=bmirechner'>| BMI Rechner |</a></p>
                            <p class='navp'><a class='a' href='index.php?s=isbnvalidator'>| ISBN Validator |</a></p>
                            <p class='navp'><a class='a' href='index.php?s=wurfel'>| Würfel |</a></p>
                            <p class='navp'><a class='a' href='index.php?s=dog'>| Hunde API |</a></p>";
                            break;
                        case 'settings':
                        case 'contact':
                            echo "
                            <p class='navp'><a class='a' href='index.php'>| Start |</a></p>
                            <p class='navp'><a class='a' href='index.php?s=htmlandcss'>| HTML & CSS |</a></p>
                            <p class='navp'><a class='a' href='index.php?s=tags'>| HTML Tags |</a></p> 
                            <p class='navp'><a class='a' href='index.php?s=bmirechner'>| BMI Rechner |</a></p>
                            <p class='navp'><a class='a' href='index.php?s=isbnvalidator'>| ISBN Validator |</a></p>
                            <p class='navp'><a class='a' href='index.php?s=wurfel'>| Würfel |</a></p>
                            <p class='navp'><a class='a' href='index.php?s=dog'>| Hunde API |</a></p>";
                            break;
                        case 'bmirechner':
                            echo "
                            <p class='navp'><a class='a' href='index.php'>| Start |</a></p>
                            <p class='navp''><a class='a' href='index.php?s=htmlandcss'>| HTML & CSS |</a></p>
                            <p class='navp'><a class='a' href='index.php?s=tags'>| HTML Tags |</a></p> 
                            <p class='navp' id='currentsite'>| BMI Rechner |</p>
                            <p class='navp'><a class='a' href='index.php?s=isbnvalidator'>| ISBN Validator |</a></p>
                            <p class='navp'><a class='a' href='index.php?s=wurfel'>| Würfel |</a></p>
                            <p class='navp'><a class='a' href='index.php?s=dog'>| Hunde API |</a></p>";
                            break;
                        case 'isbnvalidator':
                            echo "
                            <p class='navp'><a class='a' href='index.php'>| Start |</a></p>
                            <p class='navp''><a class='a' href='index.php?s=htmlandcss'>| HTML & CSS |</a></p>
                            <p class='navp'><a class='a' href='index.php?s=tags'>| HTML Tags |</a></p> 
                            <p class='navp'><a class='a' href='index.php?s=bmirechner'>| BMI Rechner |</a></p>
                            <p class='navp' id='currentsite'>| ISBN Validator |</p>
                            <p class='navp'><a class='a' href='index.php?s=wurfel'>| Würfel |</a></p>
                            <p class='navp'><a class='a' href='index.php?s=dog'>| Hunde API |</a></p>";
                            break;
                        case 'wurfel':
                            echo "
                            <p class='navp'><a class='a' href='index.php'>| Start |</a></p>
                            <p class='navp''><a class='a' href='index.php?s=htmlandcss'>| HTML & CSS |</a></p>
                            <p class='navp'><a class='a' href='index.php?s=tags'>| HTML Tags |</a></p> 
                            <p class='navp'><a class='a' href='index.php?s=bmirechner'>| BMI Rechner |</a></p>
                            <p class='navp'><a class='a' href='index.php?s=isbnvalidator'>| ISBN Validator |</a></p>
                            <p class='navp' id='currentsite'>| Würfel |</p>
                            <p class='navp'><a class='a' href='index.php?s=dog'>| Hunde API |</a></p>";
                            break;
                        case 'dog':
                            echo "
                            <p class='navp'><a class='a' href='index.php'>| Start |</a></p>
                            <p class='navp''><a class='a' href='index.php?s=htmlandcss'>| HTML & CSS |</a></p>
                            <p class='navp'><a class='a' href='index.php?s=tags'>| HTML Tags |</a></p> 
                            <p class='navp'><a class='a' href='index.php?s=bmirechner'>| BMI Rechner |</a></p>
                            <p class='navp'><a class='a' href='index.php?s=isbnvalidator'>| ISBN Validator |</a></p>
                            <p class='navp'><a class='a' href='index.php?s=wurfel'>| Würfel |</a></p>
                            <p class='navp' id='currentsite'>| Hunde API |</p>";
                            break;
                        default:
                            echo "
                            <p class='navp' id='currentsite'>| Start |</p>
                            <p class='navp''><a class='a' href='index.php?s=htmlandcss'>| HTML & CSS |</a></p>
                            <p class='navp'><a class='a' href='index.php?s=tags'>| HTML Tags |</a></p> 
                            <p class='navp'><a class='a' href='index.php?s=bmirechner'>| BMI Rechner |</a></p>
                            <p class='navp'><a class='a' href='index.php?s=isbnvalidator'>| ISBN Validator |</a></p>
                            <p class='navp'><a class='a' href='index.php?s=wurfel'>| Würfel |</a></p>
                            <p class='navp'><a class='a' href='index.php?s=dog'>| Hunde API |</a></p>";
                    }
                } else {
                    echo "<p class='navp' id='currentsite'>| Start |</p>";
                }
                ?>
        </nav>

        <!-- LOGIN MODAL -->

        <div id="LoginModal" class="modal fade">
            <div class="modal-dialog modal-login">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Member Login</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="php/login.php" method="post">
                            <div class="form-group">
                                <span><?php echo $_SESSION["confirmLogin"]; $_SESSION["confirmLogin"]=""?></span><br><br>
                                <span class="error"><?php echo $_SESSION["logUsernameErr"];$_SESSION["logUsernameErr"]=""?></span><br>
                                <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $_SESSION["logUsername"]; $_SESSION["logUsername"]="" ?>">
                            </div>
                            <div class="form-group">
                                <span class="error"><?php echo $_SESSION["logPasswordErr"];$_SESSION["logPasswordErr"]=""?></span><br>
                                <input type="password" class="form-control" name="password" placeholder="Password"><br><br>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block login-btn">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a href="#RegisterModal" class="trigger-btn" data-toggle="modal" data-dismiss="modal">Register?</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- REGISTER MODAL -->

        <div id="RegisterModal" class="modal fade">
            <div class="modal-dialog modal-login">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Member Registration</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="php/registration.php" method="post">
                            <div class="form-group">
                                <span><?php echo $_SESSION["confirmRegistration"]; $_SESSION["confirmRegistration"]=""?></span><br><br>
                                <span class="error"><?php echo $_SESSION["regUsernameErr"];$_SESSION["regUsernameErr"]=""?></span><br>
                                <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $_SESSION["regUsername"]; $_SESSION["regUsername"]="" ?>">
                            </div>
                            <div class="form-group">
                                <span class="error"><?php echo $_SESSION["regEmailErr"];$_SESSION["regEmailErr"]=""?></span><br>
                                <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $_SESSION["regEmail"]; $_SESSION["regEmail"]="" ?>">
                            </div>
                            <div class="form-group">
                                <span class="error"><?php echo $_SESSION["regPasswordErr"];$_SESSION["regPasswordErr"]="" ?></span><br>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <br><input type="password" class="form-control" name="confirmpassword" placeholder="Password bestätigen"><br>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block login-btn">Register</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a href="#LoginModal" class="trigger-btn" data-toggle="modal" data-dismiss="modal">Login?</a>
                    </div>
                </div>
            </div>
        </div>

        <article>
            <?php

            switch($_GET["s"]) {
                case 'tags':
                    if(isset($_COOKIE["user"])) {
                        include "html/tags.html";
                    } else {
                        include "html/404.html";
                    }
                    break;
                case 'htmlandcss':
                    if(isset($_COOKIE["user"])) {
                        include "html/htmlandcss.html";
                    } else {
                        include "html/404.html";
                    }
                    break;
                case 'contact':
                        include "php/contact.php";
                    break;
                case 'settings':
                    if(isset($_COOKIE["user"])) {
                        include "php/settings.php";
                    } else {
                        include "html/404.html";
                    }
                    break;
                case 'bmirechner':
                    if(isset($_COOKIE["user"])) {
                        include "php/bmirechner.php";
                    } else {
                        include "html/404.html";
                    }
                    break;
                case 'isbnvalidator':
                    if(isset($_COOKIE["user"])) {
                        include "php/isbnvalidator.php";
                    } else {
                        include "html/404.html";
                    }
                    break;
                case '404':
                    include "html/404.html";
                    break;
                case 'wurfel':
                    if(isset($_COOKIE["user"])) {
                        include "html/wurfel.html";
                    } else {
                        include "html/404.html";
                    }
                    break;
                case 'dog':
                    if(isset($_COOKIE["user"])) {
                        include "php/dog.php";
                    } else {
                        include "html/404.html";
                    }
                    break;
                default:
                    if(isset($_COOKIE['user'])) {
                        echo "Sie sind als ".$_COOKIE['user']." eingeloggt!<br><br>";
                        if(getimgStatus()==0) {
                            echo "<img src='profileimgs/default.png'>";
                        } else {
                            echo "<img src='".getFilePath()."?".mt_rand()."' height='400px' width='400px'>";
                        }
                        echo "<br><br><form action='php/imgupload.php' method='post' enctype='multipart/form-data'>
                                <input type='file' name='img' class='btn btn-sucess'>
                                <button class='btn btn-success' type='submit' name='submit'>Upload Image</button>
                            </form>";
                        echo "<p>".$_SESSION['uploadErr']."</p>";
                        $_SESSION['uploadErr']="";
                    } else {
                        echo "<h2> Mein HTML/CSS Projekt fuer mein Praktikum bei Planeo </h2>
                          <p class='text'> Hier findet man ein bisschen Grundwissen zu HTML/CSS und wie ich es anwenden kann<br><br>09.
                          Mai - 22. Juni </p>
                          <p class='text'>Um all den Content zu sehen, <a href='#LoginModal' data-toggle='modal'>loggen</a> Sie sich bitte ein oder <a href='#RegisterModal' data-toggle='modal'>registrieren</a> Sie sich!</p>";
                    }
                }

            ?>
        </article>
    </section>
    <footer>
        <button id="contact" class="btn btn-success" onclick="window.location.href = 'index.php?s=contact'">Contact</button>
        <span> von <b>Richard Borgardt || richard.borgardt@web.de</b> </span><br>
        <b>Datum:</b> <span id="date"></span> <b>|| Zeit:</b> <span id="time"></span> Uhr
    </footer>

</div>


</body>

</html>

<!-- Skript für Datum- und Zeitstempel im Footer -->
<script>
    var dt = new Date();
    const options = {weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'};
    document.getElementById("date").innerHTML = dt.toLocaleDateString("de-DE", options);
    document.getElementById("time").innerHTML = dt.toLocaleTimeString("de-DE");
</script>

<script>
    var url_string = window.location.href;
    var url = new URL(url_string);
    var register = url.searchParams.get("register");
    var login = url.searchParams.get("login");
    if(register==="1") {
        $("#RegisterModal").modal('show');
    }
    if(login==="1") {
        $("#LoginModal").modal('show')
    }
</script>
