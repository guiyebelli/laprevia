<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriasRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoriasController extends Controller
{
    public function index()
    {
        $data['categorias'] = Categoria::all();
        return view('backend.categorias.index', $data);
    }

    public function create()
    {
        $data['categoria'] = new Categoria;
        return view('backend.categorias.create', $data);
    }

    public function store(CategoriasRequest $request)
    {
        $imagen = \Request::file('imagen');
        $nombre_imagen = save_file($imagen, path_categorias());
        $input = $request->all();
        $input['imagen'] = $nombre_imagen;
        $categoria = Categoria::create($input);

        \Session::flash('noticia', 'La categor&iacute;a con nombre "'.$categoria->nombre.'" fue creada con exito.');
        return redirect('administracion/categorias');
    }

    public function edit($id)
    {
        try
        {
            $data['categoria'] = Categoria::findOrFail($id);
            return view('backend.categorias.edit', $data);
        } 
        catch (ModelNotFoundException $e)
        {
            \Session::flash('error', 'La categor&iacute;a no existe en la base de datos.');
            return redirect('administracion/categorias');
        }
    }

    public function update(CategoriasRequest $request, $id)
    {
        try
        {
            $categoria = Categoria::findOrFail($id);
            $input = $request->all();

            $imagen = \Request::file('imagen');
            if ($imagen) 
            {
                \File::delete($categoria->get_imagen());
                $nombre_imagen = save_file($imagen, path_categorias());;
                $input['imagen'] = $nombre_imagen;
            }
            $categoria->update($input);

            \Session::flash('noticia', 'La categor&iacute;a con nombre "'.$categoria.'" fue actualizada con &eacute;xito.');
        }
        catch (ModelNotFoundException $e)
        {
            \Session::flash('error', 'La categor&iacute;a no existe en la base de datos.');
        }
        return redirect('administracion/categorias');
    }
}
