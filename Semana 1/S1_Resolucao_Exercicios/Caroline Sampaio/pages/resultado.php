<?php
$valor1 = filter_input(INPUT_POST, 'valor1', FILTER_VALIDATE_FLOAT);
$valor2 = filter_input(INPUT_POST, 'valor2', FILTER_VALIDATE_FLOAT);
$operacao = $_POST['operacao'];

if (!$valor1 || !$valor2 || !$operacao) {
    echo "<h2>Por favor, preencha os campos para realizar o calculo</h2>";
    exit;
}

$resultado = 0;

switch ($operacao) {
    case 'soma':
        $resultado = $valor1 + $valor2;
        echo "<h2> O resultado da operação é: $valor1 + $valor2 = $resultado</h2>";
        break;
    case 'subtracao':
        $resultado = $valor1 - $valor2;
        echo "<h2> O resultado da operação é: $valor1 - $valor2 = $resultado</h2>";
        break;
    case 'multiplicacao':
        $resultado = $valor1 * $valor2;
        echo "<h2> O resultado da operação é: $valor1 * $valor2 = $resultado</h2>";
        break;
    case 'divisao':
        $resultado = $valor1 / $valor2;
        echo "<h2> O resultado da operação é: $valor1 / $valor2 = $resultado</h2>";
        break;
    default:
        echo "<h2>Operação não encontrada</h2>";
        exit;
}
