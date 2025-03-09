<?php
// também a mesma coisa do exercício 5, só mudei os números
function soma($array)
{
    $soma = 0;
    foreach ($array as $numero) {
        $soma += $numero;
    }
    return $soma;
}

// soma do array
$numeros = [10, 20, 30, 40, 50];
$resultado = soma($numeros);
echo "A soma dos elementos do array é: " . $resultado;

// testei com outro array
$outroArray = [4, 17, 90, 9];
echo "<br>Outro teste: " . soma($outroArray);
?>