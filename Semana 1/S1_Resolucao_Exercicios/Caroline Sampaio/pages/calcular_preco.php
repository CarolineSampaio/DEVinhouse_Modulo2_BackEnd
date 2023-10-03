<?php
$codigo = filter_input(INPUT_POST, 'codigo', FILTER_SANITIZE_NUMBER_INT);
$quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);

if (!$codigo || !$quantidade) {
  echo "<h2>Por favor, preencha os campos de código e quantidade corretamente para calcular o preço</h2>";
  exit;
}

$preco = 0;

switch ($codigo) {
  case 100:
    $preco = 1.20;
    break;
  case 101:
    $preco = 1.30;
    break;
  case 102:
    $preco = 1.50;
    break;
  case 103:
    $preco = 1.20;
    break;
  case 104:
    $preco = 1.30;
    break;
  case 105:
    $preco = 1.00;
    break;
  default:
    echo "<h2>Produto não encontrado</h2>";
    exit;
}

$total = $preco * $quantidade;

echo "<h2>O valor total é: R$ " . number_format($total, 2) . "</h2>";
