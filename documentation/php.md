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