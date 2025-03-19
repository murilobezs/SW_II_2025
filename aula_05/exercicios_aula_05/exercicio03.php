<?php

//caminho para o arquivo JSON
$jsonFile = 'produtos.json';

//lê o conteúdo do arquivo JSON
//se o arquivo não existir ou não puder ser lido, file_get_contents vai retornar false
$jsonContent = file_get_contents($jsonFile);

//converte o JSON para um array associativo PHP
//o segundo parâmetro 'true' faz retornar array ao invés de objeto
$produtos = json_decode($jsonContent, true);

//cria um novo produto com dados de exemplo
//0 ID é calculado automaticamente baseado no número de produtos existentes
$novoProduto = [
    "id" => count($produtos) + 1,
    "nome" => "Novo Produto",
    "preco" => 99.99,
    "quantidade" => 10
];

//adiciona o novo produto ao array de produtos
$produtos[] = $novoProduto;

//converte o array de volta para JSON
//JSON_PRETTY_PRINT formata o JSON de forma legível com indentação
$newJsonContent = json_encode($produtos, JSON_PRETTY_PRINT);

//salva o conteúdo atualizado de volta no arquivo
//file_put_contents retorna false em caso de erro na escrita
if (file_put_contents($jsonFile, $newJsonContent)) {
    echo "Novo produto adicionado com sucesso!\n";
    echo "Conteúdo atual do arquivo:\n";
    echo $newJsonContent;
} else {
    echo "Erro ao salvar o arquivo.";
}

?>
