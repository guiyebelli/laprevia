<?php namespace App\Http\Controllers;

use Auth;
use App\Models\Usuario;
use App\Http\Requests;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LoginController extends Controller 
{
	public function index()
	{
		return view('login.login');
	}

	public function authenticate(LoginRequest $request)
	{
		if ( \Auth::attempt( ['username' => \Request::input('username'), 'password' => \Request::input('password'), 'estado' => true] ) )
		{
			return redirect('administracion/usuarios');
		}
		else
		{
			\Session::flash('authenticate', 'El usuario o contraseña son inválidos.');
			return redirect('login');
		}
	}

}