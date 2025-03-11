<?php 

//array com 8 números inteiros. Encontrar o menor e maior número do array com laço de repetição


// coloquei o menor e o maior número no meio do array para testar se o código está funcionando
$numeros = [5, 2, 15, 20, 25, 30, 50, 40];

$menor = $numeros[0];
$maior = $numeros[0];

for ($i = 0; $i < count($numeros); $i++) {
    if ($numeros[$i] < $menor) {
        $menor = $numeros[$i];
    }
    if ($numeros[$i] > $maior) {
        $maior = $numeros[$i];
    }
}

echo "O menor número do array é: " . $menor . "<br>";
echo "O maior número do array é: " . $maior;
?>