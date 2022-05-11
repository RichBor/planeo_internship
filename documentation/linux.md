# Linux (Ubuntu) Terminal Befehle

- - -

## Navigation

- pwd -> print working directory
    - Gibt ganz einfach den Pfad des aktuellen Verzeichnisses aus
- ls -> list
    - Der list-Befehl zeigt den Inhalt
      des aktuellen Verzeichnisses (Ordner und Dateien)
- cd -> change directory
    - Ohne Parameter schickt dich dieser Befehl in das Root-Verzeichnis.\
      Übergibt man jedoch einen Ordnernamen,
      der im aktuellen Verzeichnis existiert,
      schickt er dich dort hin
- cd ..
    - Change directory .. bedeutet, gehe in das ubergeordnete Verzeichnis.\
      Man kann es auch in Pfaden benutzen:\
      z.B " ../index.html ".
      Wir gehen ein Verzeichnis zurück,
      in dem die index.html liegt, um auf sie zuzugreifen.

- - -

## Dateien und Verzeichnisse anlegen/ändern

- mkdir (name) -> make directory
    - mkdir (name) erzeugt ein Verzeichnis im aktuellen Pfad unter einem Namen,
      welcher übergeben wird
- touch (name).(typ)
    - touch legt eine neue Datei unter einem Namen
      und eines Typs im aktuellen Verzeichnis an.
      z.B "touch index.html"
- nano (datei).(typ)
    - [Nano](https://www.nano-editor.org/) ist ein Editor, der dich Dateien
      direkt im Terminal editieren lässt
- rm (datei).(typ) -> remove
    - remove lässt dich eine Datei löschen
- rm -rf -> remove recursive forced
    - löscht ganze Verzeichnisse (also auch den ganzen Inhalt).
- cat (datei).(typ)
    - mit cat kann man den Inhalt von Dateien ausgeben, z.B "cat ../index.html"
- cp (datei).(typ) (name)/(Pfad) -> copy
    - kopiert eine Datei unter einem anderem Namen zu einem Pfad
- mv (datei).(typ) (Pfad) -> move
    - move kann eine Datei verschieben

- - -

## Pakete installieren/entfernen

- apt -> advanced package tool
- apt update
    - Aktualisiert die Liste der Pakete, aber keine Pakete selbst
- apt upgrade
    - Aktualisiert alle installierten Pakete
- apt install (paketname)
    - Installiert das genannte Paket
- apt remove (paketname)
    - Deinstalliert das genannte Paket
- apt list
    - Listet alle installierten Pakete auf
      (Achtung, lang. Am besten "apt list > paketliste.txt" oder so)

- - -

## Weitere nützliche Befehle

- clear
    - Macht das Terminal sauber
- history
    - zeigt die letzten ausgeführten Befehle
- sudo
    - sudo führt Programme und Befehle mit den Rechten
      von einem anderen Benutzer,
      z.B dem Superuser root, der alle rechte hat, aus.
- help (command)
    - mit help kannst du dir Hilfe zu Befehlen
      und ihren Parametern geben lassen
- (command) > log.txt
    - nach einem Befehl kann man sich den Log in z.B eine Textdatei
      speichern lassen, wenn man den output braucht

