<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Jogo</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .game-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 400px;
            width: 100%;
        }
        .game-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .game-details {
            padding: 20px;
            text-align: center;
        }
        .game-price {
            font-size: 1.2em;
            color: #3498db;
        }
        .game-description {
            margin-top: 10px;
            color: #555;
        }
    </style>
</head>
<body>
    @foreach ($games as $game)
    <div class="game-container">
        <img class="game-image" src="{{$game->cover}}" alt="Imagem do Jogo" width="300px">
        <div class="game-details">
            <h2>{{$game->name}}</h2>
            <p class="game-price">Preço: R$ {{$game->price}}</p>
            <p class="game-description">{{$game->description}}</p>
        </div>
    </div>
    @endforeach
</body>
</html>
