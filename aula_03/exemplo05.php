<?php

function teste($x){
    foreach ($x as $nome) {
        echo "$nome <br>";
    }
}

$vetor = ['Murilo', 'João', 'São Paulo'];

teste($vetor);
?>