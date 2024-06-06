<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="zad4.css">
    <title>Koszyk</title>
</head>
<body>
<div class="box">
    <h1>Twój Koszyk</h1>
    <?php
    session_start();

    $products = [
        1 => "Produkt 1",
        2 => "Produkt 2",
        3 => "Produkt 3",
        4 => "Produkt 4"
    ];

    if (isset($_GET['usun'])) {
        $productId = $_GET['usun'];
        if (isset($_SESSION['koszyk']) && ($key = array_search($productId, $_SESSION['koszyk'])) !== false) {
            unset($_SESSION['koszyk'][$key]);
            $_SESSION['koszyk'] = array_values($_SESSION['koszyk']);
        }
    }

    if (isset($_GET['kup'])) {
        if (!isset($_SESSION['zakupione'])) {
            $_SESSION['zakupione'] = [];
        }
        foreach ($_SESSION['koszyk'] as $productId) {
            $_SESSION['zakupione'][] = $products[$productId];
        }
        $_SESSION['koszyk'] = [];
    }
    if (isset($_SESSION['koszyk']) && !empty($_SESSION['koszyk'])) {
        echo "<ul>";
        foreach ($_SESSION['koszyk'] as $productId) {
            ?>
            <li><?php echo htmlspecialchars($products[$productId]); ?> <a href="?usun=<?php echo $productId; ?>">Usuń</a></li>
            <?php
        }
        echo "</ul>";
        echo '<a href="?kup=1">Kup Teraz</a>';
    } else {
        echo "<p>Twój koszyk jest pusty.</p>";
    }
    ?>
    <a href="zad4.php">Wróć do sklepu</a>
</div>
</body>
</html>