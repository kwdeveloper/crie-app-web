<?php namespace App;

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

use Illuminate\Database\Eloquent\Model;

class Estado extends Model {
	public $timestamps = false;
	protected $table = 'estados';
	protected $primaryKey = 'sigla';
}
