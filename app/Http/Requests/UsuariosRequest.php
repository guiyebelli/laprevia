<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsuariosRequest extends Request 
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		$rules = array(
			'nombre' => 'required|min:2|max:255',
            'apellido' => 'required|min:2|max:255',
            'email' => 'required|email|min:6|max:255|unique:usuarios',
		);

		if ( $this->method() == 'POST') 
		{
			$rules['username'] = 'required|min:6|max:100|unique:usuarios';
		}

		return $rules;
	}

}