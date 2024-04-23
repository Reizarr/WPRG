<?php
function isGood() {
    $string = "UrGood12456"; //TUTAJ HASLO PODAC
    $numberCount = 0;
    if (strlen($string) > 8) {
        echo "Haslo ma powyzej 8 znakow. Dobra robota!\n";
    }
    elseif (strlen($string) < 8) {
        echo "Haslo nie spelnia wymagania dlugosci 8 znakow.\n";
    }
    if (preg_match('/[A-Za-z]/', $string) || preg_match('/[0-9]/', $string)) {
        echo "Haslo ma tylko cyfry i litery. Swietna robota!\n";
    }
    else {
        echo "Haslo nie spelnia wymagania tylko cyfr i liter.\n";
    }
    for ($x = 0; $x < strlen($string); $x++){
        if (is_numeric($string[$x])){
            $numberCount++;
        }
    }
    if ($numberCount >= 2) {
        echo "Haslo ma wiecej niz 1 cyfre. Piekna robota!\n";
    }
    else {
        echo "Haslo nie spelnia wymagania minimum 2 cyfr.\n";
    }
}
isGood();
?>