<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="Styles/style2.css">
</head>
<body>
<?php
 require("db.php");
 if (isset($_POST["login"])) {
 $login = $_POST["login"];
 $haslo = $_POST["haslo"];
 $email = $_POST["email"];
 $rola = "user";

 $sql = "INSERT INTO uzytkownicy (login, haslo, email, rola) VALUES ('$login', '" . md5($haslo) ."', '$email', '$rola')";
 $result = $conn->query($sql);
 if ($result) {
 echo "<div class='form'>
 <h3>Twoje konto zostało dodane.</h3><br/>
 <p class='link'>Kliknij tutaj, aby się <a href='login.php'>zalogować</a></p>
 </div>";

 $sql1 = "SELECT id FROM uzytkownicy WHERE Login = '$login';";
 $result1 = $conn->query($sql1);
 
 while($row = $result1->fetch_object())
 {
     $y = $row->id;
 }
 $x = "bank";
 $kwota = 100;
 $saldo = 100;
 $komentarz = "Założenie konta";
 $sql2 = "INSERT INTO operacje(`Id_klienta`, `Od_kogo`, `Kwota`, `Saldo`, `Komentarz`) VALUES ($y, '$x', $kwota, $saldo, '$komentarz')";
 $conn->query($sql2);

 } else {
 echo "<div class='form'>
 <h3>Nie wypełniłeś wymaganych pól.</h3><br/>
 <p class='link'>Kliknij tutaj, aby ponowić próbę <a
href='registration.php'>rejestracji</a>.</p>
 </div>";
 }
 } else {
?>
 <form class="form" action="" method="post">
 <h1 class="login-title">Rejestracja</h1>
 <input type="text" class="login-input" name="login" placeholder="Login" required/>
 <input type="password" class="login-input" name="haslo" placeholder="Hasło" required/>
 <input type="text" class="login-input" name="email" placeholder="Adresemail" required/>
 <input type="submit" name="submit" value="Zarejestruj się" class="login-button">
 <p class="link"><a href="login.php">Zaloguj się</a></p>
 </form>
<?php
 }
?>

</body>
</html>
