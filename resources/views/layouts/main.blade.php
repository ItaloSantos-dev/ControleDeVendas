<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <style>
        *{
            margin: 0px;
        }
        li{

            display: inline;
            list-style-type: none;
        }

        
    </style>
</head>
<body>
    <header class="d-flex justify-content-center align-items-center bg-secondary mb-1" style="height: 90px;">
    <nav class="container">
            <ul class="d-flex justify-content-center list-unstyled m-0">
                <li><a class="rounded shadow m-1 btn btn-primary" href="{{route('menu')}}">Menu principal</a></li>
                <li><a class="rounded shadow m-1 btn btn-primary" href="{{route('venda')}}">Vender</a></li>
                <li><a class="rounded shadow m-1 btn btn-primary" href="{{route('estoque')}}">Estoque</a></li>
            </ul>
        </nav>
    </header>
        @yield('content')
    <footer class="bg-secondary mt-1">
        <div class="container">
            <div class="row text-center">
                <p class="col">Contato: (99) 98158-7631</p>
                <p class="col">Email: italocont@gmail.com</p>
            </div>
            <div class="row text-center">
                <p class="col">Criador do Gerenciador: @s4nt.italo</p>
                <p class="col">&copy;2025</p>
            </div>
        </div>
    </footer>
</body>
</html>