<?php 

$pessoa = array(
    'nome' => 'Murilo',
    'idade' => 17,
    'cidade' => 'Ribeirão Pires'
);

// Adding profissao key
$pessoa['profissao'] = 'Desenvolvedor Front-End';

// Creating friends array
$amigos = array('Susana', 'Ryllary', 'Aline');

// Combining arrays
$dados = array_merge($pessoa, array('amigos' => $amigos));

// Displaying the result
print_r($dados);

?>