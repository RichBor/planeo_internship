# Linux (Ubuntu) Terminal Befehle

- - -

## Navigation

-     pwd -> print working directory
    - Gibt ganz einfach den Pfad des aktuellen Verzeichnisses aus
-     ls -> list
    - ```ls``` zeigt den Inhalt
      des aktuellen Verzeichnisses (Ordner und Dateien)
-     cd -> change directory
    - Ohne Parameter schickt dich dieser Befehl in das Root-Verzeichnis.\
      Übergibt man jedoch einen Ordnernamen,
      der im aktuellen Verzeichnis existiert,
      schickt er dich dort hin
-     cd ..
    - ```cd ..``` bedeutet, gehe in das ubergeordnete Verzeichnis.\
      Man kann es auch in Pfaden benutzen:\
      z.B " ../index.html ".
      Wir gehen ein Verzeichnis zurück,
      in dem die index.html liegt, um auf sie zuzugreifen.

- - -

## Dateien und Verzeichnisse anlegen/ändern

-     mkdir (name) -> make directory
    - ```mkdir (name)``` erzeugt ein Verzeichnis im aktuellen Pfad unter einem Namen,
      welcher übergeben wird
-     touch (name).(typ)
    - ```touch``` legt eine neue Datei unter einem Namen
      und eines Typs im aktuellen Verzeichnis an.
      z.B "touch index.html"
-     nano (datei).(typ)
    - [Nano](https://www.nano-editor.org/) ist ein Editor, der dich Dateien
      direkt im Terminal editieren lässt
-     vi

-     rm (datei).(typ) -> remove
    - ```remove``` lässt dich eine Datei löschen
-     rm -rf -> remove recursive forced
    - löscht ganze Verzeichnisse (also auch den ganzen Inhalt).
-     cat (datei).(typ)
    - mit ```cat``` kann man den Inhalt von Dateien ausgeben, z.B "cat ../index.html"
-     cp (datei).(typ) (name)/(Pfad) -> copy
    - kopiert eine Datei unter einem anderem Namen zu einem Pfad
-     mv (datei).(typ) (Pfad) -> move
    - ```move``` kann eine Datei verschieben

- - -

## Pakete installieren/entfernen

-     apt -> advanced package tool
-     apt update
    - Aktualisiert die Liste der Pakete, aber keine Pakete selbst
-     apt upgrade
    - Aktualisiert alle installierten Pakete
-     apt install (paketname)
    - Installiert das genannte Paket
-     apt remove (paketname)
    - Deinstalliert das genannte Paket
-     apt list
    - Listet alle installierten Pakete auf
      (Achtung, lang. Am besten "apt list > paketliste.txt" oder so)

- - -

## Groups

Gruppen in Linux sind ganz einfach Gruppen von Usern.\
Das ist nützlich, weil man den einzelnen Gruppen dann
read, write und execute Rechte auf Dateien zuweisen kann, was einfacher ist als
es bei jedem einzeln zu machen.\
Gruppen können in großen Netzwerken
ja theoretisch auch aus hunderten Usern bestehen.

-     groupadd groupname
-     groupdel groupname
-     grep groupname /etc/group
    - ```grep``` checkt in diesem Fall, ob die erstellte Gruppe unter dem Namen
      in der **group**-Datei zu finden ist
-      usermod -a -G groupname username
    - Fügt User zu einer Gruppe hinzu (Sekundärgruppe)
-     usermod -g groupname username
    - Ändert die Primärgruppe eines Users
-     gpasswd -d username groupname
    - Entfernt ```username``` aus der Gruppe ```groupname```
-     groups username
    - Listet die Gruppen eines Users auf

- - -

## Permissions

File/directory permissions sind dazu da, um Daten, die nicht jeder sehen muss,
vor anderen abzuschließen.
File-Permissions kann man mit dem ```ls -l``` Befehl einsehen.\
Sie sind so strukturiert, dass nach dem ersten Zeichen in dreier-schritten
die Permissions von erstens dem **User** dem die Datei gehört, dann der **Gruppe** und als letztes der **Rest** angezeigt wird.\
\
![permissions](../imgs/markdown/permissions%20example.png)

Hier sieht man die Permissions der **index.html**.
- User: rwx
- Group: rw-
- Other: r--
Das bedeutet, der **User/Owner** hat die Permissions read, write und execute,\
**Groups** haben nur read und write, und **Other** hat nur read.

Ändern kann man diese mit ```chmod a=rwxr--r--```\
'a' bedeutet hier **all** und das **=**-Zeichen bedeutet ändern und überschreiben.

- - -

## Weitere nützliche Befehle

-     clear
    - Macht das Terminal sauber
-     history
    - zeigt die letzten ausgeführten Befehle
-     sudo
    - ```sudo``` führt Programme und Befehle mit den Rechten
      von einem anderen Benutzer,
      z.B dem Superuser root, der alle rechte hat, aus.
-     help (command)
    - mit ```help``` kannst du dir Hilfe zu Befehlen
      und ihren Parametern geben lassen
-     (command) > log.txt
    - nach einem Befehl kann man sich den Log in z.B eine Textdatei
      speichern lassen, wenn man den output braucht
-     grep (zeichenkette) (dateipfad)
    - Mit ```grep``` kann man nach einer Zeichenkette in einer Datei suchen.

-     man (command) -> manual
  - Mit dem **Manual-Befehl** kann man einen Befehl recherchieren und so
  wissen, was der Befehl macht und wie man ihn ungefähr benutzt.

-     more (datei)
  - **more** ist ein Programm, um größere Dateien zu lesen, indem man
  in ihnen runterscrollen kann. **more** ist auf den meißten Unix
  basierten Systemen vorinstalliert.
-     less (datei)
  - **less** ist so wie **more**, nur in besser. 
  Man kann hoch- und runterscrollen, und Befehle benutzen um z.B.
  **vi** an der Zeile zu öffnen.
-     tail (Datei)
    - Der **tail** Befehl gibt die letzten 10 Zeilen einer Datei aus.\
  Das ist gut um z.B. die neuen Zeilen einer log-Datei einzusehen.
-     find (Pfad) -name (name)
  - Mit **find** findet man schnell Dateien. Unter Pfad gibt man den Pfad an oder
  einfach einen Punkt, um überall zu suchen. Als Name gibt man dann den Dateinamen
  oder ein Dateityp. Find unterstützt auch Wildcards wie *.png
-     alias (alias)='(command)'
Mit **alias** kann man eine Abkürzung für einen Befehl schreiben.\
z.B ```alias c='clear'``` würde einen Alias für clear als c erstellen.

## Rest

-     .bashrc Datei
  - Die .bashrc Datei wird immer ausgeführt, wenn ein Shell-Fenster geöffnet wird.\
  So kann man z.B. beim Start die eigentlich temporären Aliase ausführen lassen
  und sie so "permanent" machen.