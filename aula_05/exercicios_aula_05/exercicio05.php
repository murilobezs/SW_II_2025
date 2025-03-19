<?php
// Ler o arquivo JSON
$jsonFile = 'produtos.json';
$jsonData = file_get_contents($jsonFile);
$products = json_decode($jsonData, true);

// Especificar o nome do produto a ser removido
$productNameToRemove = 'Teclado'; //nome do produto a ser removido

// Remover o produto do array
foreach ($products as $key => $product) {
    if ($product['nome'] === $productNameToRemove) {
        unset($products[$key]);
        break;
    }
}

// Reindexar o array
$products = array_values($products);

// Salvar o JSON atualizado de volta no arquivo
file_put_contents($jsonFile, json_encode($products, JSON_PRETTY_PRINT));

echo "Produto removido com sucesso.";
?>
