<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    use HasFactory;

    protected $table = 'informes';
    protected $primaryKey = 'ID_Informe';
    public $timestamps = true;

    protected $fillable = [
        'ID_Visita',
        'ID_Usuario',
        'Fecha_Informe',
        'Contenido'
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
