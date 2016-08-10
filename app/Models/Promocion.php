<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    protected $table = 'promociones';

    protected $fillable = ['nombre', 'precio', 'precio_original', 'descripcion', 'imagen', 'estado', 'visible'];

    public function __toString()
    {
        return sprintf("%s", $this->nombre);
    }

    public function get_path_imagen()
    {
        return path_promociones().$this->imagen;
    }

    public function get_imagen()
    {
        return url_promociones().$this->imagen;
    }

    public function delete()
    {
        \File::delete($this->get_path_imagen());
        parent::delete();
    }
}
