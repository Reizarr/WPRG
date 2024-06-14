<?php
include_once('zad5Car.php');
include_once('zad5NewCar.php');
include_once('zad5InsuranceCar.php');
session_start();
if (isset($_GET['index'])) {
    $index = $_GET['index'];
    if (isset($_SESSION['cars'][$index])) {
        $car = $_SESSION['cars'][$index];
        echo "<h2>Car Details</h2>";
        echo "<p>" . $car->__toString() . "</p>";
    }
    else {
        echo "Car not found.";
    }
}
else {
    echo "Invalid request.";
}
