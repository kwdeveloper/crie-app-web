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
    <title>Laravel - Cidades do Brasil</title>
<!--
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"> </script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
-->
    <link rel="stylesheet" href={{asset("css/bootstrap.min.css")}}>
    <link rel="stylesheet" href={{asset("css/bootstrap-theme.min.css")}}>
    <script src={{asset("js/jquery-2.1.3.min.js")}}> </script>
    <script src={{asset("js/bootstrap.min.js")}}> </script>
  </head>
  <body>
    <div class='container'>
      <!-- Menu no topo da página -->
      <div class="nav navbar navbar-inverse">
        <div class="navbar-inner">
          <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('cidades') }}">Cidades</a>
          </div>
          <ul class="nav navbar-nav">
            <li><a data-toggle="modal" data-target="#modal-search">Pesquisar</a></li>
          </ul>
        </div>
      </div>

      <!-- Conteúdo principal da página -->
      <table class='table'>
        <tr>
          <th>Código</th>
          <th>Cidade</th>
          <th>Estado</th>
        </tr>

        @foreach($cidades as $cidade)
          <tr>
            <td>{{$cidade->codigo}}</td>
            <td id="link-cidade" onclick='showMap("{{$cidade->nome}}", {{$cidade->latitude}}, {{$cidade->longitude}})'><a data-toggle="modal" data-target="#modal-map">{{$cidade->nome}}</a></td>
            <td id="link-estado">{{$cidade->sigla_estado}}</td>
          </tr>
        @endforeach
      </table>

      <!-- Rodapé acesso às páginas -->
      <div class="row">
        <div class="col-sm-12 text-center">
          <nav>
            <?php echo $cidades->render(); ?>
          </nav>
        </div>
      </div>

      <!-- Cria janela modal com opções de pesquisa -->
      <div class="modal" id="modal-search">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <input type="input" class="form-control" id="search-val" placeholder="Nome da cidade ...">

              <!-- Botões de rádio para tipo de pesquisa -->
              <div class="radio">
                <label>
                  <input type="radio" name="search-type" id="opt1" value="0" checked>
                  Exatamente
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="search-type" id="opt2" value="1">
                  Inicia com
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="search-type" id="opt3" value="2">
                  Contém
                </label>
              </div>
            </div>

            <!-- Botão executar pesquisa -->
            <div class="modal-footer">
              <button class="btn btn-primary" id="btn-search" data-dismiss="modal">Pesquisar</button>
            </div>
          </div>
        </div>
      </div>  <!-- modal -->

      <!-- Cria janela modal para mostrar mapa -->
      <div class="modal" id="modal-map">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <div id="map-canvas"></div>
            </div>
          </div>
        </div>
      </div>

    </div>  <!-- container -->
  </body>

<!--
  <link type="text/css" rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}" />
  <link type="text/css" rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-theme.min.css') }}" />
  <script type="text/javascript" src="{{ URL::asset('assets/js/jquery-2.1.0.min.js') }}"> </script>
  <script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"> </script>
-->

  <!-- JavaScript para converter a opções de pesquisa selecionadas num link -->
  <script>
    $(function() {
      $("#btn-search").click(function() {
        console.log($("input[name=search-type]:checked").val());
        console.log($("#search-val").val());

        var val = $("#search-val").val();
        if (val.length == 0)
          val = "_";

        // Chamar método do controller
        // Configure aqui o endereço do site (exemplo: www.meusite.com/cidades)
        // O link localhost:8000/cidades/ é valido quando se usa o servidor PHP de desenvolvimento
        // via comando "php artisan serve"
        window.location.replace("http://localhost:8000/cidades/" +
          $("input[name=search-type]:checked").val() + "/" + val + "/search");
       });
    });
  </script>

  <!-- Biblioteca para acessar o Google Maps -->
  <script src="https://maps.googleapis.com/maps/api/js"></script>

  <!-- JavaScript para renderizar o mapa -->
  <script>
    var map;
    var marker;
    var mapLatLng

    /* */
    function showMap(nome, latitude, longitude) {
      var mapCanvas = document.getElementById('map-canvas');

      mapLatLng = new google.maps.LatLng(latitude, longitude)

      var mapOptions = {
        center: mapLatLng,
        zoom: 10,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }

      map = new google.maps.Map(mapCanvas, mapOptions);

      marker = new google.maps.Marker({
        position: mapLatLng,
        map: map,
        title: nome
      });
    }

    /* */
    $("#modal-map").on("shown.bs.modal", function() {
      google.maps.event.trigger(map, 'resize');
      map.setCenter(mapLatLng);
    })
  </script>

  <!-- Formatação CSS para o canvas onde se apresenta o mapa -->
  <style>
    #map-canvas {
      background-color: #CCC;
      height: 400px;
      margin-left: auto;
      margin-right: auto;
      width: 500px;
    }
  </style>
</html>