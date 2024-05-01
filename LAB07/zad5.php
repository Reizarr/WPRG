<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="zad5.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="main">
    <form action="#" method="get">
        <h2><label for="Kalkulator">Kalkulator</label></h2><hr>
        <h3><label for="Prosty">Prosty</label></h3>
        <input type="number" name="number1">
        <select name="options1">
            <option value="Dodawanie">Dodawanie</option>
            <option value="Odejmowanie">Odejmowanie</option>
            <option value="Mnozenie">Mnozenie</option>
            <option value="Dzielenie">Dzielenie</option>
        </select>
        <input type="number" name="number2"><br>
        <input type="submit" value="Oblicz" id="submit"><hr>
        <h3><label for="Zaawansowany">Zaawansowany</label></h3>
        <input type="text" name="specialnumber">
        <select name="options2">
            <option value="Sinus">Sinus</option>
            <option value="Cosinus">Cos</option>
            <option value="Tangens">Tangens</option>
            <option value="BinToDec">Binarne na dziesiętne</option>
            <option value="DecToBin">Dziesiętne na binarne</option>
            <option value="DecToHex">Dziesiętne na szesnastkowe</option>
            <option value="HexToDec">Szesnastkowe na dziesiętne</option>
        </select><br>
        <input type="submit" value="Oblicz" id="submit">
    </form>
</div>
<div class="output">
<?php
if(!empty($_GET['number1']) && !empty($_GET['number2'])) {
    $number1 = $_GET['number1'];
    $number2 = $_GET['number2'];
    $result = 0;
    switch ($_GET['options1']) {
        case "Dodawanie":
            $result = $number1 + $number2;
            break;
        case "Odejmowanie":
            $result = $number1 - $number2;
            break;
        case "Mnozenie":
            $result = $number1 * $number2;
            break;
        case "Dzielenie":
            if ($number2 == 0) {
                echo "Nie mozna przez zero...";
            }
            else {
                $result = $number1 / $number2;
            }
            break;
    }
    echo $result;
}
else if(!empty($_GET['specialnumber'])) {
    $specialnumber = $_GET['specialnumber'];
    $result = 0;
    switch ($_GET['options2']) {
        case "Sinus":
            $result = sin(deg2rad($specialnumber));
            break;
        case "Cosinus":
            $result = cos(deg2rad($specialnumber));
            break;
        case "Tangens":
            $result = tan(deg2rad($specialnumber));
            break;
        case "BinToDec":
            if ($specialnumber > 1){
                echo "Ponad zakres liczb binarnych.";
            }
            $result = bindec($specialnumber);
            break;
        case "DecToBin":
            $result = decbin($specialnumber);
            break;
        case "DecToHex":
            $result = dechex($specialnumber);
            break;
        case "HexToDec":
            $result = hexdec($specialnumber);
            break;
    }
    echo $result;
}
?>
</div>
</body>
</html>