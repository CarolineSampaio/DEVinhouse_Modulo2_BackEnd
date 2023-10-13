<?php
require_once 'Pessoa.php';

class Funcionario extends Pessoa {

    private $salario;

    public function __construct($nome, $cpf, $salario) {
        parent::__construct($nome, $cpf);
        $this->salario = $salario;
    }

    public function getSalario() {
        return $this->salario;
    }
    public function setSalario($salario) {
        $this->salario = $salario;
    }
}
