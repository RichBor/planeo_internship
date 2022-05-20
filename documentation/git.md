# Git und wichtige Befehle

- - -

## Was ist Git?

Git ist Software zur Versionsverwaltung von Dateien/Programmen.\
Es hilft dir also, deine Fortschritte Online zu teilen und Feedback
zu empfangen.\
Man kann einfach seinen Zugriff mit anderen (z.B anderen Kollegen) teilen
und so zusammen arbeiten und Lösungen finden.\
[Hier](https://github.com/bitcoin/bitcoin) ist zum Beispiel das Github repo von Bitcoin.

- - -

## Wie benutze ich Git (Befehle)?

### "Getting Started"

- git config --global user.name (name)
    - Setzt Nutzernamen
- git config --global user.email (mail)
    - Setzt Email
- git config --global --list
    - Lass dir beides anzeigen
- git clone (SSH)
    - Den SSH Key findet man auf der Internetseite beim Repository.\
      Jetzt kann man am Projekt arbeiten.

- - -

### Git benutzen

- git status
    - Mit diesem Befehl siehst du alle Dateien,
      die sich seit dem letzten Commit verändert haben.
- git add .
    - Mit "git add" allgemein fügt man Dateien zum "Index" hinzu.
      Das bedeutet hier, dass die Dateien einer Liste hinzugefügt werden,
      die beim nächsten Commit dabei sind. "git add ." fügt einfach alle Dateien
      aus dem repository hinzu, die nicht ignoriert sind.
- git commit -m "changelog"
    - Mit " git commit -m (changelog) " fügst du jetzt die zuvor hinzugefügten Dateien
      deinem lokalen Repository hinzu.\
      Dabei gibt man immer eine Art "Changelog" an, in der steht, was sich verändert hat.
- git push
    - Wenn man die Dateien jetzt final hochladen möchte, benutzt man "git push".
- git log
    - Zeit History von vergangenen Commits
- git rm -> remove
- git mv -> move

- - -

### .gitignore

Jede Datei in Git hat einen von drei Status.\
Entweder ist sie "tracked", "untracked" oder ignored.\
Eine geaddete, oder schon comittete ist "tracked" und wird beim Befehl
"git status" grün angezeigt.\
"untracked" sind die Dateien die noch nicht committed wurden oder
"ignored" Dateien.\
Wenn man Dateien im Verzeichnis hat,
die nicht hochgeladen werden sollen/müssen,
wie z.B temporäre Dateien oder Passwörter,
dann kann man sie "ignorieren".\
Das macht man in einer .gitignore Datei.\
Dort kann man einfach ganze Verzeichnisse oder
einzelne Dateien mit deren Pfad
ignorieren und kann so verhindern,
dass sie mit einem "git add ." ausversehen hochgeladen werden.
\
\
In meiner .gitignore ist das Verzeichnis .idea ignoriert, weil man es nicht
im remote repository braucht:\
\
![gitignore](../imgs/markdown/gitignore%20example.png)\
Man kann auch z.B ganze Dateitypen mit *.txt ignorieren.\
Man kann mit den sogenannten "Globbing Mustern"
ganze Dateigruppen auswählen.\
[Hier](https://www.atlassian.com/de/git/tutorials/saving-changes/gitignore) gibt es einige Beispiele.
\
\
Eine gitignore wird generell mit hochgeladen, damit andere Teilnehmer
an dem Projekt die gleichen Dateien auch ignorieren und nicht hochladen.\
Für ein "persönliches gitgnore" gibt es die exclude Datei in
"/(repository)/.git/info/exclude", da das Verzeichnis .git automatisch ignoriert wird.

- - -

### git fetch, git merge und git pull

Diese drei Befehle sind dazu da, um Änderungen aus dem remote Repo mit
deinem lokalem Repo zu synchronisieren.\
Also wie ein git push, nur anders herum.

- git fetch
    - Mit "git fetch" ziehst du dir erstmal die Dateien runter,
      aber du ersetzt noch keine Dateien. Sozusagen nur zum angucken.
- git merge
    - Fetched Dateien kann man dann in sein Workspace integrieren
- git pull
    - "git pull" macht einfach beides gleichzeitig

- - -

### Branches

Ein "Branch" ist, wie der Name sagt, ein eigenständiger Zweig,
der unabhängig vom Master branch sein eigenes Ding macht.
So könnte z.B ein "test" branch existieren, auf dem man Tests ausführt.

- git branch -a
    - Zeigt alle Branches an
- git checkout -b (name)
    - erstellt neuen Branch unter (name)
- git checkout (branch)
    - wechselt zu einem anderen branch
- git push origin (branch)
    - pusht die Dateien zum Ziel-branch

- - -

Einfache Visualisierung, wie die Befehle auf den Workspace und
den local/remote repository wirkt:\
![visualisierung](../imgs/markdown/visualisierung.png)



