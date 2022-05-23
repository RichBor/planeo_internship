<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="icon" type="image/x-icon" href="../favicon.ico">
</head>

<body>
<div id="wrapper">
    <div class="header">
        <h1>Planeo Internship</h1>
        <a href="../index.html"><img src="../imgs/planeo-logo.svg" id="planeopic"></a>
    </div>
    <section>
        <nav>
            <p class="navp"><a href="../index.html">| Start |</a></p>
            <p class="navp"><a href="../html/htmlandcss.html">| HTML & CSS |</a></p>
            <p class="navp"><a href="../html/tags.html">| HTML Tags |</a></p>
        </nav>

        <article>
            <h2> Contact </h2>
            <p class="text">Du hast Fragen? Schreibe eine Nachricht:</p>

            <form method="post" action="contact_submission.php">
                <label for="name" class="contactlabel">Name</label><span class="error"><?php echo $_SESSION["nameErr"]?></span><br>
                <input type="text" id="name" name="name" placeholder="Name*"
                value="<?php echo $_SESSION["name"]?>"><br><br>
                <label for="vorname" class="contactlabel">Vorname</label><span class="error"><?php echo $_SESSION["vornameErr"]?></span><br>
                <input type="text" id="vorname" name="vorname" placeholder="Vorname*"
                value="<?php echo $_SESSION["vorname"]?>"><br><br>
                <label for="email" class="contactlabel">Email</label><span class="error"><?php echo $_SESSION["emailErr"]?></span><br>
                <input type="text" id="email" name="email" placeholder="Email*"
                value="<?php echo $_SESSION["email"]?>"><br><br><br>
                <label for="nachricht" class="contactlabel">Nachricht</label><span class="error"><?php echo $_SESSION["nachrichtErr"]?></span><br>
                <textarea style="resize: none" id="nachricht" name="nachricht" placeholder="Deine Nachricht*"  rows="10" cols="40"><?php echo $_SESSION["nachricht"]?></textarea><br><br>
                <input type="submit">
            </form>

        </article>
    </section>

    <footer>
        <button id="contact" onclick="window.location.href = 'contact.php'">Contact</button>
        <span> von <b>Richard Borgardt || richard.borgardt@web.de</b> </span><br>
        <b>Datum:</b> <span id="date"></span> <b>|| Zeit:</b> <span id="time"></span> Uhr
    </footer>

</div>


</body>

</html>

<script>
    var dt = new Date();
    const options = {weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'};
    document.getElementById("date").innerHTML = dt.toLocaleDateString("de-DE", options);
    document.getElementById("time").innerHTML = dt.toLocaleTimeString("de-DE");
</script>