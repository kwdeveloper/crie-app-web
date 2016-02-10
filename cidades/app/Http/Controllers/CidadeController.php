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

use App\Cidade;
// use Resources\Views;
// use View;

class CidadeController extends Controller {

  private $max_rows = 20;

  /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$cidades = Cidade::paginate($this->max_rows);
		return view('main', ['cidades' => $cidades]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	
	/* */
	public function search($type, $val)
	{
		if ($type == "0")
		{
			$cidades = Cidade::where('nome', $val)->paginate($this->max_rows);
		}
		elseif ($type == "1")
		{
			$cidades = Cidade::where('nome', 'LIKE', $val . '%')->paginate($this->max_rows);
		}
		elseif ($type == "2")
		{
			$cidades = Cidade::where('nome', 'LIKE', '%' . $val . '%')->paginate($this->max_rows);
		}
		else
		{
			$cidades = Cidade::where('nome', $val)->paginate($this->max_rows);
		}

		return view('main', ['cidades' => $cidades]);
	}	
}
