<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    protected $table = 'promociones';

    protected $fillable = ['nombre', 'precio', 'precio_original', 'descripcion', 'imagen'];

    public function __toString()
    {
        return sprintf("%s", $this->nombre);
    }
}
