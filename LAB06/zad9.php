<html>
<head>
    <style>
        img {
            width: 400px;
            height: 400px;
            margin: 20px;
        }
    </style>
</head>
<body>

<?php
function WyswietlTrzyObrazki() {
    $numbers = [];
    while (count($numbers) < 4) {
        $newNumber = rand(1, 9);
        if (!in_array($newNumber, $numbers)) {
            $numbers[] = $newNumber;
        }
    }

    echo "<div class ='obrazki'>";
    foreach ($numbers as $number) {
        $imageFile = "{$number}.jpg";
        echo "<img src='$imageFile'>";
    }
    echo "</div>";
}
WyswietlTrzyObrazki();

?>
</body>
</html>