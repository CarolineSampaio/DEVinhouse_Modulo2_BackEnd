<?php
define("NOME_SITE", 'Carta de férias')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo NOME_SITE; ?></title>

    <style>
        .container {
            margin: 0 auto;
            width: 70%;
            border: 1px solid #000;
            padding: 10px;

            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <!-- chama/referencia o próprio arquivo -->
    <?php echo $_SERVER['PHP_SELF'] ?>

    <form class="container" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <label>Nome do funcionário:</label>
        <input type="text" placeholder="Digite o nome do funcionário" name="name" />
        <br />
        <label>Data de início da férias:</label>
        <input type="date" name="start_date" />
        <br />
        <label>Data de fim da férias:</label>
        <input type="date" name="end_date" />
        <br />
        <button type="submit">Gerar</button>
    </form>

    <?php

    echo NOME_SITE . '<br/>';

    // var_dump($_POST); equivalente ao console.log do javascript

    // isset é uma função em PHP que verifica se uma variável foi definida e não é nula. 
    if (isset($_POST['name']) &&  isset($_POST['start_date']) && isset($_POST['end_date'])) {
        // $salario = $name === 'douglas' ? 10000 : 1000; Exemplo if ternário

        $name = $_POST['name'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

        $dataAtual = new DateTime();

    ?>
        <div class="container">
            <p>Caro Responsável,</p>
            <p>Gostaria de solicitar minhas férias conforme as informações abaixo:</p><br>
            <p>Nome do Funcionário: <?php echo $name ?> </p>
            <p>Data de Início: <?php echo $start_date ?> </p>
            <p>Data de Término: <?php echo $end_date ?> </p><br>
            <p>Agradeço antecipadamente pela atenção e aguardo a confirmação do meu pedido</p><br>
            <p>Atenciosamente,</p><br>
            <p><?php echo $name ?></p><br>
            <p>Data do Pedido: <?php echo $dataAtual->format('d-m-Y') ?> </p><br>
        </div>

    <?php
    } else {
        echo "Aguardando preenchimento das informações";
    }

    ?>
</body>

</html>