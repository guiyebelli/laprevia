<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class LoginRequest extends Request
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return array(
			'username' => 'required',
            'password' => 'required',
		);
	}

}