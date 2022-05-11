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

Der [Head](https://www.w3schools.com/html/html_head.asp)
in HTML ist ein Container der Elemente enthält,
die oft von Browsern benutzt werden.

-     <head> </head>
    - Öffnet und schließt den Head-Container

**Elemente:**

-     <title> Titel </title>
    - Fügt der Seite einen Titel hinzu, der von Browsern z.B
      im Tab oder für Favoriten benutzt wird
-     <style> p {color:red] </style>
    - Wird benutzt um im Head selber Style-Informationen zu integrieren
-     <link rel="stylesheet" href="style.css">
    - Das link Element wird am meißten benutzt, um Stylesheets extern einzubinden
-     <meta charset="UTF-8">
    - Das meta Element wird benutzt um Metadaten wie
      Autor, Beschreibung, Charset und Viewport

-     <script> 
            function myFunction() {
                     document.getElementById("demo").innerHTML = "Hello JavaScript!";
                     }
      </script>
    - Mit dem script Element kann man Skripts von Javascript integrieren

#### Body

Der Body ist der Main-Container der Seite und enthält
somit den gesamten Content
Hier ist der Body dieser [index.html](../index.html) als Beispiel:\
\
![body](../imgs/body%20example.png)

### Text Structure

Es gibt ein paar nützliche Tools um Text und Boxen besser zu Strukturieren
und damit auch übersichtlicher zu machen:

#### Basisstrukur

-     <p color=red> Dies ist ein Paragraph </p>
    - Paragraphen werden benutzt um eine Zeile an Text zu gruppieren und ggf.
      letztendlich entweder Inline oder mit CSS zu gestalten.
-     <div class="box">  </div>
    - Das div Element teilt ein Dokument in Sektionen oder Divisionen ein, um z.B
      eine Box zu erschaffen, in der bestimmter Content steht.
      Mit CSS kann man dann auf die Klasse (in dem Beispiel) .box zugreifen
      und auch die Box als gesamtes gestalten.

#### Listen

###### Ordered Lists

-     <ol>
        <li> Schritt</li>
        <li> Schritt</li>
        <li> Schritt</li>
      </ol>

So sieht es dann im Browser aus:\
![ol](../imgs/ol%20example.png)\
Der Inhalt der Liste wird nummeriert, also sortiert.\
Das eignet sich zum Beispiel für Schritte von Rezepte oder Anleitungen.

###### Unordered Lists

-       <ul>
          <li> Aufzählung</li>
          <li> Aufzählung</li>
          <li> Aufzählung</li>
        </ul>
So sieht es dann im Browser aus:\
![ul](../imgs/ul%20example.png)\
Der Inhalt wird unsortiert einfach mit Punkten aufgezählt.
Das eignet sich zum Beispiel für die Zutatenliste eines Rezepts.

#### Kommentare

-     <!-- Dies wäre ein Kommentar -->
Kommentare können benutzt werden um Code zu strukturieren und um
z.B Mitarbeiter aufzuklären was da im Code eigentlich steht und
wofür es da ist.\
Kommentare werden nicht als HTML Code interpretiert und somit nicht
aufgefangen.

- - -

## HTML Tags

Die Tags in HTML sind dazu da, den Content auf die Seite zu kriegen,
und CSS um diesen zu gestalten.

### Links

-     <a href="https://www.planeo.de">Planeo Hyperlink!</a>
Hyperlinks werden mit dem tag "a" verlinkt.\
Als value für das Attribut "href" gibt man dann z.B eine Webadresse an.\
<a href="https://www.planeo.de">Planeo.de Hyperlink!</a>\
Wenn man zwischen Websiten navigiert muss man aber die volle Webadresse benutzen.
(https://www.*)













