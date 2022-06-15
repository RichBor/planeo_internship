<?php session_start() ?>
<h1>Hunde API</h1> <br><br><br>

<form action="php/dogapi.php" method="get">
    <button type="submit" class="btn btn-primary" name="dogselect" value="random">Get Dog!</button>
</form>
<br><br><br>
<img src="<?php echo $_SESSION['img']?>" style="max-width: 50%; max-height: 50%">
