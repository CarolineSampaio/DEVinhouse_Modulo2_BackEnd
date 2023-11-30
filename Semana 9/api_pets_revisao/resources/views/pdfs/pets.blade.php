<!DOCTYPE html>
<html>
<head>
    <title>Pets</title>
    <link
    rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous">
</head>
<body>

    <p>Relatório de pets</p>

    <table class="table table-bordered">
        <tr>
            <th>foto</th>
            <th>ID</th>
            <th>Name</th>
            <th>Porte - Tamanho</th>
        </tr>
        @foreach($pets as $pet)
        <tr>
            <td><img src="https://s2.glbimg.com/Y3X4qWUVv35RgqHOvGqZ67BtBwg=/600x0/filters:quality(70)/i.s3.glbimg.com/v1/AUTH_08fbf48bc0524877943fe86e43087e7a/internal_photos/bs/2022/B/r/RUAqubR0eByCv3ttFVOw/2017-06-12-kratos.jpg" width="200px" /></td>
            <td>{{ $pet->id }}</td>
            <td>{{ $pet->name }}</td>
            <td>{{ $pet->size }}</td>
        </tr>
        @endforeach
    </table>

</body>
</html>
