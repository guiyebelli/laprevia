<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Models\Producto;
use App\Models\Categoria;

use App\Http\Requests;
use App\Http\Requests\ProductosRequest;
use App\Http\Controllers\Controller;

class ProductosController extends Controller
{
  public function index()
  {
    $data['productos'] = Producto::all();
    return view('backend.productos.index', $data);
  }

  public function create()
  {
    $data['producto'] = new Producto;
    $data['categorias'] = colleccion_listado(Categoria::orderBy('nombre')->get());
    return view('backend.productos.create', $data);
  }

  public function store(ProductosRequest $request)
  {
    $input = $request->all();
    try
    {
      $categoria = Categoria::findOrFail($input['categoria_id']);
    }
    catch(ModelNotFoundException $e)
    {
      \Session::flash('error', 'La categoria no existe en la base de datos.');
      return redirect('administracion/productos');
    }

    $imagen = \Request::file('imagen');
    $nombre_imagen = save_imagen_thumbnail($imagen, path_productos());

    $input['imagen'] = $nombre_imagen;
    $input['estado'] = 1;
    $producto = Producto::create($input);

    \Session::flash('noticia', 'El producto con nombre "'.$producto->nombre.'" fue creado con exito.');
    return redirect('administracion/productos');
  }

  public function edit($id)
  {
    try
    {
      $data['producto'] = Producto::findOrFail($id);
      $data['categorias'] = colleccion_listado(Categoria::orderBy('nombre')->get());
      return view('backend.productos.edit', $data);
    } 
    catch (ModelNotFoundException $e)
    {
      \Session::flash('error', 'El producto no existe en la base de datos.');
      return redirect('administracion/productos');
    }
  }

  public function update(ProductosRequest $request, $id)
  {
    try
    {
      $producto = Producto::findOrFail($id);
      $input = $request->all();
      try
      {
        $categoria = Categoria::findOrFail($input['categoria_id']);
      }
      catch(ModelNotFoundException $e)
      {
        \Session::flash('error', 'La categoria no existe en la base de datos.');
        return redirect('administracion/productos');
      }

      $imagen = \Request::file('imagen');
      if ($imagen) 
      {
        \File::delete($producto->get_path_imagen());
        $nombre_imagen = save_imagen_thumbnail($imagen, path_productos());
        $input['imagen'] = $nombre_imagen;
      }
      $producto->update($input);

      \Session::flash('noticia', 'El producto con nombre "'.$producto->nombre.'" fue actualizado con exito.');
    }
    catch (ModelNotFoundException $e)
    {
      \Session::flash('error', 'El producto no existe en la base de datos.');
    }
    return redirect('administracion/productos');
  }

  public function destroy($id)
  {
    try
    {
      $producto = Producto::findOrFail($id);
      $producto->delete();

      \Session::flash('noticia', 'El producto con nombre "'.$producto->nombre.'" fue eliminado con exito.');
    }
    catch (ModelNotFoundException $e)
    {
      \Session::flash('error', 'El producto no pudo ser borrado.');
    }
    return redirect('administracion/productos');
  }

  public function activar($id)
  {
    $producto = Producto::findOrFail($id);
    $producto->update(['estado' => 1]);

    \Session::flash('noticia', 'El producto "'.$producto.'" fue activado con exito.');
    return redirect('administracion/productos');
  }

  public function desactivar($id)
  {
    try
    {
      $producto = Producto::findOrFail($id);
      $producto->update(['estado' => 0]);
      \Session::flash('noticia', 'El producto "'.$producto.'" fue desactivado con exito.');
    }
    catch(ModelNotFoundException $e)
    {
      \Session::flash('error', 'El producto no existe en la base de datos.');
    }

    return redirect('administracion/productos');
  }

  public function editar_stock($id)
  {
    $data['producto'] = Producto::findOrFail($id);
    $data['titulo'] = 'Cambio de stock del producto '.$data['producto'];
    $data['accion'] = ['ProductosController@update_stock', $data['producto']->id ];
    $data['metodo'] = 'PATCH';
    $data['boton'] = 'Actualizar';
    $data['cancelar'] = action('ProductosController@index');

    if (\Request::ajax())
    {
      $html = view('backend.productos.update_stock', $data);
      $response = array("title" => '<span class="glyphicon glyphicon-circle-arrow-up"></span> '.$data['titulo'], "html"=> utf8_encode($html));
      return \Response::json($response);
    }
    else
    {
      return view('backend.productos.update_stock', $data);
    }
  }

  public function update_stock(Request $request, $id)
  {
    try
    {
      $producto = Producto::findOrFail($id);
      $input = $request->all();
      $producto->update($input);
      \Session::flash('noticia', 'Stock del producto "'.$producto->nombre.'" actualizado con exito.');
    }
    catch (ModelNotFoundException $e)
    {
      \Session::flash('error', 'El producto no existe en la base de datos.');
    }
    return redirect('administracion/productos');
  }
}
