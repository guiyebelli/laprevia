<?php

namespace App\Models;

use App\Models\Imagen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Promocion extends Model
{
    protected $table = 'promociones';

    protected $fillable = ['nombre', 'precio', 'precio_original', 'descripcion', 'imagen_id'];

    public function __toString()
    {
        return sprintf("%s", $this->nombre);
    }

    public function imagen()
	{
		return $this->belongsTo('App\Models\Imagen');
	}
}
