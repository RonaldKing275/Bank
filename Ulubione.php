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
    
    <section style="text-align:center;">
    <?php
$idUzytkownika = $_SESSION["id"];
$sql = "SELECT d.id, d.imie, d.nazwisko, d.zdjecie FROM konsultanci d, ulubieni u WHERE u.idKonsultanta = d.id AND idUzytkownika = $idUzytkownika";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td><img src='Obrazki/{$row['zdjecie']}' class='konsulImg2' id='kons'></td>";
        echo "<td><a href='details.php?id={$row['id']}'>{$row['imie']} {$row['nazwisko']}</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nie znaleziono żadnych konsultantów.";
}
?>

    </section>
    <footer style="clear:both;">
        Stronę wykonał: <i>Andrzej Stefaniuk i Rafał Szymorowski </i>
    </footer>

</body>
</html>