<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class PromocionesRequest extends Request 
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
			'precio_original' => 'required',
			'descripcion' => 'required',
			'stock' => 'required',
		);

		if ( $this->method() == 'POST') 
		{
			$rules['imagen'] = 'required';
		}

		return $rules;
	}
}