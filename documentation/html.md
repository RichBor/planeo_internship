# HTML - Hypertext Markup Language

- - -

## Was ist HTML?

HTML (Hypertext Markup Language) ist eine textbasierte Auszeichnungssprache.\
Ihre Dokumente (.html Dateien) sind die Grundlage des World Wide Webs
und werden von unseren Webbrowsern decodiert und dargestellt.

- - -

## HTML Basics

### HTML Layout

#### Head

Der **[Head](https://www.w3schools.com/html/html_head.asp)**
in HTML ist ein Container der Elemente enthält,
die oft von Browsern benutzt werden.

-     <head> </head>
    - Öffnet und schließt den Head-Container

**Elemente:**

###### title

-     <title> Titel </title>
    - Fügt der Seite einen **Titel** hinzu, der von Browsern z.B
      im Tab oder für Favoriten benutzt wird

###### style

-     <style> p {color:red] </style>
    - Wird benutzt um im **Head** selber Style-Informationen zu integrieren

###### link

-     <link rel="stylesheet" href="style.css">
    - ```<link>``` wird am meißten benutzt, um **Stylesheets** oder **Favicons** extern einzubinden

###### meta

-     <meta charset="UTF-8">
    - ```<meta>``` wird benutzt um Metadaten wie
      Autor, Beschreibung, Charset und Viewport

###### script

-     <script> 
            function myFunction() {
                     document.getElementById("demo").innerHTML = "Hello JavaScript!";
                     }
      </script>
    - Mit ```<script></script>``` kann man **Skripts** von **Javascript** integrieren

#### Body

```<body></body>``` ist der Main-Container der Seite und enthält
somit den gesamten Content
Hier ist der **Body** dieser [index.html](../index.html) als Beispiel:\
\
![body](../imgs/markdown/body%20example.png)

### Text Structure

Es gibt ein paar nützliche Tools um Text und Boxen besser zu Strukturieren
und damit auch übersichtlicher zu machen:

#### Basisstrukur

###### p

-     <p color=red> Dies ist ein Paragraph </p>
    - ```<p></p>``` wird benutzt um eine Zeile an Text zu gruppieren und ggf.
      letztendlich entweder **Inline** oder mit **CSS** zu gestalten.

###### div

-     <div class="box">  </div>
    - ```<div></div>``` teilt ein Dokument in Sektionen oder Divisionen in Blöcke ein, um z.B
      eine Box zu erschaffen, in der bestimmter Content steht.
      Mit **CSS** kann man dann auf die Klasse (in dem Beispiel) .box zugreifen
      und auch die Box als gesamtes gestalten.

###### span

-     <span style="background-color:lightblue"> Text! </span>
    - ```<span></span>``` ist eigentlich genau wie ```<div></div>```, nur dass es nicht
      **block** ist sondern **inline**. Es teilt also keine Sektionen in blöcke, sondern
      in Abschnitte in z.B Texten ein, die dann mit **CSS** oder **JavaScript** angezapft werden können.

###### br

-     Dies<br>ist<br>ein<br>Text
    - ```<br>``` (break row) wird benutzt,
      um die Zeile zu brechen und damit ein **newline** zu generieren:\
      ![br](../imgs/markdown/br%20example.png)

###### b

-     <b>mit dem b tag mache ich Text fett</b>
    - **mit ```<b>text</b>``` mache ich Text fett**.

###### q

-     <q>Quotationmarks</q>
    - Text, der mit ```<q></q>``` eingebettet wird, wird in <q>Quotationmarks</q> eingehüllt.

#### Lists

###### ol

-     <ol>
        <li> Schritt</li>
        <li> Schritt</li>
        <li> Schritt</li>
      </ol>

So sieht es dann im Browser aus:\
![ol](../imgs/markdown/ol%20example.png)\
Der Inhalt der Liste wird nummeriert, also sortiert.\
Das eignet sich zum Beispiel für Schritte von Rezepte oder Anleitungen.

###### ul

-       <ul>
          <li> Aufzählung</li>
          <li> Aufzählung</li>
          <li> Aufzählung</li>
        </ul>

So sieht es dann im Browser aus:\
![ul](../imgs/markdown/ul%20example.png)\
Der Inhalt wird unsortiert einfach mit Punkten aufgezählt.
Das eignet sich zum Beispiel für die Zutatenliste eines Rezepts.


- - -

## HTML Tags

Die Tags in HTML sind dazu da, den Content auf die Seite zu kriegen,
und CSS um diesen zu gestalten.

#### Links

-     <a href="https://www.planeo.de">Planeo Hyperlink!</a>

Hyperlinks werden mit ```<a href="URL">Name</a>``` verlinkt.\
Als value für das Attribut **href** gibt man dann z.B eine Webadresse an.\
<a href="https://www.planeo.de">Planeo.de Hyperlink!</a>\
Wenn man zwischen Websiten navigiert muss man aber die volle Webadresse benutzen.
(https://www.*)

#### Comments

-     <!-- Dies wäre ein Kommentar -->

**Kommentare** können benutzt werden um Code zu strukturieren und um
z.B Mitarbeiter aufzuklären was da im Code eigentlich steht und
wofür es da ist.\
Kommentare werden nicht als HTML Code interpretiert und somit nicht
aufgefangen.

#### Headings

-     <h1>Überschrift</h1>

Mit den tags ```<h[1-6]></h[1-6]>``` definiert man Überschriften von verschiedenen
Größen, wobei ```<h1></h1>``` das größte und ```<h6></h6>``` das kleinste ist:\
\
![headings](../imgs/markdown/headings.png)

### Multimedia

#### Images, Videos and Audio

###### img

-     <img src="../imgs/headings.png" alt="clueless">
    - Mit dem tag **img** kann man Bilder einbetten.\
      Mit ```<img src="bild.png">``` gibt man den Pfad an, und mit\
      ```<img alt="alternate">``` gibt man eine Art Backup-Text
      an, falls das Bild nicht lädt.

###### video

-     <video controls><source src="video.mp4" type="video/mp4"></video>
    - Mit ```<video></video>``` gibt man den Pfad des Videos mit\
      ```<source src="video.mp4 type="video/mp4">``` im **video** Container.\
      Das Attribut ```<video controls>``` aktiviert die Kontrolle über den Video-Player (so wie play, pause und volume)

###### audio

-     <audio controls><source src="audio.mp3" type="audio/mpeg"></audio>
    - Mit ```<audio></audio>``` gibt man den Pfad der Audio mit\
      ```<source src="audio.mp3 type="audio/mpeg">``` im **audio** Container.\
      Das Attribut ```<audio controls>``` aktiviert die Kontrolle über den Audio-Player (so wie play, pause und volume)

#### Favicon

Ein Favicon ist das kleine Bild links bei den Browser-Tabs:\
\
![favicon](../imgs/markdown/github%20favicon.png)\
\
Man verlinkt sie mit ```<link rel="icon" type="image/x-icon" href="favicon.ico">``` im Head:

Auf Seiten wie https://www.favicon.cc/ kann man kostenlos eigene Favicons pixeln.

- - -

## HTML Forms

```<form></form>``` ist dazu da, um Webformulare zu erstellen und Benutzerdaten
einzusammeln.\
Diese Daten werden dann oft an einen Server geschickt
um sie zu verarbeiten.

###### input

-     <form> <input type="text"> </form>

In den Container kommt dann eines der meißtbenutzten Attribute, ```<input type="">```.\
Mit dem [input type](https://www.w3schools.com/html/html_form_input_types.asp)
kann man dann die Art des Inputs angeben, standardmäßig **text**.

###### Label

-      <form>
         <label for="test">Testtext</label><br>
         <input type="text" id="test" name="test">
       </form>
    - Mit ```<label for="">...</label>``` kann man sozusagen dem **input** eine Überschrift geben und so
      ihren Nutzen erklären.\
      Dafür muss man beim Label dann die id des inputs angeben.\
      So sieht das dann im Browser aus:\
      ![form example](../imgs/markdown/form%20example.png)

###### Submit

-     <form>
         <label for="test">Testtext</label><br>
         <input type="text" id="test" name="test">
         <input type="submit">
      </form>
    - Mit ```<input type="submit">``` kann man einen Submit button hinzufügen,
      um das Formular abzuschicken:\
      ![submit](../imgs/markdown/submit%20example.png)

###### form action

-     <form action="test.php">
         <label for="test">Testtext</label><br>
         <input type="text" id="test" name="test">
         <input type="submit">
      </form>
    - Aber wohin wird das Formular dann geschickt?\
      Das spezifiziert man dann mit ```<form action="test.php">```.\
      Man kann das Formular z.B an ein PHP-Dokument schicken,
      um es dort verarbeiten zu lassen.

###### post & get

-     <form action="test.php" method="get">
         <label for="test">Testtext</label><br>
         <input type="text" id="test" name="test">
         <input type="submit">
      </form>

Es gibt zwei Methoden, wie das Formular abgeschickt wird.\
Standardmäßig ist das ```<form action="" method="get">```.\
Diese Methode ist gut dafür,
falls man die Formularergebnisse z.B bookmarken möchte.\
Wenn man allerdings sensible Informationen über das Formular abschickt, z.B
Passwörter, dann sollte man niemals **get**, sondern ```<form action="" method="post">``` benutzen,
da bei der Methode **post**, die Daten nicht, anders wie bei **get**,
in der URL angezeigt werden, sondern in der HTTP Anfrage selbst.\
Dazu kommt das 3000 character limit bei **get**, welches es bei **post** nicht gibt.

###### textarea

-     <form>
        <label for="test">Testtext</label><br>
        <textarea id="test" rows="4" cols="30">Das ist ein 4 Reihen Textfeld</textarea><br>
        <input type="submit">
      </form>
    - Mit dem Element ```<textarea></textarea>``` kann man ein Textfeld mit vorgegebener
      Basis-größe erschaffen.\
      ![textarea](../imgs/markdown/textarea%20example.png)

###### select

-     <form>
         <label for="test">Lieblingsobst</label><br>
         <select id="test">
            <option value="Apfel">Apfel</option>
            <option value="Birne">Birne</option>
            <option value="Orange">Orange</option>
         </select>
         <input type="submit">
      </form>
    - Mit dem ```<select></select>``` Element kann man statisches dropdown-menü erstellen,
      bei dem nur die vorgegebenen optionen verfügbar sind:\
      ![select](../imgs/markdown/select%20example.png)

###### button

-     <button>dieser button macht nix</button>
    - Mit dem ```<button></button>``` Element kann man einen button hinzufügen.
      Dem kann man auch z.B mit dem Attribut ```<button onclick="">``` ein Event zuweisen.
    - <button>dieser button macht nix</button>

###### fieldset & legend

-     <form>
        <fieldset>
        <legend>Fragen</legend>
        <label for="test">Lieblingsobst</label><br>
        <select id="test">
            <option value="Apfel">Apfel</option>
            <option value="Birne">Birne</option>
            <option value="Orange">Orange</option>
        </select>
        <input type="submit">
        </fieldset>
      </form>

Mit dem Element ```<fieldset></fieldset>``` kann man ein Ramen um Teile des Formulars machen,
um sie besser zu strukturieren.\
Mit ```<legend></legend>``` gibt man diesen Feldern dann eine "Überschrift":

<form>
    <fieldset>
        <legend>Fragen</legend>
        <label for="test">Lieblingsobst</label><br>
        <select id="test">
            <option value="Apfel">Apfel</option>
            <option value="Birne">Birne</option>
            <option value="Orange">Orange</option>
        </select>
        <input type="submit">
    </fieldset>
</form>

## HTML Tables

    <table>
       <caption>Überstunden</caption>
       <tr>
         <th>Montag</th>
         <th>Dienstag</th>
         <th>Mittwoch</th>
         <th>Donnerstag</th>
         <th>Freitag</th>
         <th>Samstag</th>
         <th>Sonntag</th>
       </tr>
       <tr style="text-align: center">
         <td>1</td>
         <td>2</td>
         <td>0</td>
         <td>0</td>
         <td>0</td>
         <td>2</td>
         <td>0</td>
       </tr>
      </table>

- Den Container öffnet man mit ```<table></table>```
- Eine neue table-row öffnet man mit ```<tr></tr>```
- Für Überschriften benutzt man table-heading ```<th></th>``` für Zellen
- Für normale Zellen benutzt man table-data ```<td></td>```
- Man kann der ganzen Tabelle mit ```<caption></caption>``` auch eine Überschrift geben\

So sieht das dann im Browser aus:
<table>
       <caption>Überstunden</caption>
       <tr>
         <th>Montag</th>
         <th>Dienstag</th>
         <th>Mittwoch</th>
         <th>Donnerstag</th>
         <th>Freitag</th>
         <th>Samstag</th>
         <th>Sonntag</th>
       </tr>
       <tr style="text-align: center">
         <td>1</td>
         <td>2</td>
         <td>0</td>
         <td>0</td>
         <td>0</td>
         <td>2</td>
         <td>0</td>
       </tr>
      </table>

## Classes













