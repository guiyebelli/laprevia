<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CarritoPedidoRequest extends Request 
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return array(
			'comprador' => 'required',
			'telefono' => 'required',
			'email' => 'required|email',
			'direccion' => 'required',
			'monto' => 'required',
		);
	}
}