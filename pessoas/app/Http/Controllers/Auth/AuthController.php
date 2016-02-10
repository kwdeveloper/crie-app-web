<?php namespace App\Http\Controllers\Auth;

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

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Input;
use Redirect;
use Session;
use Validator;
//
use App\Pessoa;
use Auth;
use Resources\Views;

use App\Http\Requests;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		// $this->middleware('guest', ['except' => 'getLogout']);
	}

	/**
	 * Handle an authentication attempt.
	 *
	 * @return Response
	 */
/* 	public function authenticate()
	{
		if (Auth::attempt(['name' => $name, 'password' => $password]))
		{
			return redirect()->intended('dashboard');
		}
	} */

	/* */
	public function doLogin()
	{
		$rules = array(
			'name' => 'required',
			'password' => 'required|min:5'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails())
		{
			Session::flash('message', 'Falha no login: '. $validator->messages());

			return Redirect::to('login')
				->withErrors($validator)
				->withInput(Input::except('password'));
		}
		else
		{
			$userdata = array(
				'name' => Input::get('name'),
				'password' => Input::get('password')
			);

			if (Auth::attempt($userdata))
			{
				return Redirect::to('pessoas');
			}
		}

		Session::flash('message', 'Falha no login: usuário ou senha inválida!' );
		return Redirect::to('login')
				->withErrors($validator)
				->withInput(Input::except('password'));
	}

	/* */
	public function doLogout()
	{
		Auth::logout();
		return Redirect::to('login');
	}

	/* */
	public function showLogin()
	{
		return view('login');
	}

}
