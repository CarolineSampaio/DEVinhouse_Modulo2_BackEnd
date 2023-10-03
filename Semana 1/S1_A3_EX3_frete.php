<?php
if (isset($_GET['error'])) {
    echo  "<script>alert('Um dos dados inseridos é inválido, confira e altere-o.');</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frete</title>

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
    <form class="container" method="post" action="resultado_frete.php">
        <label>Peso do produto:</label>
        <input type="number" placeholder="Digite o peso" name="peso" />
        <br />
        <label>Distância em Km:</label>
        <input type="number" placeholder="Digite a distância" name="distancia" />
        <button type="submit">Calcular</button>
    </form>
</body>

</html>