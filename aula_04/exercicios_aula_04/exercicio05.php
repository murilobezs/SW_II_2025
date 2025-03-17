<?php

// Array associativo com nomes dos alunos e notas
$alunos = [
    "João Vitor" => 8.5,
    "Murilo" => 9.0,
    "Ariana" => 7.5,
    "Taylor" => 8.0,
    "Shawn" => 6.5
];

//variável para soma
$soma = 0;

//array somando as notas
foreach ($alunos as $aluno => $nota) {
    $soma += $nota;
    echo "Aluno: $aluno - Nota: $nota<br>";
}

//média
$media = $soma / count($alunos);

//resultado
echo "<br>Média da turma: " . number_format($media, 2);

?>
