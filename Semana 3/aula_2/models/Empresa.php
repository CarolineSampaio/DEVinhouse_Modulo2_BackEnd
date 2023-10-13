<?php
require_once 'Funcionario.php';
require_once 'utils.php';

// 1 - criar a classe
// 2 - criar os atributos da classe (nome,cnpj e endereço)
// 3 - criar os métodos (funções)

class Empresa {
    private $nome;
    private $cnpj;
    private $endereço;

    public function __construct($nome, $cnpj) {
        $this->nome = $nome;
        $this->cnpj = $cnpj;
    }

    public function contratar(Funcionario $funcionario) {

        $data = [
            'nome' => $funcionario->getNome(),
            'idade' => $funcionario->getIdade(),
            'cpf' => $funcionario->getCpf(),
            'salario' => $funcionario->getSalario()
        ];

        $allData = readFileContent('files/funcionarios.txt');
        array_push($allData, $data);
        saveFileContent('files/funcionarios.txt', $allData);
    }

    public function demitir($id) {
        //implementação
    }

    public function listarFuncionarios() {
        $data = readFileContent('files/funcionarios.txt');
        return $data;
    }

    public function aumentarSalario(Funcionario $funcionario, $novoSalario) {
        //implementação
    }
}
