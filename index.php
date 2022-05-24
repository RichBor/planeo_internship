<?php
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship Planeo</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>

<body>
<div id="wrapper">
    <div class="header">
        <h1>Planeo Internship</h1>
        <a href="index.php"><img src="imgs/planeo-logo.svg" id="planeopic" alt="planeo"></a>
    </div>
    <section>
        <nav>
            <?php
                switch($_GET["s"]) {
                    case 'tags':
                        echo "
                        <p class='navp'><a href='index.php'>| Start |</a></p>
                        <p class='navp''><a href='index.php?s=htmlandcss'>| HTML & CSS |</p>
                        <p class='navp' id='currentsite'>| HTML Tags |</a></p> ";
                        break;
                    case 'htmlandcss':
                        echo "
                        <p class='navp'><a href='index.php'>| Start |</a></p>
                        <p class='navp' id='currentsite'>| HTML & CSS |</p>
                        <p class='navp'><a href='index.php?s=tags'>| HTML Tags |</a></p> ";
                        break;
                    case 'contact':
                        echo "
                        <p class='navp'><a href='index.php'>| Start |</a></p>
                        <p class='navp''><a href='index.php?s=htmlandcss'>| HTML & CSS |</a></p>
                        <p class='navp'><a href='index.php?s=tags'>| HTML Tags |</a></p> ";
                        break;
                    default:
                        echo "
                        <p class='navp' id='currentsite'>| Start |</p>
                        <p class='navp''><a href='index.php?s=htmlandcss'>| HTML & CSS |</a></p>
                        <p class='navp'><a href='index.php?s=tags'>| HTML Tags |</a></p> ";
                }
            ?>
        </nav>

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