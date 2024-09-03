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
        <table>
        <tr>
            <th>Id klienta</th>
            <th>Od kogo</th>
            <th>Kwota</th>
            <th>Saldo</th>
            <th>Komentarz</th>
        </tr>
        <?php
        $x = $_SESSION["login"];
        $sql = "SELECT id FROM uzytkownicy WHERE Login = '$x';";
        $result1 = $conn -> query($sql);
        while($row = $result1 -> fetch_object())
            {
            $y = $row->id;
            }
        $sql2 = "SELECT * FROM operacje WHERE Id_klienta = $y";
        $result = $conn->query($sql2);
        while($row = $result -> fetch_object())
            {
                echo "<tr><td>{$row-> Id_klienta} </td> <td>{$row-> Od_kogo} </td> <td>{$row->Kwota} </td> <td>{$row-> Saldo} </td> <td>{$row-> Komentarz} </td></tr>";
            }
        $conn->close();
        ?>
        </table>
    </section>
    <footer>
        Stronę wykonał: <i>Andrzej Stefaniuk i Rafał Szymorowski </i>
    </footer>

</body>
</html>
