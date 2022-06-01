<?php
session_start();
?>

<h1>Einstellungen</h1>


<form method="post" action="php/resetpassword.php" id="contactform">
    <label for="oldpassword" class="resetpasswordlabel">Altes Passwort</label><br><br>
    <span class="errorreset"><?php echo $_SESSION['oldpasswordErr'];$_SESSION['oldpasswordErr']=""?></span><br>
    <input type="password" id="oldpassword" name="oldpassword" placeholder="Altes Passwort*"><br><br>
    <label for="newpassword" class="resetpasswordlabel">Neues Passwort</label><br></span><br>
    <span class="errorreset"><?php echo $_SESSION['newpasswordErr'];$_SESSION['newpasswordErr']=""?></span><br>
    <input type="password" id="newpassword" name="newpassword" placeholder="Neues Passwort*"><br><br>
    <label for="newpasswordconfirm" class="resetpasswordlabel">Neues Passwort bestätigen</label><br></span><br>
    <br><input type="password" id="newpasswordconfirm" name="newpasswordconfirm" placeholder="Neues Passwort bestätigen*"><br><br>
    <button type="submit" name="passwordreset" class="btn btn-success">Submit</button><br><br>
    <p><?php echo $_SESSION['confirmReset']; $_SESSION['confirmReset']=""?></p>
</form>