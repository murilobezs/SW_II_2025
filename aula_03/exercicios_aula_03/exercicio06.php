<?php
//mesma coisa do exercício 4, só mudei o número
function tabuada($numero)
{
    echo "<h3>Tabuada do $numero</h3>";
    echo "<table border='1'>";
    for ($i = 1; $i <= 10; $i++) {
        $resultado = $numero * $i;
        echo "<tr>";
        echo "<td>$numero x $i</td>";
        echo "<td>=</td>";
        echo "<td>$resultado</td>";
        echo "</tr>";
    }
    echo "</table>";
}
//fiz uma table para deixar mais arrumado :)

tabuada(8);
?>