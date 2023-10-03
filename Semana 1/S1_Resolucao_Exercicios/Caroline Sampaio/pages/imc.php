<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calculo IMC</title>
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
  <form class="container" method="post" action="calcular_imc.php">
    <h1>Calcular IMC</h1>
    <label>Digite seu Peso:</label>
    <input type="number" name="peso" placeholder="Peso em kg">
    <label>Digite sua Altura:</label>
    <input type="number" name="altura" placeholder="Altura em cm">
    <button type="submit">Calcular</button>
  </form>
</body>
<footer>
  <p>Desenvolvido por Caroline Sampaio</p>
</footer>

</html>