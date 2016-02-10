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
{!! Form::model($pessoa, array('route' => array('pessoas.update', $pessoa->id), 'method' => 'PUT')) !!}

	<!-- Inclui formulário com os campos nome e nascimento -->
	@include('form')

	<!-- Informações sobre atualização do registro -->
	<p>Criado em: {!! date('d/M/Y h:m:s', strtotime($pessoa->created_at)) !!}</p>
	<p>Última atualização: {!! date('d/M/Y h:m:s', strtotime($pessoa->updated_at)) !!}</p>

	<!-- Botões alterar e excluir -->
	<table>
		<tr>
			<td>
			{!! Form::open(array('url' => 'pessoas/' . $pessoa->id)) !!}
				{!! Form::hidden('_method', 'PUT') !!}
				{!! Form::submit('Alterar', array('class' => 'btn btn-info')) !!}
			{!! Form::close() !!}
			</td>
			<td>
			{!! Form::open(array('url' => 'pessoas/' . $pessoa->id, 'onsubmit' => 'return confirmarDel()')) !!}
				{!! Form::hidden('_method', 'DELETE') !!}
				{!! Form::submit('Excluir', array('class' => 'btn btn-warning')) !!}
			{!! Form::close() !!}
			</td>
		</tr>
	</table>
	
	<!-- Script confirmar exclusão -->
	<script>
		function confirmarDel() {
			return confirm("Confirme exclusão do registro!");
		}
	</script>
{!! Form::close() !!}
@stop