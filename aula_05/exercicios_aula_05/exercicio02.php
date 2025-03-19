<?php
//lê o conteúdo do arquivo JSON
$jsonContent = file_get_contents('usuarios.json');

//converte o JSON para array PHP
$data = json_decode($jsonContent, true);

//verifica se a decodificação foi bem-sucedida
if ($data === null) {
    die('Erro ao decodificar o JSON');
}

//exibe os dados dos usuários
echo "<h2>Lista de Usuários</h2>";
foreach ($data['usuarios'] as $usuario) {
    echo "Nome: " . $usuario['nome'] . "<br>";
    echo "Email: " . $usuario['email'] . "<br>";
    echo "<hr>";
}
?>

