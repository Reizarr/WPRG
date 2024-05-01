<?php
print ("Podaj ilosc sekwencji liczb ktore chcesz wprowadzic: ");
$size = readline();
$tablica = [];
print ("Podaj liczbe w postaci osemkowej: ");
for ($i = 0; $i < $size; $i++){
    $tablica[$i] = dechex(octdec(readline()));
}
print_r(array_values($tablica));



