<?php session_start() ?>

<h2> Contact </h2>
<p class="text">Du hast Fragen? Schreibe eine Nachricht:</p>

<form method="post" action="php/contact_submission.php">
    <label for="name" class="contactlabel">Name</label><br><span
            class="error"><?php echo $_SESSION["nameErr"] ?></span><br>
    <input type="text" id="name" name="name" placeholder="Name*"
           value="<?php echo $_SESSION["name"] ?>"><br><br>
    <label for="vorname" class="contactlabel">Vorname</label><br><span
            class="error"><?php echo $_SESSION["vornameErr"] ?></span><br>
    <input type="text" id="vorname" name="vorname" placeholder="Vorname*"
           value="<?php echo $_SESSION["vorname"] ?>"><br><br>
    <label for="email" class="contactlabel">Email</label><br><span
            class="error"><?php echo $_SESSION["emailErr"] ?></span><br>
    <input type="text" id="email" name="email" placeholder="Email*"
           value="<?php echo $_SESSION["email"] ?>"><br><br><br>
    <label for="nachricht" class="contactlabel">Nachricht</label><br><span
            class="error"><?php echo $_SESSION["nachrichtErr"] ?></span><br>
    <textarea style="resize: none" id="nachricht" name="nachricht" placeholder="Deine Nachricht*" rows="10"
              cols="40"><?php echo $_SESSION["nachricht"] ?></textarea><br><br>
    <input type="submit">
</form>