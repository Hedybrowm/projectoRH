<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="{{asset('css/master.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">
</head>

<body>
    <div class="menu">
        <div class="logo">
            <h4>Sistema de Gestão de Recursos Humanos</h4>
        </div>
        <div class="users">
            <a href="{{route('login')}}"><i class="fa fa-user"></i></a>
            <a href="{{route('sair')}}"><i class="fa fa-power-off"></i></a>
        </div>
    </div>
        <div class="corpo">
            <div class="menuLateral">
                <ul>
                    <li class="li1"><a href="/">Dashboard</a></li>
                    <li><a href="{{route('usuario')}}">Usuário</a></li>
                    <li><a href="{{route('funcionario')}}">Funcionario</a></li>
                    <li><a href="{{route('recrutamentos')}}">Recrutamento</a></li>
                    <li><a href="{{route('ferias')}}">Férias</a></li>
                    <li><a href="">Faltas</a></li>
                    <li><a href="">Salário</a></li>
                    <li><a href="">Avaliação de Desempenho</a></li>
                    <li><a href="">Relatório de Férias</a></li>
                    <li><a href="">Relatório de Faltas</a></li>
                </ul>
            </div>
            <div class="conteudo">
                @yield('gestao')
            </div>
        </div> 
    <div class="rodape">
        <h1>Curso de Programação Web @ Todos os direitos reservados</h1>
    </div>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>

    <script>
        $(function(){
            $('.alert').fadeOut(3000)
        })
    </script>
</body>
</html>