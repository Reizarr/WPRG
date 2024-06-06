<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bgcolor = $_POST['bgcolor'];
    $textcolor = $_POST['textcolor'];
    setcookie('bgcolor', $bgcolor, time() + 3600);
    setcookie('textcolor', $textcolor, time() + 3600);
} else {
    header('Location: zad2.1.php');
    exit;
}
?>
<html>
<body>
<h1>Ustawienia zapisane</h1>
<a href="zad2.3.php">Kliknij by zobaczyć wymarzona strone!</a>
</body
