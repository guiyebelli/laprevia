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
		$data['total'] = Cart::total();
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

	public function add_promocion(CarritoPromocionRequest $request)
	{
		$input = $request->all();
		$promocion = Promocion::findOrFail($input['promocion_id']);
		Cart::add(array('id' => $input['promocion_id'], 'name' => $promocion->nombre, 'qty' => $input['cantidad'], 'price' => $promocion->precio));

		\Session::flash('noticia', 'La promocion "'.$promocion->nombre.'" ha sido agregado con exito al carrio.');
		return redirect('micarrito');
	}

	public function actualizar($id)
	{
		$rowId = Cart::search(array('id' => $id));
		// // suma
		// Cart::update($rowId[0], $item->qty + 1);
		// // resta
		// Cart::update($rowId[0], $item->qty 1);
	}

	public function destroy($id)
	{
		$rowId = Cart::search(array('id' => $id));
		Cart::remove($rowId[0]);

		return redirect('micarrito');
	}
	
}