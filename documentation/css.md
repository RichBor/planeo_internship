# CSS Struktur

- - -

## Was ist CSS?

CSS (Cascading Style Sheets) ist eine Stylesheetsprache und bildet
mit HTML und JavaScript eine Art Kernsprache des Internets.

- - -

## CSS in HTML einbinden

CSS ist ja eine schöne Sprache, aber ohne ein Gerüst von HTML ist es wertlos.\
Einbinden kann man eine externe ```.css``` Datei im Head.

    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

- - -

## HTML Elemente ansteuern

Ansteuern kann man HTML Elemente, oder Tags, indem man z.B. ihren Namen selber
aufruft:

    body {
        background-color: lightgray
    }

    footer {
        text-align: right
    }

Man kann Elemente aber auch individuell, und nicht so allgemein, ansteuern,
indem man z.B. einem div-Element eine ID gibt:

    <div id="hub">  </div>

    <p id="small">   </p>

->

    #hub {
    background-color: aquatic
    }

    #small {
        font-size: 50%;
        color: white;
    }

IDs werden also mit einem ```#``` angesteuert, sie müssen aber einzigartig sein.\
\
Wenn man aber bestimmte Elemente gruppieren möchte, um sie zusammen anzusteuern,
dann benutzt man Klassen:

    <span class="maintext">   </span>

    <p class="city">   </p>

->

    .maintext {
        font-size:90%;
        color: white;
    }
    
    .city {
        color: aquatic;
        font-weight: bold;
    }

Klassen werden also mit einem ```.``` angesteuert.\
Diese können hingegen so oft benutzt werden wie man will.

- - -

## CSS Syntax

CSS Syntax kann man sehr einfach erklären:\
Es gibt einen **Selector**, eine **Property** und ein **Value** für das **Property**.

- Der **Selector** zeigt auf das HTML-Element, welches angesteuert werden soll.
- Ein **Property** ist eine Art Attribut und der **Value** beschreibt das Attribut

![css syntax](../imgs/markdown/w3%20css%20syntax%20example.png)\

Nach dem **Selector** werden die **Properties** und **Values** in ```{}``` eingerahmt.\
**Properties** werden mit **semicolons** getrennt.


