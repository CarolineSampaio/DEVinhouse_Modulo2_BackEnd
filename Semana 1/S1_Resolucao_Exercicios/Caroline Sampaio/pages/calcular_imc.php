<?php
    $peso = filter_var($_POST['peso'], FILTER_SANITIZE_NUMBER_INT);
    $altura = filter_var($_POST['altura'], FILTER_SANITIZE_NUMBER_INT);

    if (!$peso || !$altura) {
        echo "<h2>Por favor, preencha os campos de peso e altura para calcular seu IMC</h2>";
        exit;
    }

    $altura = $altura / 100;
    $imc = $peso / ($altura * $altura);

    echo "<h2>Seu IMC é: " . number_format($imc, 2) . "<h2>";

    if ($imc < 18.5) {
        echo "<h3>Você está abaixo do peso</h3>";
    } elseif ($imc >= 18.5 && $imc <= 24.9) {
        echo "<h3>Você está com o peso normal</h3>";
    } elseif ($imc >= 25 && $imc <= 29.9) {
        echo "<h3>Você está com sobrepeso</h3>";
    } elseif ($imc >= 30 && $imc <= 34.9) {
        echo "<h3>Você está com obesidade grau 1</h3>";
    } elseif ($imc >= 35 && $imc <= 39.9) {
        echo "<h3>Você está com obesidade grau 2</h3>";
    } elseif ($imc >= 40) {
        echo "<h3>Você está com obesidade grau 3</h3>";
    }
