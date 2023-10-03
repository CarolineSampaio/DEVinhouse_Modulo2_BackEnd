<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variáveis</title>
</head>

<body>
    <!-- TAG Padrão -->
    <?php echo "Meu nome é Caroline" ?>
    <!-- TAG Curta -->
    <?= "Meu nome é Caroline" ?>


    <?php
    //   exemplo variáveis 
    $nome = 'douglas';

    $idade = 24;

    $salario = 2100.40;

    $is_old = false;

    // array - modo de escrever 1
    $lista_nomes = ['maria', 'joao', 'pedro'];

    // array  - modo de escrever 2
    $outro_lista = array('maria', 'joao');

    // Objeto pessoa (Array associativo que pode ou não ser um objeto)
    $pessoa = (object) [
        'nome' => 'douglas',
        'idade' => 24
    ];

    // array multidimensional (array de arrays)
    $pessoas = [
        [
            'nome' => 'douglas',
            'idade' => 24
        ],
        [
            'nome' => 'douglas',
            'idade' => 24
        ]
    ];

    var_dump($pessoas);
    ?>

    <?php echo $pessoa->nome ?>

    <!-- concatenação -->
    <?php echo 'Meu nome é ' . $nome . ' e tenho ' . $idade . ' anos' ?>
    <br />
    <!-- template literal ou sintaxe improvisada -->
    <?php echo "Meu nome é $nome e tenho $idade anos" ?>

    <?= "......" ?>
</body>

</html>