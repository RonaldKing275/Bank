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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

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
    <?php 
$id = $_GET["id"];
$idUzytkownika = $_SESSION["id"];

// Sprawdzenie, czy konsultant jest już w ulubionych
$sql = "SELECT id FROM ulubieni WHERE idKonsultanta = ? AND idUzytkownika = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $id, $idUzytkownika);
$stmt->execute();
$result = $stmt->get_result();
$added = $result->num_rows > 0;
$src = $added ? "./Obrazki/followed.png" : "./Obrazki/follow.png";

echo "<img class='fav' data-Konsult='$id' src='$src'>";

// Pobranie danych konsultanta
$sql = "SELECT * FROM konsultanci WHERE Id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) { 
    echo "{$row['Imie']} {$row['Nazwisko']}<br>";
    echo "<img src='Obrazki/{$row['Zdjecie']}' class='konsulImg2' id='kons'>";
    echo "<br>Telefon: 123 321 231";
}
?>
        <div class="separate">
        <form action="delete.php" method="post">
            <input type="hidden" name="idKons" value="<?php echo $id; ?>"> 
            <input type="submit" value="Usuń Konsultanta">            
        </form>

        <h3>Dodaj recenzję:</h3>
        <form action="insertReview.php" method="post">
    <input type="hidden" name="idKons" value="<?php echo $id; ?>"> 
    <label for="ocena">Ocena:</label> 
    <select id="ocena" name="ocena" required>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select> <br> <br>
    <label for="tresc">Treść recenzji:</label>
    <textarea id="tresc" name="tresc" rows="4" required></textarea><br>
    <input type="submit" value="Dodaj recenzję">
</form>

        <?php
            $sql = "SELECT Nick, Ocena, Tresc, Data FROM recenzje WHERE IdKonsultanta=$id";
            $result = $conn->query($sql);
            echo "<h3>Recenzje:</h3>";
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<p>Nick: " . $row["Nick"] . " - Ocena: " . $row["Ocena"] . " - Treść: " . $row["Tresc"] . " - Data: " . $row["Data"] . "</p>";
 
                }
            } else {
                echo "<p>Nie znaleziono żadnych recenzji.</p>";
            }
            ?>
            </div>
    </section>
    <footer>
        Stronę wykonał: <i>Andrzej Stefaniuk i Rafał Szymorowski </i>
    </footer>

</body>
</html>
<script src="Scripts/detailsScript.js"></script>