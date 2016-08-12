<?php

namespace App\Models;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Producto extends Model
{
    protected $table = 'productos';

    protected $fillable = ['nombre', 'precio', 'descripcion', 'imagen', 'estado', 'categoria_id'];

    public function __toString()
    {
        return sprintf("%s", $this->nombre);
    }

    public function categoria()
    {
        return $this->belongsTo('App\Models\Categoria');
    }

    public function delete()
    {
        \File::delete($this->get_path_imagen());
        parent::delete();
    }

    public function get_path_imagen()
    {
        return path_productos().$this->imagen;
    }

    public function get_imagen()
    {
        return url_productos().$this->imagen;
    }
}
