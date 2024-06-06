<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link href="zad4.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="box">
    <h1>Lista Produktów</h1>
    <?php
    session_start();

    $products = [
        1 => "Produkt 1",
        2 => "Produkt 2",
        3 => "Produkt 3",
        4 => "Produkt 4"
    ];

    if (isset($_GET['dodaj'])) {
        $productId = $_GET['dodaj'];
        if (isset($products[$productId])) {
            if (!isset($_SESSION['koszyk'])) {
                $_SESSION['koszyk'] = [];
            }
            if (!in_array($productId, $_SESSION['koszyk'])) {
                $_SESSION['koszyk'][] = $productId;
            }
        }
    }
    if (isset($_SESSION['zakupione']) && !empty($_SESSION['zakupione'])) {
        echo "Udało się zakupić: ";
        echo implode(", ", array_map('htmlspecialchars', $_SESSION['zakupione']));
         unset($_SESSION['zakupione']);
        }
        ?>
    <ul>
        <?php foreach ($products as $id => $name) { ?>
            <li><?php echo htmlspecialchars($name); ?>
                <a href="?dodaj=<?php echo $id; ?>">Dodaj do koszyka</a>
            </li>
        <?php } ?>
    </ul>
    <a href="koszyk.php">Przejdź do koszyka</a>
</div>
</body>
</html>