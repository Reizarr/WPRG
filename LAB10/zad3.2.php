<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bgcolor = $_POST['bgcolor'];
    $textcolor = $_POST['textcolor'];
    $_SESSION['bgcolor'] = $bgcolor;
    $_SESSION['textcolor'] = $textcolor;
} else {
    header('Location: zad3.1.php');
    exit;
}
?>
<html>
<body>
<h1>Ustawienia zapisane</h1>
<a href="zad3.3.php">Kliknij by zobaczyć wymarzona strone!</a>
</body
