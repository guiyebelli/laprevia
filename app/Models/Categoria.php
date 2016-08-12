<?php

namespace App\Models;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $fillable = ['nombre','imagen'];

    public function __toString()
    {
        return sprintf("%s", $this->nombre);
    }

    public function productos()
    {
        return $this->hasMany('App\Models\Producto');
    }

    public function delete()
    {
        \File::delete($this->get_path_imagen());
        parent::delete();
    }

    public function get_path_imagen()
    {
        return path_categorias().$this->imagen;
    }

    public function get_imagen()
    {
        return url_categorias().$this->imagen;
    }
}
