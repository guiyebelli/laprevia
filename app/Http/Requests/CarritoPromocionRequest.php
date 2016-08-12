<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CarritoPromocionRequest extends Request 
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return array(
			'objeto_id' => 'required',
			'cantidad' => 'required',
		);
	}
}