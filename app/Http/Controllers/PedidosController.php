<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Models\Pedido;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PedidosController extends Controller
{
  public function index()
  {
    $data['pendientes'] = Pedido::where('estado', '=',0)->orderBy('created_at', 'DESC')->get();;
    $data['aceptados'] = Pedido::where('estado', '=',1)->orderBy('created_at', 'DESC')->get();;
    $data['cancelados'] = Pedido::where('estado', '=',2)->orderBy('created_at', 'DESC')->get();;
    return view('backend.pedidos.index', $data);
  }

  public function cambiar_estado($id)
  {
    $data['pedido'] = Pedido::findOrFail($id);
    $data['titulo'] = 'Cambio de estado del pedido del comprador '.$data['pedido']->comprador;
    $data['accion'] = ['PedidosController@update_estado', $data['pedido']->id ];
    $data['metodo'] = 'PATCH';
    $data['boton'] = 'Guardar';
    $data['cancelar'] = action('PedidosController@index');

    if (\Request::ajax())
    {
      $html = view('backend.pedidos.cambiar_estado', $data);
      $response = array("title" => '<span class="glyphicon glyphicon-circle-arrow-up"></span> '.$data['titulo'], "html"=> utf8_encode($html));
      return \Response::json($response);
    }
    else
    {
      return view('backend.productos.update_stock', $data);
    }
  }

  public function update_estado($id)
  {

  }

}