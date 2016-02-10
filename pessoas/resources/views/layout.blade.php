<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<!--
  NOTA

  O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos
  web com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e
  Laravel"
  Wilson Kawano

  O código-fonte pode ser livremente usado desde que o conteúdo da presente
  NOTA não seja suprimido
-->
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Laravel - Cadastro de pessoas</title>
    </head>
    <body>
        <div class="container">
            <!-- Menu no topo da página -->
            <div class="nav navbar navbar-inverse">
                <div class="navbar-inner">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="{{ url('pessoas') }}">Cadastro</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('pessoas/create') }}">Incluir</a></li>
                    </ul>
                    <ul class="nav navbar-nav pull-right">
                        <li><a href="{{ url('logout') }}" ><i class="glyphicon glyphicon-log-out"></i></a></li>
                    </ul>
                </div>
            </div>

            <!-- Conteúdo específico da página -->
            @yield('content')

            <!-- Rodapé com mensagem -->
            @if (Session::has('message'))
            <div class="nav navbar navbar-default navbar-fixed-bottom">
                <ul class="nav navbar-nav">
                    <li><a href="#">{{ Session::get('message') }}</a></li>
                </ul>
            </div>
            @endif
        </div>
    </body>

    <link type="text/css" rel="stylesheet" href={{asset("css/bootstrap.min.css")}} />
    <link type="text/css" rel="stylesheet" href={{asset("css/bootstrap-theme.min.css")}} />
<!--    <link type="text/css" rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" /> -->
<!--    <link type="text/css" rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css" /> -->
<!--    <link type="text/css" rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/glyphicons-halflings-regular.ttf" /> -->
</html>