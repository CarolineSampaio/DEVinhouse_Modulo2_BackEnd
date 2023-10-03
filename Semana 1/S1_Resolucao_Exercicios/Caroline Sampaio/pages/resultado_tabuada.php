<?php
$numero = filter_input(INPUT_POST, 'valor', FILTER_VALIDATE_INT);

if (!$numero) {
    echo "Informe um número válido";
} else {
    gerar_Tabuada('+', $numero);
    gerar_Tabuada('-',  $numero);
    gerar_Tabuada('*',  $numero);
    gerar_Tabuada('/',  $numero);
}

function gerar_Tabuada($operador, $numero)
{
    for ($contador = 1; $contador <= 10; $contador++) {
        $resultado = 0;

        if ($operador === '+') {
            $resultado = $numero + $contador;
        } else if ($operador === '-') {
            $resultado = $numero - $contador;
        } else if ($operador === '*') {
            $resultado = $numero * $contador;
        } else if ($operador === '/') {
            $resultado = $numero /  $contador;
        }

        echo "$numero $operador $contador = $resultado" . "<br />";
    }
}
