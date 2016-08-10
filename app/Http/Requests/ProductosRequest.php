<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductosRequest extends Request 
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		$rules = array(
			'nombre' => 'required',
			'precio' => 'required',
			'descripcion' => 'required',
			'tipo' => 'required',
		);

		if ( $this->method() == 'POST') 
		{
			$rules['imagen'] = 'required';
		}

		return $rules;
	}
}