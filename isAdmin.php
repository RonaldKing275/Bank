<?php
$login = $_SESSION["login"];
$sql = "SELECT rola FROM uzytkownicy WHERE login = '$login'";
$result = $conn->query($sql);
$isAdmin = false;
if ($result->fetch_object()->rola === "admin") {
    $isAdmin = true;
}
?>