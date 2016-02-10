<?php

/*
 * NOTA
 *
 * O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos
 * web com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e
 * Laravel"
 * Wilson Kawano
 *
 * O código-fonte pode ser livremente usado desde que o conteúdo da presente
 * NOTA não seja suprimido
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCidadesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estados', function($table)
		{
			$table->string('sigla', 2);
			$table->string('nome', 30);
			$table->primary('sigla');
		});

		Schema::create('cidades', function($table)
		{
			$table->integer('codigo');
			$table->string('nome', 80);
			$table->string('sigla_estado', 2);
			$table->double('longitude');
			$table->double('latitude');
			$table->double('altitude');
			$table->primary('codigo');
			$table->foreign('sigla_estado')->references('sigla')->on('estados');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cidades');
		Schema::drop('estados');
	}

}
