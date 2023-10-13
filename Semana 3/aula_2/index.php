<?php
require_once 'utils.php';
require_once './models/Pessoa.php';
require_once './models/Funcionario.php';
require_once './models/Empresa.php';

$empresa = new Empresa('Zucchetti Solutions', '00.445.335/0001-13');

$funcionario1 = new Funcionario('Joao', '359.892.590-50', 2000);
$funcionario2 = new Funcionario('Douglas', '191.685.930-11', '2000');

$empresa->contratar($funcionario1);
$empresa->contratar($funcionario2);

echo $funcionario1->getId();
echo $funcionario2->getId();

$empresa->aumentarSalario($funcionario2, 4000);
$empresa->aumentarSalario($funcionario1, 3000);

$empresa->demitir($funcionario1->getId());

debug($empresa->listarFuncionarios());
