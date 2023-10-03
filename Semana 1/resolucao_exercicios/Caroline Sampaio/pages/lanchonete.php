<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lanchonete</title>
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
    <form class="container" method="post" action="calcular_preco.php">
        <h1>Lanchonete Online</h1>
        <label>Digite o código do produto:</label>
        <input type="number" name="codigo" placeholder="Código do produto">
        <label>Digite a quantidade:</label>
        <input type="number" name="quantidade" placeholder="Quantidade">
        <button type="submit">Calcular preço</button>
    </form>
</body>
<footer>
    <p>Desenvolvido por Caroline Sampaio</p>
</footer>

</html>