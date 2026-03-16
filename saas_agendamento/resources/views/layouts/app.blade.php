<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>SaaS Agendamento</title>

    <style>
        body{
            font-family: Arial;
            margin:0;
        }

        nav{
            background:#f5f5f5;
            padding:15px;
        }

        nav a{
            margin-right:20px;
            text-decoration:none;
            font-weight:bold;
        }

        .container{
            padding:30px;
        }
    </style>

</head>
<body>

<nav>
    <a href="/">Home</a>
    <a href="/{{ app('tenant')->slug }}/services">Serviços</a>
</nav>

<div class="container">
    @yield('content')
</div>

</body>
</html>