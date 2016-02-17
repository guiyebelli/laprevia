<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContraRequest extends Request 
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'password' => 'required|min:3|confirmed',
			'password_confirmation' => 'required|min:3',
		];
	}

}