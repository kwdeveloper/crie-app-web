<!--
  NOTA

  O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos
  web com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e
  Laravel"
  Wilson Kawano

  O código-fonte pode ser livremente usado desde que o conteúdo da presente
  NOTA não seja suprimido
-->

{{-- Nome da pessoa --}}
<div class="form-group">
    {!! Form::label('nome', 'Nome') !!}
    {!! Form::text('nome', Input::old(''), array('class' => 'form-control')) !!}
</div>

{{-- Data de nascimento da pessoa --}}
<div class="form-group">
    {!! Form::label('nascimento', 'Nascimento') !!}

    @if(isset($pessoa))
        {!! Form::text('nascimento', date('d-m-Y', strtotime($pessoa->nascimento)), array('class' => 'form-control')) !!}
    @else
        {!! Form::text('nascimento', Input::old(''), array('class' => 'form-control')) !!}
    @endif
</div>
