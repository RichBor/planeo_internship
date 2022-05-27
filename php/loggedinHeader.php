<h1>Planeo Internship</h1>
<form id="LOGOUT" method="post" style="display: inline">
    <button class="btn btn-success" name="logout" value="logout">Logout</button>
</form>

<a href = "index.php" ><img src = "imgs/planeo-logo.svg" id = "planeopic" alt = "planeo" ></a>



<?php
if(isset($_POST["logout"])) {
    header("Location: index.php");
    setcookie("user", "", time()-3600);
}