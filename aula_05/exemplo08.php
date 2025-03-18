<?php
    $dados = [
        "nome" => "Murilo Bezerra",
        "idade" => 17,
        "email" => "murisud15@gmail.com"
    ];
    
    $json = json_encode($dados, JSON_PRETTY_PRINT);
    echo $json;
?>