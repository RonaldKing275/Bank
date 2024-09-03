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

    <p>
 Witaj <?= $_SESSION["login"] ?>!

 </p>

    Twój stan konta to: 
    <?php
    $Limit1 = 0;
    $Limit2 = 0;
    $x = $_SESSION["login"];
    $sql = "SELECT id FROM uzytkownicy WHERE Login = '$x';";
    $result1 = $conn -> query($sql);
    while($row = $result1 -> fetch_object())
        {
           $y = $row->id; 
        }
   
    $sql2 = "SELECT saldo FROM operacje WHERE Id_klienta = $y;";
    $result = $conn->query($sql2);
    $Limit2 = $result->num_rows;
    $Limit1 = $Limit2 - 1;

    $y = intval($y);
    $Limit1 = intval($Limit1);
    $Limit2 = intval($Limit2);

    if ($Limit1 >= 0 && $Limit2 > 0) {
        $sqlXD = "SELECT saldo FROM operacje WHERE Id_klienta = $y LIMIT $Limit1, $Limit2;";
        $result = $conn->query($sqlXD);
        while($row = $result -> fetch_object())
        {
            echo $row->saldo;
        }
    } else {
        echo "0";
    }

    ?>zł
<br><br>
    <?php

    $login = $_SESSION["login"];
    $sql = "SELECT id FROM uzytkownicy WHERE Login = '$login';";
    $odp = $conn->query($sql);

    if ($odp->num_rows > 0) {
        while ($row = $odp->fetch_assoc()) {
            echo "ID twojego konta to: " . $row["id"];
        }
    } else {
        echo "Nie znaleziono użytkownika.";
    }
    $conn->close();
    ?>


    </section>
    <footer>
        Stronę wykonał: <i>Andrzej Stefaniuk i Rafał Szymorowski </i>
    </footer>

</body>
</html>
