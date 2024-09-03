<?php
     include("session.php");
     require("db.php");

    $id_osoby = $_POST['idOsoby'];
    $kwota = $_POST['kwota'];
    $komentarz = $_POST['kom'];

        $login = $_SESSION["login"];
        $sql = "SELECT id FROM uzytkownicy WHERE Login = '$login';";
        $result1 = $conn -> query($sql);
        while($row = $result1 -> fetch_object())
            {
            $y = $row->id;
            }
            $sql2 = "SELECT saldo FROM operacje WHERE Id_klienta = $y;";
            $result = $conn->query($sql2);
            while($row = $result -> fetch_object())
                {
                    $Limit2++;
                }
            $Limit1 = $Limit2 -1;
            $sqlXD = "SELECT saldo FROM operacje WHERE Id_klienta = $y LIMIT $Limit1, $Limit2;";
            $result = $conn->query($sqlXD);
            while($row = $result -> fetch_object())
                {
                    $saldo = $row->saldo;
                }
    if($saldo > $kwota && $kwota > 0 && $id_osoby != $y)
    {
        $saldo = $saldo - $kwota;
        $sql3 = "INSERT INTO operacje(`Id_klienta`, `Od_kogo`, `Kwota`, `Saldo`, `Komentarz`) VALUES ($y,'$login',-$kwota,$saldo,'$komentarz')";
        $conn -> query($sql3);

        $sql4 = "SELECT saldo FROM operacje WHERE Id_klienta = $id_osoby GROUP BY saldo DESC LIMIT 1;";
        $result = $conn->query($sql4);
        while($row = $result -> fetch_object())
            {
                $saldo2 = $row->saldo;
            }
        $saldo2 = $saldo2 + $kwota;
        $sql4 = "INSERT INTO operacje(`Id_klienta`, `Od_kogo`, `Kwota`, `Saldo`, `Komentarz`) VALUES ($id_osoby,'$login',$kwota,$saldo2,'$komentarz')";
        $conn -> query($sql4);

        header('Location: index.php');
    }
    else{
        echo "
    <script>
    alert('Nieładnie tak!');
    window.location.href = 'Przelew.php';
    </script>
    ";
    }
    $conn -> close();
?>
