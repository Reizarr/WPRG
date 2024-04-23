<?php
$y = 2;
echo "a" . str_repeat('&nbsp;', 5) . "b" . str_repeat('&nbsp;', 5). "pow(a, b)" . "<br>";
for ($x = 1; $x <= 10; $x++){
    if ($x == 10){
        echo $x . str_repeat('&nbsp;', 2) . $y . str_repeat('&nbsp;', 4) . pow($x, $y) . "<br>";
    }
    else if ($y == 10) {
        echo $x . str_repeat('&nbsp;', 4) . $y . str_repeat('&nbsp;', 4) . pow($x, $y) . "<br>";
    }
    else {
        echo $x . str_repeat('&nbsp;', 5) . $y . str_repeat('&nbsp;', 5) . pow($x, $y) . "<br>";
    }
    $y++;
}
