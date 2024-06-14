<?php
include_once('zad5Car.php');
include_once('zad5NewCar.php');
include_once('zad5InsuranceCar.php');
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['index'])) {
    $index = $_GET['index'];
    if (isset($_SESSION['cars'][$index])) {
        array_splice($_SESSION['cars'], $index, 1);
        header('Location: zad5.php');
        exit;
    }
    else {
        echo "Car not found.";
    }
}
else {
    echo "Invalid request.";
}
?>