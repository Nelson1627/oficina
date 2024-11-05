<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf; 
use App\Models\Visitas;

class ReportController extends Controller
{
    public function reporteUno() 
    {  
        $data = Visitas::select( 
                "visita.ID_Visita", 
                "visita.Fecha_Hora_Entrada", 
                "visita.Fecha_Hora_Salida", 
                "visita.Proposito",
                "visitante.Nombre as visitantes"
            ) 
            ->join('visitante', 'visitantes.ID_Visitante', '=', 'visita.ID_Visitante')
            ->get();  
    
        
        $pdf = Pdf::loadView('reports.reporte1', compact('data'));

        return $pdf->stream('visitas.pdf'); 
    }
    
}
