<?php

$description = '.......................';
$count = strlen($description);

if ($count > 100) {
    // faça açgp
    echo "entrei aqui";
}

$text = 'A java é a linguagem mais rápida do mundo java';

echo str_replace('java', '[EDITADO]', $text);

echo "<br />";

if (str_contains($text, 'rápida')) {
    echo 'existe a palavra rápida';
} else {
    "não tem";
}

echo "<br />";

$senha = "123";

if (strlen(trim($senha)) >= 8) {
    echo "válido";
} else {
    echo "não válido";
}

echo "<br />";

$lista = "2022-08-12";

$novaLista = explode('-', $lista);

echo "<br />";

if (count($novaLista) === 3) {
    echo $novaLista[2] . "-" . $novaLista[1] . "-" . $novaLista[0];
}

echo "<br />";
echo '---------------------------------';

date_default_timezone_set('America/Sao_Paulo');

$agora = new DateTime();
$finalMes = new DateTime('2023-10-31');
echo "<pre>";

echo $agora->format("d-m-Y");
echo "<br />";

echo $agora->format("d-m-y H:m");
echo "<br />";

echo $agora->diff($finalMes)->days;

echo "</pre>";
