<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; 
use App\Models\Visitantes;

class ReportVisitantesController extends Controller
{
    public function reporteUno() 
{ 
 // Extraer todos los productos
 $data = Visitantes::select( 
 "visitantes.ID_Visitante", 
"visitantes.Nombre", 
 "visitantes.Documento_ID", 

 ) 
 ->join("visitantes", "visitantes.ID_Visitante") 
 ->get(); 
 // Cargar vista del reporte con la data
 $pdf = Pdf::loadView('/reports/report1', compact('data')); 
 return $pdf->stream('visitantes.pdf');

}
}
