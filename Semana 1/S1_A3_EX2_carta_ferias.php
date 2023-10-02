<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carta de férias</title>

    <style>
        .container {
            margin: 0 auto;
            width: 70%;
            border: 1px solid #000;
            padding: 24px 40px;

            display: flex;
            flex-direction: column;
            justify-content: center;
        }
    </style>
</head>

<body>
    <?php

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
            <p>Atenciosamente,</p>
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