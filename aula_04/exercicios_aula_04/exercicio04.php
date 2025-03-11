<?php 


// array com 15 números inteiros
$numeros = [10, 25, 12, 87, 3, 2, 5, 7, 9, 13, 15, 20, 25, 30, 35];

//conta quantos números são ímpares e quantos são pares
$impares = 0;
$pares = 0;

for ($i = 0; $i < count($numeros); $i++) {
    if ($numeros[$i] % 2 == 0) {
        $pares++;
    } else {
        $impares++;
    }
}

echo "O array tem " . $pares . " números pares e " . $impares . " números ímpares.";

?>