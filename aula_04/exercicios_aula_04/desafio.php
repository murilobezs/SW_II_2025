<?php

// Array associativo com nomes dos alunos e notas
$alunos = [
    "João Vitor" => 8.5,
    "Murilo" => 9.0,
    "Ariana" => 7.5,
    "Taylor" => 8.0,
    "Shawn" => 6.5
];

//variáveis
$soma = 0;
$maiorNota = 0;
$alunoMaiorNota = "";

//array somando as notas e encontrando a maior nota
foreach ($alunos as $aluno => $nota) {
    $soma += $nota;
    echo "Aluno: $aluno - Nota: $nota<br>";
    
    //verifica a maior nota
    if ($nota > $maiorNota) {
        $maiorNota = $nota;
        $alunoMaiorNota = $aluno;
    }
}

//média
$media = $soma / count($alunos);

// resultados
echo "<br>Média da turma: " . number_format($media, 2);
echo "<br>Aluno com a maior nota: $alunoMaiorNota (Nota: $maiorNota)";

?>
