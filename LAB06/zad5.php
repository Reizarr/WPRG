<?php

$string = readline('Podaj string a Ci powiem ile w nim jest spolglosek!');
$spogloski = ['b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'r', 's', 't', 'w', 'z', 'x', 'v'];
$count = 0;
for ($x = 0; $x < strlen($string); $x++) {
    for ($y = 0; $y < count($spogloski); $y++) {
        if ($string[$x] == $spogloski[$y]) {
            $count++;
        }
    }
}
echo "W stringu mamy łącznie: " . $count . " spółgłosek!";