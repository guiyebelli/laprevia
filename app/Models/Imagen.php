<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagenes';

    protected $fillable = ['nombre'];


    public function __toString()
    {
        return sprintf("%s", $this->nombre);
    }
}
