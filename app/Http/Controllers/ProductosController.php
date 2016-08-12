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
                \File::delete($producto->get_imagen());
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
}
