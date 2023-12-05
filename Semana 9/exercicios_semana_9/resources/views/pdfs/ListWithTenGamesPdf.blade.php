<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Jogos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .game-list {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }
        .game-item {
            margin: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 300px;
            text-align: left;
        }
        img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
        }
    </style>
</head>
<body>

    <h1>Lista de Jogos</h1>

    <ul class="game-list">
        @foreach($games as $game)
            <li class="game-item">
                <img src="{{ $game['cover'] }}" alt="{{ $game['name'] }}">
                <h2>{{ $game['name'] }}</h2>
                <p><strong>Preço:</strong> ${{ $game['price'] }}</p>
                <p><strong>Descrição:</strong> {{ $game['description'] }}</p>
            </li>
        @endforeach
    </ul>
</body>
</html>
