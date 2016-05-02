<?php namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Promocion;

class CarritoComprasController extends Controller 
{
	public function __construct()
	{
	}

	public function index()
	{
		return view('frontend.carritocompras.index', $data);
	}
	
}