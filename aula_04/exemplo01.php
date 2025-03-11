<?php 
// mas no caso, eu teria que fazer o laço de repetição para percorrer o array e verificar qual é a menor e a maior nota.
$notas = array(10, 8, 7, 9, 6);
sort($notas);
print_r($notas);
echo "A menor nota é: " . $notas[0];
echo "A maior nota é: " . $notas[count($notas) - 1];


?>