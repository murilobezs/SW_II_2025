<?php
//array com 10 números inteiros
$numeros = [5, 10, 15, 20, 25, 30, 35, 40, 45, 50];

//variável para soma
$soma = 0;

//loop for para somar os elementos
for ($i = 0; $i < count($numeros); $i++) {
    $soma += $numeros[$i];
}

// Exibindo o resultado
echo "A soma dos elementos do array é: " . $soma;
?>
