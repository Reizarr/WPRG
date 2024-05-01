<?php
print ("Podaj wielkosc tablicy: ");
$size = readline();
$tablica = [];
print ("Wypelnij tablice dowolnymi wartosciami " . $size . " razy: ");
for ($i = 0; $i < $size; $i++){
    $tablica[$i] = readline();
}
print ("Podaj miejsce w ktorym wstawimy znak w tablicy: ");
$pozycja = readline();
if($pozycja<0) {
    throw new Exception("BŁĄD");
}
print_r($tablica);
array_splice($tablica, $pozycja, 0 , ['$']);
print_r($tablica);