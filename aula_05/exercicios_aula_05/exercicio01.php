<?php

// a) criar um array associativo com os produtos
$produtos = [
    [
        'nome' => 'Notebook',
        'preco' => 3500.00,
        'quantidade' => 5
    ],
    [
        'nome' => 'Mouse',
        'preco' => 50.00,
        'quantidade' => 20
    ],
    [
        'nome' => 'Teclado',
        'preco' => 120.00,
        'quantidade' => 15
    ]
];

// b) converter para JSON
$json = json_encode($produtos, JSON_PRETTY_PRINT);

// c) salvar o JSON em um arquivo
$arquivo = __DIR__ . '/produtos.json';
file_put_contents($arquivo, $json);

echo "Arquivo JSON criado com sucesso!";
?>
