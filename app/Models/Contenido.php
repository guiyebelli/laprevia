<?php

namespace App\Models;

use App\Models\Pedido;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contenido extends Model
{
    protected $table = 'contenidos';

    protected $fillable = ['cantidad', 'nombre', 'descripcion', 'precio', 'subtotal', 'pedido_id'];

    public function __toString()
    {
        return sprintf("%s", $this->nombre);
    }

    public function pedido()
    {
        return $this->belongsTo('App\Models\Pedido');
    }

}
