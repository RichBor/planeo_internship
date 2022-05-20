# MYSQL

---

## Was ist MySQL?

MySQL ist ein Databaseverwaltungssystem, welches auf der Sprache SQL basiert.\
Man kann es also benutzen um Daten zu speichern und sie abzurufen.\
MySQL ist zudem auch sehr beliebt, weil es einige Schnittstellen hat,
um Skripte für Webanwendungen einzubinden.

---

## login

```mysql -u(user) (password)```

---

## Wichtige Statements

### Select

```mysql
SELECT col1,
       col2,
       col3, .. 
FROM (tabelle);
```

Mit Select-Abfragen gibt man Content aus Tabellen aus.\
Man kann sie sortieren, mit Funktionen manipulieren und sie aus
mehreren Tabellen zusammenfügen.

### WHERE

```mysql
SELECT column1,
       column2, ...
FROM table_name
WHERE condition;
```

Mit der WHERE Clause kann man eine Condition setzen.\
z.B. ```WHERE ID=3*```\
Damit wird jeder Datensatz angezeigt, bei dem die ID mit einer 3 beginnt (Wildcards).

### INSERT

```mysql
INSERT INTO (tabelle) (column1, column2, column3, ...)
VALUES (value1, value2, value3, ...);
```

Mit INSERT kann man Datensätze in Tabellen einfügen.\
Nach dem Tabellennamen kommen dann die Attribute, die man einsetzen möchte.\
Nach den Attributen kann man mit ```VALUES ()``` die Werte einfügen.\
Hier ist die Reihenfolge ganz wichtig, sie steht in relation zu den oben angegebenen
Attributen.

### UPDATE

```mysql
UPDATE (tabelle)
SET nachname = "Müller"
WHERE ID = 2;
```

Mit UPDATE kann man vorhandene Datensätze bearbeiten.\
z.B. wenn jemand heiratet und man den Nachnamen ändern muss.\
Um zielgenau einen bestimmten Datensatz zu ändern, filtert man dann mit
der WHERE Clause nach dem Primärschlüssel.

### DELETE

```mysql
DELETE
FROM (tabelle)
WHERE ID=19;
```

Mit DELETE kann man Datensätze komplett aus der Tabelle löschen.\
Hier muss man aufpassen, eine WHERE Clause hinzuzufügen, weil SQL sonst
alle Datensätze löscht

### DROP

```mysql
DROP TABLE (tabelle)
```

Löscht eine Tabelle

---

## Privileges

Privileges sind einfach die Rechte von einem Benutzer.\
Der ROOT User hat alle Rechte.\
Man kann z.B Rechte erteilen Tabellen zu erstellen, sie zu löschen oder zu ändern.\
Man kann aber auch Rechte speziell für Tabellen machen.\
So ist es beliebt einen Benutzer pro Tabelle zu erstellen, der alle Rechte
für die bearbeitung dieser einen Tabelle besitzt und sonst keiner, damit
falls jemand unbefugten Zugriff bekommt, er nicht alles direkt kapput machen kann.

[Liste von allen Priveleges, die man einem Benutzer erteilen kann](https://dev.mysql.com/doc/refman/8.0/en/privileges-provided.html#privileges-provided-summary)