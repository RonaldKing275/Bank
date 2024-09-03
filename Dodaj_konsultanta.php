<?php
 include("session.php");
 require("db.php");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Strona bankowa</title>
    <link rel="stylesheet" href="Styles/styl.css">
</head>
<body>
    <header>
        KOSMOBANK
    </header>
    <nav>
    <div style="grid-area:zero;">
            <a href="index.php"> Główna</a> 
        </div>
        <div style="grid-area:one;">
            <a href="Wplata.php"> Wpłać pieniądze </a> 
        </div>
        <div style="grid-area:two;">
            <a href="Przelew.php"> Wyślij przelew </a> 
        </div>
        <div style="grid-area:three;">
            <a href="Kontooszcz.php"> Konto oszczędnościowe </a> 
        </div>
        <div style="grid-area:four;">
            <a href="Konsultanci.php"> Konsultanci</a> 
        </div>
        <div style="grid-area:five;">
        <a href="Historia.php" style="">Historia</a>
        </div>
        <div style="grid-area:six;">
        <a href="Ulubione.php" style="">Ulubieni</a>
        </div>
        <div style="grid-area:seven;">
        <a href="logout.php" style="">Wyloguj</a>
        </div>
    </nav>
    <section>
    <form action="add.php" method="post" enctype="multipart/form-data">
        Imie: <input type="text" name="imie"><br>
        Nazwisko: <input type="text" name="nazwisko"><br>
        Zdjęcie: <input type="file" id="obrazek" name="obrazek" required> <br>
        <input type="submit" value="Dodaj"><br> 
    </form>
    </section>
    <footer>
        Stronę wykonał: <i>Andrzej Stefaniuk i Rafał Szymorowski </i>
    </footer>

</body>
</html>
