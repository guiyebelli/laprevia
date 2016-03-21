<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Requests\ProductosRequest;

use App\Http\Requests;
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
        return view('backend.productos.create', $data);
    }

    public function store(ProductosRequest $request)
    {
        $imagen = \Request::file('imagen');
        $nombre_imagen = save_file($imagen, path_productos());
        $input = $request->all();
        $input['imagen'] = $nombre_imagen;
        $producto = Producto::create($input);

        \Session::flash('noticia', 'El producto con nombre "'.$producto->nombre.'" fue creado con exito.');
        return redirect('administracion/productos');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
