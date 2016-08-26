<?php

namespace App\Models;

use App\Models\Contenido;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pedido extends Model
{
    protected $table = 'pedidos';

    protected $fillable = ['comprador','telefono','email','direccion','comentario','estado','monto','total'];

    public function __toString()
    {
        return sprintf("%s", $this->comprador);
    }

    public function contenidos()
    {
        return $this->hasMany('App\Models\Contenido');
    }
}
