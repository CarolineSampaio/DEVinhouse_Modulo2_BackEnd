<?php 
  define("NOME_SITE", 'Carta de férias')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php  echo NOME_SITE; ?></title>

    <style>
        .container {
            margin: 0 auto;
            width: 70%;
            border: 1px solid #000;
            padding: 10px;

            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: center;
        }
    </style>
</head>

<body>
    <?php  echo NOME_SITE; ?>
    <form class="container" method="post" action="carta_ferias.php">
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
</body>

</html>