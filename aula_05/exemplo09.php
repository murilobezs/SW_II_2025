<?php
    $json = '{"nome": "João Vitor Romania", "idade": 30, "email": "jaoromania@gmail.com"}';

    $dados = json_decode($json, true); // O segundo parâmetro "true" converte para array
    print_r($dados);
?>