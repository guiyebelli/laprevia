<?php namespace App\Http\Controllers;

use App\Models\Producto;

class InicioController extends Controller 
{
	public function __construct()
	{
	}

	public function index()
	{
		$data['productos'] = Producto::all();
		return view('frontend.index', $data);
	}
	
}