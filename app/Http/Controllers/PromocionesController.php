<?php

namespace App\Http\Controllers;

use App\Models\Promocion;
use Illuminate\Http\Request;
use App\Http\Requests\PromocionesRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PromocionesController extends Controller
{
    public function index()
    {
        $data['promociones'] = Promocion::all();
        return view('backend.promociones.index', $data);
    }

    public function create()
    {
        $data['promocion'] = new Promocion;
        return view('backend.promociones.create', $data);
    }

    public function store(PromocionesRequest $request)
    {
        $imagen = \Request::file('imagen');
        $nombre_imagen = save_file($imagen, path_promociones());
        $input = $request->all();
        $input['imagen'] = $nombre_imagen;
        $input['estado'] = 1;
        $promocion = Promocion::create($input);

        \Session::flash('noticia', 'La promoci&oacute;n con nombre "'.$promocion->nombre.'" fue creada con exito.');
        return redirect('administracion/promociones');
    }

    public function edit($id)
    {
        try
        {
            $data['promocion'] = Promocion::findOrFail($id);
            return view('backend.promociones.edit', $data);
        } 
        catch (ModelNotFoundException $e)
        {
            \Session::flash('error', 'La promoci&oacute;n no existe en la base de datos.');
            return redirect('administracion/promociones');
        }
    }

    public function update(PromocionesRequest $request, $id)
    {
        try
        {
            $promocion = Promocion::findOrFail($id);
            $input = $request->all();

            $imagen = \Request::file('imagen');
            if ($imagen) 
            {
                \File::delete($promocion->get_path_imagen());
                $nombre_imagen = save_file($imagen, path_promociones());;
                $input['imagen'] = $nombre_imagen;
            }
            $promocion->update($input);

            \Session::flash('noticia', 'La promoci&oacute;n con nombre "'.$promocion.'" fue actualizada con &eacute;xito.');
        }
        catch (ModelNotFoundException $e)
        {
            \Session::flash('error', 'La promoci&oacute;n no existe en la base de datos.');
        }
        return redirect('administracion/promociones');
    }

    public function destroy($id)
    {
        try
        {
            $promocion = Promocion::findOrFail($id);
            $promocion->delete();

            \Session::flash('noticia', 'La promoci&oacute;n con nombre "'.$promocion.'" fue eliminada con &eacute;xito.');
        }
        catch (ModelNotFoundException $e)
        {
            \Session::flash('error', 'La promoci&oacute;n no pudo ser borrado.');
        }
        return redirect('administracion/promociones');
    }

    public function activar($id)
    {
        $promocion = Promocion::findOrFail($id);
        $promocion->update(['estado' => 1]);

        \Session::flash('noticia', 'La promoci&oacute;n "'.$promocion.'" fue activada con &eacute;xito.');
        return redirect('administracion/promociones');
    }

    public function desactivar($id)
    {
        try
        {
            $promocion = Promocion::findOrFail($id);
            $promocion->update(['estado' => 0]);
            \Session::flash('noticia', 'La promoci&oacute;n "'.$promocion.'" fue desactivada con &eacute;xito.');
        }
        catch(ModelNotFoundException $e)
        {
            \Session::flash('error', 'La promoci&oacute;n no existe en la base de datos.');
        }

        return redirect('administracion/promociones');
    }
}
