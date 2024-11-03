<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tramites extends Model
{
    use HasFactory;

    protected $table = 'tramites';
    protected $primaryKey = 'ID_Tramite';
    public $timestamps = true;

    protected $fillable = [
        'ID_Visita',
        'ID_Usuario',
        'Descripción',
        'Estado',
        'Fecha_Creación',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'ID_Usuario');
    }

    public function visita()
    {
        return $this->belongsTo(Visitas::class, 'ID_Visita');
    }

   
}
