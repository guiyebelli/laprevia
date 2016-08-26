<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cart;

use App\Models\Producto;
use App\Models\Promocion;
use App\Models\Pedido;
use App\Models\Contenido;

use App\Http\Requests\CarritoProductoRequest;
use App\Http\Requests\CarritoPromocionRequest;

class CarritoComprasController extends Controller 
{
	public function index()
	{
		$data['carrito'] = Cart::content();
		$data['total'] = Cart::total();
		return view('frontend.carritocompras.index', $data);
	}

	public function add_producto(CarritoProductoRequest $request)
	{
		$input = $request->all();
		$producto = Producto::findOrFail($input['objeto_id']);

		if ($producto->stock >= $input['cantidad'])
		{
			$rowId = Cart::search(array('id' => $input['objeto_id']));
	    $item = Cart::get($rowId[0]);
	    if ($item)
	    {
				Cart::update($rowId[0], $input['cantidad']);
			}
			else
			{
				$carrito = array('id' => $input['objeto_id'],
												'name' => $producto->nombre,
												'qty' => $input['cantidad'],
												'price' => $producto->precio,
												'options' => ['accion' => 'CarritoComprasController@update_producto', 'descripcion' => $producto->descripcion]
				);
				Cart::add($carrito);
				$response = array(
		      'status' => 'success',
		      'msj' => '"'.$producto->nombre.'" agregado al carrito.',
		      'cant_carrito' => count(Cart::content()),
		    );
			}
		}
		else
		{
			$response = array(
	      'status' => 'error',
	      'msj' => 'Stock insuficiente. Solo disponemos de '.$producto->stock.'productos.',
	    );
		}

		return \Response::json($response);
	}

	public function add_promocion(CarritoPromocionRequest $request)
	{
		$input = $request->all();
		$promocion = Promocion::findOrFail($input['objeto_id']);

		if ($promocion->stock >= $input['cantidad'])
		{
			$rowId = Cart::search(array('id' => $input['objeto_id']));
	    $item = Cart::get($rowId[0]);
			if ($item)
	    {
				Cart::update($rowId[0], $input['cantidad']);
			}
			else
			{
				$carrito = array('id' => $input['objeto_id'],
												'name' => $promocion->nombre,
												'qty' => $input['cantidad'],
												'price' => $promocion->precio,
												'options' => ['accion' => 'CarritoComprasController@update_promocion', 'descripcion' => $promocion->descripcion]
				);
				Cart::add($carrito);
				$response = array(
		      'status' => 'success',
		      'msj' => '"'.$promocion->nombre.'" agregada al carrito.',
		      'cant_carrito' => count(Cart::content()),
		    );
			}
		}
		else
		{
			$response = array(
	      'status' => 'error',
	      'msj' => 'Stock insuficiente. Solo disponemos de '.$promocion->stock.'promociones',
	    );
		}
		return \Response::json($response);
	}

	public function update_promocion(Request $request)
	{
		$input = $request->all();
		$promocion = Promocion::findOrFail($input['objeto_id']);
		$response = CarritoComprasController::update($promocion->stock, $input, 'promociones');

	  return \Response::json($response);
	}

	public function update_producto(Request $request)
	{
		$input = $request->all();
		$producto = Producto::findOrFail($input['objeto_id']);
		$response = CarritoComprasController::update($producto->stock, $input, 'productos');

	  return \Response::json($response);
	}

	private function update($stock, $input, $tipo)
	{
		$rowId = Cart::search(array('id' => $input['objeto_id']));
    $item = Cart::get($rowId[0]);

    if ($item)
    {
    	switch ($input['metodo']) {
    		case 'sumar':
  				if ($stock > $item->qty)
  				{
						Cart::update($rowId[0], $item->qty + 1);
						$response = array(
				      'status' => 'success',
				      'total' => '$'.Cart::total(),
				      'subtotal' => '$'.$item->subtotal,
				      'cantidad' => $item->qty,
				      'id_item' => $item->id,
				    );
  				}
  				else
  				{
  					$response = array(
				      'status' => 'error',
				      'msj' => 'Stock insuficiente. Solo disponemos de '.$stock.' '.$tipo,
				    );
  				}
    			break;
    		case 'restar':
    			if ($item->qty != 1)
    			{
						Cart::update($rowId[0], $item->qty - 1);
						$response = array(
				      'status' => 'success',
				      'total' => '$'.Cart::total(),
				      'subtotal' => '$'.$item->subtotal,
				      'cantidad' => $item->qty,
				      'id_item' => $item->id,
				    );
    			}
    			break;
    	}
    }
    return $response;
	}

	public function empty_cart()
	{
		Cart::destroy();
		return redirect('micarrito');
	}

	public function destroy($id)
	{
		$rowId = Cart::search(array('id' => $id));
		Cart::remove($rowId[0]);

		return redirect('micarrito');
	}

	public function send()
	{
		$data['carrito'] = Cart::content();
		$data['total'] = Cart::total();
		$data['pedido'] = new Pedido;

		$data['metodo'] = 'POST';
		$data['titulo'] = 'Realizar pedido';
		$data['accion'] = ['CarritoComprasController@make_order'];
		$data['boton'] = 'Enviar';
		$data['cancelar'] = action('CarritoComprasController@index');
    
    return view('frontend.carritocompras.form', $data);
	}
	
	public function make_order()
	{

	}
}