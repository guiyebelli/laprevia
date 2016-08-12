<?php namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Promocion;
use App\Models\Categoria;

class InicioController extends Controller 
{
	public function index()
	{
		$data['categorias'] = Categoria::all();
		$data['promociones'] = Promocion::where('visible', '=',0)->get();
		return view('frontend.index', $data);
	}

	public function promociones()
	{
		$data['promociones'] = Promocion::orderBy('nombre')->get();
		return view('frontend.listado_promociones', $data);
	}

	public function productos()
	{
		$data['categorias'] = Categoria::all();
		return view('frontend.listado_productos', $data);
	}

	public function categoria_producto($id)
	{
		$data['categoria'] = Categoria::findOrFail($id);
		$data['productos'] = Producto::where('categoria_id', '=',$id)->get();
		return view('frontend.listado_categoria_productos', $data);
	}
	
}