<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitas extends Model
{
    use HasFactory;

    protected $table = 'visitas';
    protected $primaryKey = 'ID_Visita';

    protected $fillable = ['ID_Visitante', 'Fecha_Hora_Entrada', 'Fecha_Hora_Salida', 'Proposito'];

    public function tramites()
    {
        return $this->hasMany(Tramites::class, 'ID_Visita');
    }

    public function visitante()
    {
        return $this->belongsTo(Visitantes::class, 'ID_Visitante');
    }

    public function informes()
    {
        return $this->hasMany(Informe::class, 'ID_Visita');
    }
}
