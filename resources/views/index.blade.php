<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Principal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div>
        <div id="caixaprincipal" class=" rounded shadow translate-middle position-absolute top-50 start-50 bg-secondary text-center p-3">
            <h1>Menu principal</h1>

            <a href="{{route('venda')}}"><button class=" btn btn-primary mt-1">Vender</button></a>
            <br>
            <a href="{{route('estoque')}}"><button class=" btn btn-primary mt-1">Estoque</button></a>

        </div>
    </div>
</body>
</html>