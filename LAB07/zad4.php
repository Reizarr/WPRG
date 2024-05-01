<?php
//function countRepeatedNumbers($arr) {
//  $counts = array_count_values($arr);
//  $repeatedCount = 0;
//  foreach ($counts as $value => $count) {
//    if ($count > 1) {
//      $repeatedCount += $count - 1;
//    }
//  }
//  return $repeatedCount;
//}
//?>
<!DOCTYPE html>
<html>
<head>
    <link href="zad4.css" rel="stylesheet" type="text/css">
    <meta charset="utf-8">
</head>
<body>
<div>
    <h1>Kalkulator zbiorów</h1>
    <div class="middlebox">
        <form action="#" method="get">
            <label for="zbiorA">Zbiór A (liczby oddzielone przecinkami):<label><br>
            <input name="zbiorA" type="text"><br>
            <label for="zbiorB">Zbiór B (liczby oddzielone przecinkami):<label><br>
            <input name="zbiorB" type="text"><br>
            <label for="operacja">Operacja:<label><br>
            <select name="opcje">
                <option value="Suma">Suma</option>
                <option value="Roznica">Róznica</option>
                <option value="CzescWspolna">Czesc wspolna</option>
            <input type="submit" value="Oblicz" id="submit">
        </form>
    </div>
    <div class="output">
        <?php
        if(!empty($_GET['zbiorA']) && !empty($_GET['zbiorB'])) {
            $c = array();
            $a = explode(",", $_GET["zbiorA"]);
            $b = explode(",", $_GET["zbiorB"]);
//            $a_counts = array_count_values(explode(",", $_GET["zbiorA"]));
//            $b_counts = array_count_values(explode(",", $_GET["zbiorB"]));
//            $repeatedCountA = countRepeatedNumbers($a_counts);
//            $repeatedCountB = countRepeatedNumbers($b_counts);
            switch ($_GET['opcje']) {
                case "Suma":
                    $c = array_unique(array_merge($a, $b));
//                    echo $repeatedCountA + $repeatedCountB;
//                    echo var_dump($c);
                    break;
                case "Roznica":
                    $c = array_diff($a, $b);
//                    echo countRepeatedNumbers($c);
//                    echo var_dump($c);
                    break;
                case "CzescWspolna":
                    $c = array_intersect($a, $b);
//                    echo countRepeatedNumbers($c);
//                    echo var_dump($c);
                    break;
            }
            echo "[ ";

            for ($i = 0; $i < count($c) /*+  countRepeatedNumbers($c) */; $i++) {
                if (isset($c[$i])) {
                    echo $c[$i] . " ";
                }
            }
            echo "]";
        }
        ?>
    </div>
</div>
</body>
</html>
