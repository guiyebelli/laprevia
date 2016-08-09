<?php namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Http\Requests;
use App\Http\Requests\UsuariosRequest;
use App\Http\Requests\ContraRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UsuariosController extends Controller 
{
	public function index()
	{
		try
		{
			$data['usuario'] = Usuario::findOrFail(\Auth::user()->id);
		}
		catch(ModelNotFoundException $e)
		{
			\Session::flash('error', 'El usuario no existe en la base de datos.');
			return redirect(url());
		}
		//todos los usuarios menos el logueado
		$data['usuarios'] = Usuario::where('id', '!=', \Auth::user()->id)->get();
		return view('backend.usuarios.index', $data);
	}

	public function create()
	{
		$data['usuario'] = new Usuario;
		return view('backend.usuarios.create', $data);
	}

	public function store(UsuariosRequest $request)
	{
		$input = $request->all();
		$input['password'] = \Hash::make('contra');
		$usuario = Usuario::create($input);

		\Session::flash('noticia', 'El usuario "'.$usuario->username.'" fue creado con exito.');
		return redirect('administracion/usuarios');
	}

	public function edit($id)
	{
		try
		{
			$data['usuario'] = Usuario::findOrFail($id);
		}
		catch(ModelNotFoundException $e)
		{
			\Session::flash('error', 'El usuario no existe en la base de datos.');
			return redirect('administracion/usuarios');
		}
		return view('backend.usuarios.edit', $data);
	}

	public function update($id, UsuariosRequest $request)
	{
		try{
			$usuario = Usuario::findOrFail($id);
			$usuario->update($request->all());
			\Session::flash('noticia', 'El usuario "'.$usuario->username.'" fue actualizada con exito.');
		}
		catch(ModelNotFoundException $e)
		{
			\Session::flash('error', 'El usuario no existe en la base de datos.');
		}
		return redirect('administracion/usuarios');
	}

	public function destroy($id)
	{
		try
		{
			$usuario = Usuario::findOrFail($id);
			$usuario->delete();
			\Session::flash('noticia', 'El usuario "'.$usuario->username.'" fue eliminado con exito.');
		}
		catch(ModelNotFoundException $e)
		{
			\Session::flash('error', 'El usuario no existe en la base de datos.');
		}
		return redirect('administracion/usuarios');
	}

	public function activar_pendiente($id)
	{
		try
		{
			$usuario = Usuario::findOrFail($id);
		}
		catch(ModelNotFoundException $e)
		{
			\Session::flash('error', 'El usuario no existe en la base de datos.');
			return redirect('administracion/usuarios');
		}
		$contra = str_random(10);
		$data['password'] = \Hash::make($contra);
		$data['estado'] = 1;
		$usuario->update($data);

		\Mail::send('emails.activacion', ['password' => $contra, 'username' => $usuario->username], function($message) use($usuario)
			{
				$message->from('no-reply@gmail.com', 'La Previa Delivery');
		    $message->to($usuario->email, $usuario)->subject('Activación');
			}
		);

		\Session::flash('noticia', 'El usuario "'.$usuario->username.'" fue activado con exito. Se le ha enviado un e-mail a "'.$usuario->email.'" con su conrrespondiente contraseña.');
		return redirect('administracion/usuarios');
	}

	public function activar($id)
	{
		$usuario = Usuario::findOrFail($id);
		$usuario->update(['estado' => 1]);

		\Session::flash('noticia', 'El usuario "'.$usuario->username.'" fue activado con exito.');
		return redirect('administracion/usuarios');
	}

	public function desactivar($id)
	{
		try
		{
			$usuario = Usuario::findOrFail($id);
		}
		catch(ModelNotFoundException $e)
		{
			\Session::flash('error', 'El usuario no existe en la base de datos.');
			return redirect('administracion/usuarios');
		}
		$usuario->update(['estado' => 0]);

		\Session::flash('noticia', 'El usuario "'.$usuario->username.'" fue desactivado con exito.');
		return redirect('administracion/usuarios');
	}

	public function restablecer_contra($id)
	{
		try
		{
			$usuario = Usuario::findOrFail($id);
		}
		catch(ModelNotFoundException $e)
		{
			\Session::flash('error', 'El usuario no existe en la base de datos.');
			return redirect('administracion/usuarios');
		}
		$contra = str_random(10);
		$usuario->update(['password' => encriptar_contra($contra)]);

		\Mail::send('emails.restablecer_contra', ['password' => $contra, 'username' => $usuario->username], function($message) use($usuario)
			{
				$message->from('no-reply@gmail.com', 'La Previa Delivery');
		    $message->to($usuario->email, $usuario)->subject('Restablecimiento de contraseña.');
			}
		);

		\Session::flash('noticia', 'Se le ha generado una nueva contraseña al usuario "'.$usuario->username.'", la misma se le fue mandada por mail.');
		return redirect('administracion/usuarios');
	}

	public function perfil($id)
	{
		try
		{
			$data['usuario'] = Usuario::findOrFail($id);
		}
		catch(ModelNotFoundException $e)
		{
			\Session::flash('error', 'El usuario no existe en la base de datos.');
			return redirect('administracion/usuarios');
		}
		return view('backend.usuarios.perfil', $data);
	}

	public function guardar_contra($id, ContraRequest $request)
	{
		try
		{
			$usuario = Usuario::findOrFail($id);
		}
		catch(ModelNotFoundException $e)
		{
			\Session::flash('error', 'El usuario no existe en la base de datos.');
			return redirect('administracion/usuarios');
		}
		$input = $request->all();
		$usuario->update(['password' => encriptar_contra($input['password'])]);

		\Session::flash('noticia', 'Nueva contraseña actualizada con exito.');
		return redirect('administracion/usuarios/'.$usuario->id.'/edit');
	}

}
