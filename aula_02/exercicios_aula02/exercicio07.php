<?php
// array de nomes
$nomes = ["Dua Lipa", "Jão", "Pedro", "Taylor", "Ariana"];

$qtde = count($nomes);

//echo $nomes[0];
for ($i=0; $i < $qtde; $i++){
    echo $nomes[$i] . "</br>";

};



//vê o array usando foreach
//foreach ($nomes as $nome) {
//   echo "Nome: " . $nome . "</br>";
//}

//conta os nomes
//echo "</br>Total de nomes: " . count($nomes);
?>