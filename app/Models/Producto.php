<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    protected $fillable = ['nombre', 'precio', 'descripcion', 'imagen', 'estado'];

    public function __toString()
    {
        return sprintf("%s", $this->nombre);
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
