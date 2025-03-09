<?php
function geraNumeros()
{
    $array = array();
    for ($i = 0; $i < 10; $i++) {
        $array[] = rand(1, 100); // Gera números aleatórios entre 1 e 100
    }
    return $array;
}

// uso
$numerosAleatorios = geraNumeros();
echo "Array com números aleatórios: ";
// print_r() é uma função do PHP que mostra o conteúdo de uma variável de forma legível
// quando usada com arrays, mostra todos os elementos e seus índices
// formato de saída: Array ( [0] => valor1 [1] => valor2 ... )
print_r($numerosAleatorios);

// deixei mais organizado aqui
echo "<br><br>Números gerados:<br>";
foreach ($numerosAleatorios as $indice => $valor) {
    echo "Posição " . $indice . ": " . $valor . "<br>";
}
?>