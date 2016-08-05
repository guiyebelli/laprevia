<?php namespace App\Http\Controllers;

use App\Models\Producto;
use App\Http\Requests\CarritoProductoRequest;
use App\Models\Promocion;
use Cart;

class CarritoComprasController extends Controller 
{
	public function __construct()
	{
	}

	public function index()
	{
		$data['carrito'] = Cart::content();
		return view('frontend.carritocompras.index', $data);
	}

	public function add_producto(CarritoProductoRequest $request)
	{
		$input = $request->all();
		$producto = Producto::findOrFail($input['producto_id']);

		Cart::add(array('id' => $input['producto_id'], 'name' => $producto->nombre, 'qty' => $input['cantidad'], 'price' => $producto->precio));

		\Session::flash('noticia', 'El producto "'.$producto->nombre.'" ha sido agregado con exito al carrio.');
		return redirect('micarrito');
	}
	
}