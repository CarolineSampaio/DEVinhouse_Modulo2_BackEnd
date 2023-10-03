<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo Média</title>
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
    <form class="container" method="post" action="calcular_media.php">
        <h1>Calcular Média</h1>
        <label>Digite a primeira nota:</label>
        <input type="number" step="any" name="nota1" placeholder="nota 1">
        <label>Digite a segunda nota:</label>
        <input type="number" step="any" name="nota2" placeholder="nota 2">
        <label>Digite a terceira nota:</label>
        <input type="number" step="any" name="nota3" placeholder="nota 3">
        <label>Digite a quarta nota:</label>
        <input type="number" step="any" name="nota4" placeholder="nota 4">
        <button type="submit">Calcular média</button>
    </form>
</body>
<footer>
    <p>Desenvolvido por Caroline Sampaio</p>
</footer>

</html>