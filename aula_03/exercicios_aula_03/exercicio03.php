<?php
function ParImpar($numero)
{
    if ($numero % 2 == 0) {
        return "O número $numero é par";
    } else {
        return "O número $numero é ímpar";
    }
}

//uso da função
// $numero = 8; //par
$numero = 7; //ímpar
$resultado = ParImpar($numero);
echo $resultado;
?>