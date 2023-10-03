<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
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
    <form class="container" method="post" action="resultado.php">
        <h1>Calculadora</h1>
        <label>Valor 1:</label>
        <input type="number" step="any" name="valor1" placeholder="Digite o primeiro valor">
        <label>Valor 2:</label>
        <input type="number" step="any" name="valor2" placeholder="Digite o segundo valor">
        <label>Operação:</label>
        <select name="operacao">
            <option value="soma">Soma</option>
            <option value="subtracao">Subtração</option>
            <option value="multiplicacao">Multiplicação</option>
            <option value="divisao">Divisão</option>
        </select>
        <button type="submit">Calcular preço</button>
    </form>

</body>
<footer>
    <p>Desenvolvido por Caroline Sampaio</p>
</footer>

</html>