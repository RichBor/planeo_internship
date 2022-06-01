# PHP: Hypertext Preprocessor

## Was ist PHP?

PHP ist eine beliebte Open Source Skriptsprache für die verschiedensten Bereiche,
aber speziell für die Webprogrammierung geeignet ist.\
Es fokussiert sich auf die serverseitige Programmierung und unterscheidet sich
dadurch von z.B. JavaScript

## wichtige Dinge die ich benutze

### Sessions

Sessions ist wie der Name sagt eine Sitzung, in die ein User (oder halt Browser) eingetragen
wird und in der Informationen zwischen mehreren Seiten gespeichert werden können.\
Es wird eine Session-ID generiert, mit der der Webserver den User wiedererkennt und so
zwischengespeicherte Informationen zusenden kann.

```php
$session_start();
```

In Sessions kann man dann Session variablen setzen, die dann auf jeder Seite aufrufbar sind.

```php
$_SESSION["USERNAME"] = "Richard";
```

### MySQL connection

Für die Connection benutze ich die Erweiterung MySQLi.
```php
$db_host = 'dev.internship.com';
$db_username = 'root';
$db_password = 'Password1';
$db_name = 'internship';

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);
```

Ich erstelle Variablen für den Hostnamen, den Usernamen und Passwort für die Datenbank und
den Namen der Datenbank.\
Dann erstelle ich ein Objekt und übergebe diese Parameter.\

Die Connection kann man so überprüfen:
```php
if ($conn->connect_error) {
die("Connection Failed: "
. $conn->connect_error);
}
```

### MySqli Query

Mit der Funktion ```mysqli_query()``` kann man einen SQL Befehl an die Datenbank schicken.\
Hierzu speichert man den Befehl einfach in einer variable wie ```$sql```

```
$sql = "SELECT Password FROM users WHERE Username = 'admin'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);
echo $row['Password']
```

Um den Query Befehl dann auszuführen, gibt man als Parameter die $conn und $sql variablen.\
Der return-Wert wird in einer $result gespeichert, um damit dann die Daten aus der Abfrage zu ziehen.\
Das geht mit ```mysqli_fetch_assoc()```. Die Daten werden in $row als Array gespeichert und können
dann rausgelooped werden.

### Password Hash

Mit der Funktion ```password_hash()``` kann man ein Passwort hashen.

```password_hash("PASSWORT", PASSWORD_DEFAULT);```

Dabei wird ein zufälliger Salt generiert, der wie eine DNA für einen Passwort-Generator wirkt.
Also kriegt man jedes mal wenn man "Passwort" hasht, einen anderen hash.\
So könnte der hash von "admin" als Passwort aussehen:
```$2y$10$7NK3L7g9LhZ68G7Q3xNTduCBGvBxUCKgkDcQ2ACxOQdDOiQNASNoK```

### Password Verify

Mit der Funktion ```password_verify()``` kann man ein gehashtes Passwort überprüfen

```password verify("admin", $2y$10$7NK3L7g9LhZ68G7Q3xNTduCBGvBxUCKgkDcQ2ACxOQdDOiQNASNoK)```

Der Salt des gehashten Passworts ist in dem String enthalten, und der Algorhytmus erkennt ihn.\
Er hasht also den ersten Parameter "admin" und vergleicht ihn dann mit dem zweiten Parameter.\
In dem Fall würde die Funktion "true" returnen, weil es übereinstimmt.