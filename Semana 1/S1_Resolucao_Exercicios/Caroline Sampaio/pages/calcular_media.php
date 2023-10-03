<?php
$nota1 = filter_input(INPUT_POST, 'nota1', FILTER_VALIDATE_FLOAT);
$nota2 = filter_input(INPUT_POST, 'nota2', FILTER_VALIDATE_FLOAT);
$nota3 = filter_input(INPUT_POST, 'nota3', FILTER_VALIDATE_FLOAT);
$nota4 = filter_input(INPUT_POST, 'nota4', FILTER_VALIDATE_FLOAT);

if (!$nota1 || !$nota2 || !$nota3 || !$nota4) {
    echo "<h2>Por favor, preencha todos os campos corretamente</h2>";
    exit;
}

$media = ($nota1 + $nota2 + $nota3 + $nota4) / 4;
echo "<h3>O resultado da média dos valores informados é $media.</h3>";

if ($media >= 7) {
    echo "<h3>Como sua média foi acima de 7, você foi aprovado. Parabéns!</h3>";
} else if ($media >= 5) {
    echo "<h3>Como sua média foi entre 5 e 7, você está de recuperação.</h3>";
} else {
    echo "<h3>Como sua média foi abaixo de 5, você foi reprovado.</h3>";
}
