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

use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
*/

/* Principal */
Route::resource('pessoas', 'PessoaController');
Route::get('pessoas', ['middleware' => 'auth', 'uses' => 'PessoaController@index']);
Route::get('pessoas/create', ['middleware' => 'auth', 'uses' => 'PessoaController@create']);
Route::get('pessoas/{pessoas}/edit', ['middleware' => 'auth', 'uses' => 'PessoaController@edit']);

/* Autenticação */
Route::get('login', array('uses'  => 'Auth\AuthController@showLogin'));
Route::post('login', array('uses' => 'Auth\AuthController@doLogin'));
Route::get('logout', array('uses' => 'Auth\AuthController@doLogout'));
