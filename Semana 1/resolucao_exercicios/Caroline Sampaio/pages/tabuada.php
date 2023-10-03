<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabuada</title>
    <style>
        .container {
            margin: 0 auto;
            width: 50%;
            height: 90vh;

            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 10px;
            padding: 10px;
        }
    </style>
</head>

<body>
    <form class="container" method="post" action="resultado_tabuada.php">
        <h1>Gerador de Tabuada</h1>
        <label>Tabuada de qual número?</label>
        <input type="number" name="valor" placeholder="digite o número" />
        <button type="submit">Calcular</button>
    </form>
</body>

</html>