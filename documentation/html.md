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
    - Das **link** Element wird am meißten benutzt, um **Stylesheets** extern einzubinden

###### meta

-     <meta charset="UTF-8">
    - Das **meta** Element wird benutzt um Metadaten wie
      Autor, Beschreibung, Charset und Viewport

###### script

-     <script> 
            function myFunction() {
                     document.getElementById("demo").innerHTML = "Hello JavaScript!";
                     }
      </script>
    - Mit dem **script** Element kann man **Skripts** von **Javascript** integrieren

#### Body

Der **Body** ist der Main-Container der Seite und enthält
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
    - **Paragraphen** werden benutzt um eine Zeile an Text zu gruppieren und ggf.
      letztendlich entweder **Inline** oder mit **CSS** zu gestalten.

###### div

-     <div class="box">  </div>
    - Das **div** Element teilt ein Dokument in Sektionen oder Divisionen in Blöcke ein, um z.B
      eine Box zu erschaffen, in der bestimmter Content steht.
      Mit **CSS** kann man dann auf die Klasse (in dem Beispiel) .box zugreifen
      und auch die Box als gesamtes gestalten.

###### span

-     <span style="background-color:lightblue"> Text! </span>
    - Das **span** Element ist eigentlich genau wie das **div** Element, nur dass es nicht
      **block** ist sondern **inline**. Es teilt also keine Sektionen in blöcke, sondern
      in Abschnitte in z.B Texten ein, die dann mit **CSS** oder **JavaScript** angezapft werden können.

###### br

-     Dies<br>ist<br>ein<br>Text
    - **br** (break row) wird benutzt,
      um die Zeile zu brechen und damit ein **newline** zu generieren:\
      ![br](../imgs/markdown/br%20example.png)

###### b

-     <b>mit dem b tag mache ich Text fett</b>
    - **mit dem b tag mache ich Text fett**.

###### q

-     <q>Quotationmarks</q>
    - Text, der mit dem tag **q** eingebettet wird, wird in <q>Quotationmarks</q> eingehüllt.

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

Hyperlinks werden mit dem tag **a** verlinkt.\
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

Mit den tags **h[1-6]** definiert man Überschriften von verschiedenen
Größen, wobei **h1** das größte und **h6** das kleinste ist:\
\
![headings](../imgs/markdown/headings.png)

### Multimedia

#### Images, Videos and Audio

###### img

-     <img src="../imgs/headings.png" alt="clueless">
    - Mit dem tag **img** kann man Bilder einbetten.\
      Mit **src** gibt man den Pfad an, und mit **alt** gibt man eine Art Backup-Text
      an, falls das Bild nicht lädt.

###### video

-     <video controls><source src="video.mp4" type="video/mp4"></video>
    - Im **video** Element gibt man den Pfad des Videos mit **"source src="** und den Typ
      mit **"type ="**.
      Das Attribut controls aktiviert die Kontrolle über den Video-Player (so wie play, pause und volume)

###### audio

-     <audio controls><source src="audio.mp3" type="video/mpeg"></audio>
    - Im **audio** Element gibt man den Pfad der Audio mit **"source src="** und den Typ
      mit **"type ="**.
      Das Attribut **controls** aktiviert die Kontrolle über den Audio-Player (so wie play, pause und volume)

#### Favicon

Ein Favicon ist das kleine Bild links bei den Browser-Tabs:\
\
![favicon](../imgs/markdown/github%20favicon.png)\
\
Man verlinkt sie mit dem **link** Element im Head:

-     <link rel="icon" type="image/x-icon" href="/imgs/favicon.ico">

Auf Seiten wie https://www.favicon.cc/ kann man kostenlos eigene Favicons pixeln.

- - -

## HTML Forms

Das **form** Element ist dazu da, um Webformulare zu erstellen und Benutzerdaten
einzusammeln.\
Diese Daten werden dann oft an einen Server geschickt
um sie zu verarbeiten.

###### input

-     <form> <input type="text"> </form>

In den Container kommt dann eines der meißtbenutzten Attribute, der **input**.\
Mit dem [input type](https://www.w3schools.com/html/html_form_input_types.asp)
kann man dann die Art des Inputs angeben, standardmäßig **text**.

###### Label

-      <form>
         <label for="test">Testtext</label><br>
         <input type="text" id="test" name="test">
       </form>
    - Mit **label** kann man sozusagen dem **input** eine Überschrift geben und so
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
    - Mit dem input type **submit** kann man einen Submit button hinzufügen,
      um das Formular abzuschicken:\
      ![submit](../imgs/markdown/submit%20example.png)

###### form action

-     <form action="test.php">
         <label for="test">Testtext</label><br>
         <input type="text" id="test" name="test">
         <input type="submit">
      </form>
    - Aber wohin wird das Formular dann geschickt?\
      Das spezifiziert man dann mit dem Attribut **action** im **form** Element.\
      Man kann das Formular z.B an ein PHP-Dokument schicken,
      um es dort verarbeiten zu lassen.

###### post & get

-     <form action="test.php" method="get">
         <label for="test">Testtext</label><br>
         <input type="text" id="test" name="test">
         <input type="submit">
      </form>
Es gibt zwei Methoden, wie das Formular abgeschickt wird.\
Standardmäßig ist die Methode **get**.\
Diese Methode ist gut dafür,
falls man die Formularergebnisse z.B bookmarken möchte.\
Wenn man allerdings sensible Informationen über das Formular abschickt, z.B
Passwörter, dann sollte man niemals **get**, sondern **post** benutzen,
da bei der Methode **post**, die Daten nicht, anders wie bei **get**,
in der URL angezeigt werden, sondern in der HTTP Anfrage selbst.\
Dazu kommt das 3000 character limit bei **get**, welches es bei **post** nicht gibt.


###### textarea

-     <form>
        <label for="test">Testtext</label><br>
        <textarea id="test" rows="4" cols="30">Das ist ein 4 Reihen Textfeld</textarea><br>
        <input type="submit">
      </form>
    - Mit dem Element **textarea** kann man ein Textfeld mit vorgegebener
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
  - Mit dem **select** Element kann man statisches dropdown-menü erstellen,
  bei dem nur die vorgegebenen optionen verfügbar sind:\
  ![select](../imgs/markdown/select%20example.png)

###### button

-     <button>dieser button macht nix</button>
  - Mit dem **button** Element kann man einen button hinzufügen.
  Dem kann man auch z.B mit dem Attribut **onclick** ein Event zuweisen.\
  <button>dieser button macht nix</button>

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
Mit dem Element **fieldset** kann man ein Ramen um Teile des Formulars machen,
um sie besser zu strukturieren.\
Mit **legend** gibt man diesen Feldern dann eine "Überschrift":

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












