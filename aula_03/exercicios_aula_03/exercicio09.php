<?php
function fatorial($numero)
{
    if ($numero < 0) {
        return "Não existe fatorial de número negativo";
    }
    if ($numero <= 1) {
        return 1;
    }
    return $numero * fatorial($numero - 1);
}

//uso
$numero = 5;
echo "O fatorial de $numero é: " . fatorial($numero) . "<br>";

//testei aqui com outros números
echo "Fatorial de 0: " . fatorial(0) . "<br>";
echo "Fatorial de 3: " . fatorial(3) . "<br>";
echo "Fatorial de 7: " . fatorial(7) . "<br>";
echo "Fatorial de -4: " . fatorial(-4);
?>