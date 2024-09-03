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
    <label for="kwota">Dodaj kasę do konta oszczędnościowego:</label>
    <input type="number" id="kwota" placeholder="Wpisz kwotę">
    <button id="wplacBtn">Wpłać</button>
    <br><br>
    <div id="kwotaRosnaca"></div>
    <br>
    <div>Kapitał można wypłacić: nigdy <img src="Obrazki/trollface.png" alt="TrollFace" style="width:60px;height:40px;"></div>
    
    <br>
    <button id="usunkapitalBtn">Oddaj potrzebującym</button>

    <script>
    let sumaKwot = parseFloat(localStorage.getItem('sumaKwot')) || 0;
let lastUpdate = parseInt(localStorage.getItem('lastUpdate')) || Date.now();

document.addEventListener('DOMContentLoaded', function() {
    let kwotaRosnaca = document.getElementById('kwotaRosnaca');
    let now = Date.now();
    let intervals = Math.floor((now - lastUpdate) / 1000);
    sumaKwot *= Math.pow(1.01, intervals);
    lastUpdate = now;
    localStorage.setItem('lastUpdate', lastUpdate);
    localStorage.setItem('sumaKwot', sumaKwot);
    kwotaRosnaca.innerText = `Obecna kwota: ${sumaKwot.toFixed(2)} zł`;

    setInterval(function() {
        sumaKwot *= 1.01;
        kwotaRosnaca.innerText = `Obecna kwota: ${sumaKwot.toFixed(2)} zł`;
        localStorage.setItem('sumaKwot', sumaKwot);
        localStorage.setItem('lastUpdate', Date.now());
    }, 1000);
});

document.getElementById('wplacBtn').addEventListener('click', function() {
    let kwota = parseFloat(document.getElementById('kwota').value);
    if (isNaN(kwota) || kwota <= 0) {
        alert('Proszę wpisać poprawną kwotę.');
        return;
    }
    sumaKwot += kwota;
    document.getElementById('kwotaRosnaca').innerText = `Obecna kwota: ${sumaKwot.toFixed(2)} zł`;
    localStorage.setItem('sumaKwot', sumaKwot);
    localStorage.setItem('lastUpdate', Date.now());
});

document.getElementById('usunkapitalBtn').addEventListener('click', function() {
    sumaKwot = 0;
    localStorage.setItem('sumaKwot', sumaKwot);
    localStorage.setItem('lastUpdate', Date.now());
    document.getElementById('kwotaRosnaca').innerText = `Obecna kwota: ${sumaKwot.toFixed(2)} zł`;
});

</script>


    <form>
       
    </section>
    <footer>
        Stronę wykonał: <i>Andrzej Stefaniuk i Rafał Szymorowski </i>
    </footer>

</body>
</html>