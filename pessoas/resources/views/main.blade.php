<!--
  NOTA

  O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos
  web com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e
  Laravel"
  Wilson Kawano

  O código-fonte pode ser livremente usado desde que o conteúdo da presente
  NOTA não seja suprimido
-->

<!-- Vínculo com a página base layout.blade.php -->
@extends('layout')

<!-- Conteúdo específico da página -->
@section('content')
    <table class='table'>
        <!-- Cabeçalho da tabela -->
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Nascimento</th>
        </tr>

        <!-- Linhas da tabela -->
        @foreach($pessoas as $pessoa)
        <tr>
            <td>{{ $pessoa->id }}</td>
            <td><a href="{{ url('pessoas/' . $pessoa->id . '/edit') }}">{{ $pessoa->nome }}</a></td>
            <td>{{ date('d/M/Y', strtotime($pessoa->nascimento)) }}</td>
        </tr>
        @endforeach
   </table>

@stop
