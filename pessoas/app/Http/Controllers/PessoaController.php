<?php namespace App\Http\Controllers;

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

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Input;
use Redirect;
use Session;
use Validator;
//
use App\Pessoa;
use Auth;
// use Resources\Views;


class PessoaController extends Controller {

	/* */
	public function __construct()
	{	
		// $this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pessoas = Pessoa::all();
		return view('main', ['pessoas' => $pessoas]);
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		return $this->save(
			'',
			'pessoas/create',
			'Incluiu registro com sucesso!',
			'Erro ao tentar incluir registro' );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$pessoa = Pessoa::find($id);
		return view('show', ['pessoa' => $pessoa]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		return $this->save(
				$id,
				'pessoas/' . $id . '/edit',
				'Atualizou registro com sucesso!',
				'Erro ao tentar atualizar registro' );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$pessoa = Pessoa::find($id);
		$pessoa->delete();

		Session::flash('message', 'Excluiu registro com sucesso!');
		return Redirect::to('pessoas');
	}

	/* */
	private function save($id, $link, $msgOk, $msgErro)
	{
		// Validação: regras
		$rules = array(
				'nome'       => 'required',
				'nascimento' => array('required', 'date_format:"d-m-Y"')
		);

		// Validação: processamento
		$validator = Validator::make(Input::all(), $rules);

		// Validação: tratamento de erros
		if ($validator->fails()) {
			// Voltar para tela de edição e mostrar mensagem de erro
			Session::flash('message',
					$msgErro . ' (' . $validator->messages() . ')');

			return Redirect::to($link)
					->withErrors($validator)
					->withInput();
		}

		// Se ID não foi definido, incluir nova pessoa
		if (empty($id))
			$pessoa = new Pessoa;
		// Se ID existe, alterar dados da pessoa
		else
			$pessoa = Pessoa::find($id);

		$pessoa->nome  = trim(Input::get('nome'));
		$pessoa->nascimento = date('Y-m-d',
				strtotime(Input::get('nascimento')));
		$pessoa->save();

		// Voltar para página principal e
		// mostrar mensagem de sucesso
		Session::flash('message', $msgOk);
		return Redirect::to('pessoas');
	}
}