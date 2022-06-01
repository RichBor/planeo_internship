<?php

function isValidIsbn($isbn) {
    $sum = 0;
    $j=0;
    //isValid 10 digit ISBN
    if(strlen($isbn)==10) {
        for ($i=10; $i!=0;$i--) {

            if ($isbn[$j]=='X' || $isbn[$j]=='x') {
                $sum+=10;
            } else {
                $sum+=$isbn[$j]*$i;
            }
            $j+=1;
        }
        if($sum%11==0) {
            return true;
        } else {
            return false;
        }
    } else {
        //isValid 13 digit ISBN
        if (strlen($isbn)==13) {
            for ($i=13; $i!=0;$i--) {
                if ($isbn[$j]=='X' || $isbn[$j]=='x') {
                    $sum+=10;
                } else {
                    if ($j%2==0) {
                        $sum+=$isbn[$j];
                    } else {
                        $sum+=$isbn[$j]*3;
                    }
                }
                $j+=1;
            }
            if($sum%10==0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}

$isbnErr = "";
$result = "";

if($_SERVER["REQUEST_METHOD"]=="POST") {

    if(!empty($_POST["isbn"])) {
        if(isValidIsbn($_POST["isbn"])) {
            $result="Gültig!";
        } else {
            $result="nicht Gültig!";
        }
    } else {
        $isbnErr = "ISBN ist leer!";
    }


}

?>

<h1>ISBN Validator</h1>
<br><br><br>
<form action="../index.php?s=isbnvalidator" method="post">
    <label for="isbn">ISBN</label><br>
    <span class="errorbmi"><?php echo $isbnErr; $isbnErr=""?></span><br>
    <input type="text" id="isbn" name="isbn" placeholder="9780306406157"><br><br>
    <button type="submit" class="btn btn-success">Validate ISBN</button>
</form>

<p class="text">Die ISBN ist: <?php echo $result?></p>
