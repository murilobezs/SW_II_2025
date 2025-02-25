<?php
//função com parametro e com retorno

function msg ($x){
    $a = "Murilo" . $x;
    return $a;
}

$sobrenome = "Bezerra";

//o .= concatena (JUNTA OS ELEMENTOS)
$frase = "Olá";
$frase .= msg($sobrenome);
$frase .= " bem-vindo";

echo $frase;
?>