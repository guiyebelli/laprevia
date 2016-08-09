<?php namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Promocion;

class InicioController extends Controller 
{
	public function __construct()
	{
	}

	public function index()
	{
		$data['productos'] = Producto::all();
		$data['promociones'] = Promocion::all();
		return view('frontend.index', $data);
	}

	public function promociones()
	{
		$data['promociones'] = Promocion::all();
		return view('frontend.listado_promociones', $data);

	}
	
}