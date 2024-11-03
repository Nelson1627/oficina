<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitantes;
use App\Models\Visitas;

class VisitasController extends Controller
{
    public function index()
    {
        $visitas = Visitas::with('visitante')->get(); // Cargar la relación
        return view('visitas.show')->with(['visitas' => $visitas]);
    }

    public function create()
    {
        $visitantes = Visitantes::all();
        return view('visitas.create', compact('visitantes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ID_Visitante' => 'required|integer',
            'Fecha_Hora_Entrada' => 'required|date',
            'Fecha_Hora_Salida' => 'nullable|date|after:Fecha_Hora_Entrada',
            'Proposito' => 'required|string'
        ]);
    
        try {
            Visitas::create($data);
            return redirect()->route('visitas.index')->with('success', 'Visita creada con éxito');
        } catch (\Exception $e) {
            return redirect()->route('visitas.create')->with('error', 'Error al crear visita: ' . $e->getMessage());
        }
    }    

    public function edit($id)
    {
        $visita = Visitas::findOrFail($id);
        $visitantes = Visitantes::all(); // Para el formulario de edición
        return view('visitas.update', compact('visita', 'visitantes'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'ID_Visitante' => 'required|integer',
            'Fecha_Hora_Entrada' => 'required|date',
            'Fecha_Hora_Salida' => 'nullable|date|after:Fecha_Hora_Entrada',
            'Proposito' => 'required|string'
        ]);
    
        $visita = Visitas::findOrFail($id);
        $visita->update($data);
    
        return redirect()->route('visitas.index')->with('success', 'Visita actualizada con éxito');
    }
    
    public function destroy($id)
    {
        try {
            Visitas::destroy($id);
            return redirect()->route('visitas.index')->with('success', 'Visita eliminada con éxito');
        } catch (\Exception $e) {
            return redirect()->route('visitas.index')->with('error', 'Error al eliminar visita: ' . $e->getMessage());
        }
    }

    public function __construct() 
    { 
        $this->middleware('auth'); 
    }
}
