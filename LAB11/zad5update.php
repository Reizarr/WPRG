<?php
include_once('zad5Car.php');
include_once('zad5NewCar.php');
include_once('zad5InsuranceCar.php');
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['index'])) {
    $index = $_POST['index'];
    if (isset($_SESSION['cars'][$index])) {
        $car = $_SESSION['cars'][$index];
        $car->setModel($_POST['model']);
        $car->setPrice($_POST['price']);
        $car->setExchangeRate($_POST['exchangeRate']);
        $_SESSION['cars'][$index] = $car;
        header('Location: zad5.php');
        exit();
    }
    else {
        echo "Car not found.";
    }
}
else {
    echo "Invalid request.";
}
