<!DOCTYPE html>
<html>
<head>
    <title>Relatório de Marcadores e Jogos</title>
    <style>
        table {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 50%;
            margin: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h4>Na tabela abaixo você encontra os marcadores mais famosos do momento e quantos jogos existe em nossa plataforma com esse jogo!</h4>
    <table>
        <thead>
            <tr>
                <th>Marcador</th>
                <th>Número de Jogos</th>
            </tr>
        </thead>
        <tbody>
            @foreach($topMarkers as $marker)
                <tr>
                    <td>{{ $marker->name }}</td>
                    <td>{{ $marker->products_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
