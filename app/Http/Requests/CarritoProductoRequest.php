<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CarritoProductoRequest extends Request 
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return array(
			'producto_id' => 'required',
			'cantidad' => 'required',
		);
	}
}