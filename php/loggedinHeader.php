<h1>Planeo Internship</h1>
<form id="LOGOUT" method="post" style="display: inline">
    <button class="btn btn-success" name="logout" onclick="alert('Sie wurden ausgeloggt')" value="logout">Logout</button>
</form>

<a href = "index.php" ><img src = "imgs/planeo-logo.svg" id = "planeopic" alt = "planeo" ></a>

<a href = "?s=settings"><img src ="imgs/settings.svg" id="settings" width="2%" height="2%"></a>

<?php
if(isset($_POST["logout"])) {
    header("Location: index.php");
    setcookie("user", "", time()-3600);
    session_unset();
    session_destroy();
}