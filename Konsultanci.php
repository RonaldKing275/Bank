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
        <div>
        <form method="get">
        Wyszukaj: <input type="text" name="fraza"><br>
        <input type="submit" value="Szukaj"><br>
    </form>
    <a href="Dodaj_konsultanta.php"> <button> Dodaj</button></a>
</div>
<div style="text-align:center;"> 
        Nasi konsultanci: <br>
         <?php 
          require ("db.php");

          $sql = "SELECT * FROM konsultanci;";
         
          if (isset($_GET["fraza"])) {
            $fraza = $_GET["fraza"];
            $sql .= " WHERE Imie LIKE '%$fraza%' OR Nazwisko LIKE '$fraza'";
        } 
        $result = $conn -> query($sql);
          if ($result->num_rows > 0) {
            echo "<table>";
            while ($row = $result->fetch_assoc()) {
                echo "<div>";
                echo "<img src='Obrazki/{$row['Zdjecie']}' class='konsulImg'>";
                echo "<a href='details.php?id={$row['Id']}'>{$row['Imie']} {$row['Nazwisko']} </a>";
                echo "</div>";
            }
            echo "</table>";
        } else {
            echo "Nie znaleziono żadnych konsultantów.";
        }
         ?>
</div>
    </section>
    <footer>
        Stronę wykonał: <i>Andrzej Stefaniuk i Rafał Szymorowski </i>
    </footer>

</body>
</html>