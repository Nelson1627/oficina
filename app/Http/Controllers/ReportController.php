<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; 
use App\Models\Visitas;

class ReportController extends Controller
{
    public function reporteUno() 
    {  
        // Extraer todas las visitas
        $data = Visitas::select( 
                "visitas.ID_Visita", 
                "visitas.ID_Visitante", 
                "visitas.Fecha_Hora_Entrada", 
                "visitas.Fecha_Hora_Salida", 
                "visitas.Proposito",
                "visitante.nombre as ID_visitante"
            ) 
            ->join('visitante', 'visitante.ID_Visitante', '=', 'visitas.ID_Visitante') // Cargar relación con Visitantes
            ->get(); 

        // Cargar vista del reporte con la data
        $pdf = Pdf::loadView('reports.report1', compact('data')); 

        return $pdf->stream('visitas.pdf'); // o usar download('visitas.pdf') si prefieres descargar
    }
}
