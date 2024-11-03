<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitantes extends Model
{
    use HasFactory;

    protected $table = 'visitantes';
    protected $primaryKey = 'ID_Visitante';

    protected $fillable = ['Nombre', 'Documento_ID', 'Telefono', 'Correo'];

    public function visitas()
    {
        return $this->hasMany(Visitas::class, 'ID_Visitante');
    }
}
