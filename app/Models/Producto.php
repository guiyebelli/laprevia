<?php

namespace App\Models;

use App\Models\Imagen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Producto extends Model
{
    protected $table = 'productos';

    protected $fillable = ['nombre', 'precio', 'descripcion', 'imagen_id'];

    public function __toString()
    {
        return sprintf("%s", $this->nombre);
    }

    public function imagen()
	{
		return $this->belongsTo('App\Models\Imagen');
	}
}
