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

@section('content')
{!! Form::open(array('url' => 'pessoas')) !!}

    <!-- Formulário com os campos nome e nascimento -->
    @include('form')

    <!-- Botão gravar -->
    {!! Form::submit('Gravar', array('class' => 'btn btn-primary')) !!}
{!! Form::close() !!}
@stop
