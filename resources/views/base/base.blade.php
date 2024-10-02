<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="{{asset('css/master.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">
</head>
<body>
    <div class="menu">
        <div class="logo">
            <h4>Logotipo</h4>
    </div>
    <div  class="users">
        <a href=""><i class="fa fa-user"></i></a>
        <a href="{{route('sair')}}"><i class="fa fa-power-off"></i></a>
    </div>
</div>
    <div class="corpo">
        <div class="menuLateral">
            <ul>
                <li><a href="">Dashboard</a></li>
                <li><a href="{{route('usuario')}}">Usuario</a></li>
                
                <li><a href="{{route('funcionario')}}">Funcionario</a></li>
                
                <li><a href="{{route('recrutamento')}}">Recrutamento</a></li>

                <li><a href="{{route('feria')}}">Feria</a></li>
                
                <li><a href="">Faltas</a></li>
                <li><a href="">Processamento de Salarios</a></li>
                <li><a href="">Relatorios de Ferias</a></li>
                <li><a href="">Relatorios de Faltas</a></li>
                <li><a href="">Avaliacao de desempenho</a></li>
            </ul>
        </div>
<div class="conteudo">
    @yield('gestao')
</div>
    </div>

    </div>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
    <script>
        $(function(){
$('.alert').fadeOut(5000)
        })
    </script>
</body>
</html>