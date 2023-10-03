<?php
define("TAXA_PESO", 0.8);
define("TAXA_DISTANCIA",  0.2);

$peso = filter_input(INPUT_POST, 'peso', FILTER_VALIDATE_FLOAT);
$distancia = filter_input(INPUT_POST, 'distancia', FILTER_VALIDATE_FLOAT);

if (!$peso || !$distancia) {
  header('Location: frete.php?error=true');
}

$resultado = $peso * TAXA_PESO + $distancia * TAXA_DISTANCIA;

echo "Considerando o peso de $peso kg e a distância de $distancia km. O valor do frete é R$ $resultado";
