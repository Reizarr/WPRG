<?php
include_once('zad5Car.php');
include_once('zad5NewCar.php');
include_once('zad5InsuranceCar.php');
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['index'])) {
    $index = $_GET['index'];
    if (isset($_SESSION['cars'][$index])) {
        $car = $_SESSION['cars'][$index];
        echo "<h2>Edit Car</h2>";
        echo "<form method='post' action='zad5update.php'>";
        echo "<input type='hidden' name='index' value='$index'>";
        echo "<label>Model:</label> <input type='text' name='model' value='" . htmlspecialchars($car->getModel(), ENT_QUOTES) . "'><br>";
        echo "<label>Price (EURO):</label> <input type='number' step='0.01' name='price' value='" . htmlspecialchars($car->getPrice(), ENT_QUOTES) . "'><br>";
        echo "<label>Exchange Rate (PLN):</label> <input type='number' step='0.01' name='exchangeRate' value='" . htmlspecialchars($car->getExchangeRate(), ENT_QUOTES) . "'><br>";
        echo "<button type='submit'>Update Car</button>";
        echo "</form>";
    }
    else {
        echo "Car not found.";
    }
}
else {
    echo "Invalid request.";
}
?>