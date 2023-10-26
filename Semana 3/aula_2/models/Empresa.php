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

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setCNPJ($cnpj) {
        $this->cnpj = $cnpj;
    }

    public function getCnpj() {
        return $this->cnpj;
    }

    public function setEndereço($endereço) {
        $this->endereço = $endereço;
    }

    public function getEndereço() {
        return $this->endereço;
    }


    public function contratar(Funcionario $funcionario) {

        $data = [
            'id' => $funcionario->getId(),
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
        $allData = readFileContent('files/funcionarios.txt');

        $filteredData =  array_values(array_filter($allData, function ($item) use ($id) {
            return $item->id !== $id;
        }));

        saveFileContent('files/funcionarios.txt', $filteredData);
    }

    public function listarFuncionarios() {
        $data = readFileContent('files/funcionarios.txt');
        return $data;
    }

    public function aumentarSalario(Funcionario $funcionario, $novoSalario) {
        $data = readFileContent('files/funcionarios.txt');
        $filteredData =  array_values(array_filter($data, function ($item) use ($funcionario) {
            return $item->id === $funcionario->getId();
        }));

        $filteredData[0]->salario = $novoSalario;

        array_push($data, $filteredData[0]);
        saveFileContent('files/funcionarios.txt', $data);
    }
}
