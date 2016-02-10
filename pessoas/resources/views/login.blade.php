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
<div class='row'>
	{!! Form::open(array('url' => 'login', 'class' => 'form-horizontal')) !!}
		<div class="form-group">
			{!! Form::label('name', 'Usuário', array('class' => 'col-sm-2 control-label')) !!}
			<div class='col-sm-10'>
				{!! Form::text('name', Input::old('name')) !!}

			</div>
		</div>

		<div class="form-group">
			{!! Form::label('password', 'Senha', array('class' => 'col-sm-2 control-label')) !!}
			<div class='col-sm-10'>
				{!! Form::password('password', Input::get(''), array('class' => 'form-control')) !!}
			</div>
		</div>

		<div class="form-group">
			<div class='col-sm-offset-2 col-sm-10'>
				{!! Form::submit('Logar', array('class' => 'btn btn-primary')) !!}
			</div>
		</div>
	{!! Form::close() !!}
</div>
@stop
