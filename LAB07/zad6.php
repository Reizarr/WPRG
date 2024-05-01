<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="zad6.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="main">
    <form action="#" method="get">
        <label for="rok">Wprowadz rok: </label>
        <input type="number" name="date"><br>
        <input type="submit" id="submit" value="OBLICZ">
    </form>
</div>
<div class="output">
    <?php
    if(!empty($_GET['date'])) {
        $year = $_GET['date'];
        if (is_numeric($year) && $year > 0 && $year < 2200) {
            $date = "";
            $x = 0;
            $y = 0;

            if ($year >= 1 && $year <= 1582) {
                $x = 15;
                $y = 6;
            }
            elseif ($year >= 1583 && $year <= 1699) {
                $x = 22;
                $y = 2;
            }
            elseif ($year >= 1700 && $year <= 1799) {
                $x = 23;
                $y = 3;
            }
            elseif ($year >= 1800 && $year <= 1899) {
                $x = 23;
                $y = 4;
            }
            elseif ($year >= 1900 && $year <= 2099) {
                $x = 24;
                $y = 5;
            }
            elseif ($year >= 2100 && $year <= 2199) {
                $x = 24;
                $y = 6;
            }

            $a = $year % 19;
            $b = $year % 4;
            $c = $year % 7;
            $d = (19 * $a + $x) % 30;
            $e = (2 * $b + 4 * $c + 6 * $d + $y) % 7;

            $result = "";
            if ($e == 6 && $d == 29) {
                $result = "Kwiecien 26";
            }
            elseif ($e == 6 && $d == 28 && (11 * $x + 11) % 30 < 19) {
                $result =  "Kwiecien 18";
            }
            elseif ($d + $e < 10) {
                $result = "Marzec " . (22 + $d + $e);
            }

            elseif ($d + $e > 9) {
                $result = "Kwiecien " . ($d + $e - 9);
            }

            echo "Wielkanoc w " . $year . " przypada: " . $result;
        }
        else {
            echo "Nieprawidlowy rok";
        }
    }
    ?>
</div>
</body>
</html>