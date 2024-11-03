<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;

    protected $table = 'usuarios';
    protected $primaryKey = 'ID_Usuario';

    protected $fillable = ['Nombre', 'Rol', 'Correo'];

    public function tramites()
    {
        return $this->hasMany(Tramites::class, 'ID_Usuario');
    }
}
