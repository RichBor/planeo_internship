<?php
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
<div id="wrapper">
    <div class="header">
        <h1>Planeo Internship</h1>
        <span class="btn btn-success"><a href="#LoginModal" class="trigger-btn" data-toggle="modal" style="color: white">Login</a></span>
        <a href="index.php"><img src="imgs/planeo-logo.svg" id="planeopic" alt="planeo"></a>
    </div>
    <section>
        <nav>
            <?php
                switch($_GET["s"]) {
                    case 'tags':
                        echo "
                        <p class='navp'><a class='a' href='index.php'>| Start |</a></p>
                        <p class='navp''><a class='a' href='index.php?s=htmlandcss'>| HTML & CSS |</p>
                        <p class='navp' id='currentsite'>| HTML Tags |</a></p> ";
                        break;
                    case 'htmlandcss':
                        echo "
                        <p class='navp'><a class='a' href='index.php'>| Start |</a></p>
                        <p class='navp' id='currentsite'>| HTML & CSS |</p>
                        <p class='navp'><a class='a' href='index.php?s=tags'>| HTML Tags |</a></p> ";
                        break;
                    case 'contact':
                        echo "
                        <p class='navp'><a class='a' href='index.php'>| Start |</a></p>
                        <p class='navp''><a class='a' href='index.php?s=htmlandcss'>| HTML & CSS |</a></p>
                        <p class='navp'><a class='a' href='index.php?s=tags'>| HTML Tags |</a></p> ";
                        break;
                    default:
                        echo "
                        <p class='navp' id='currentsite'>| Start |</p>
                        <p class='navp''><a class='a' href='index.php?s=htmlandcss'>| HTML & CSS |</a></p>
                        <p class='navp'><a class='a' href='index.php?s=tags'>| HTML Tags |</a></p> ";
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
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" placeholder="Username" required="required">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
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
                                <span><?php echo $_SESSION["confirmRegistration"]?></span><br><br>
                                <span class="error"><?php echo $_SESSION["regUsernameErr"]?></span><br>
                                <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $_SESSION["regUsername"]?>">
                            </div>
                            <div class="form-group">
                                <span class="error"><?php echo $_SESSION["regEmailErr"]?></span><br>
                                <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $_SESSION["regEmail"]?>">
                            </div>
                            <div class="form-group">
                                <span class="error"><?php echo $_SESSION["regPasswordErr"]?></span><br>
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
                    include "html/tags.html";
                    break;
                case 'htmlandcss':
                    include "html/htmlandcss.html";
                    break;
                case 'contact':
                    include "php/contact.php";
                    break;
                default:
                    echo "<h2> Mein HTML/CSS Projekt fuer mein Praktikum bei Planeo </h2>
                          <p class='text'> Hier findet man ein bisschen Grundwissen zu HTML/CSS und wie ich es anwenden kann<br><br>09.
                          Mai - 22. Juni </p>";
            }

            ?>
        </article>
    </section>

    <footer>
        <button id="contact" onclick="window.location.href = 'index.php?s=contact'">Contact</button>
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

