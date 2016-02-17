<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Usuario extends Authenticatable
{
    use CanResetPassword;
    
    protected $table = 'usuarios';

    protected $fillable = ['nombre', 'apellido', 'email', 'username', 'password', 'estado'];

    protected $hidden = ['password', 'remember_token'];

    public function __toString()
    {
        return sprintf("%s %s", $this->nombre, $this->apellido);
    }
}
