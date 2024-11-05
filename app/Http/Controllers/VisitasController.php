<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitantes;
use App\Models\Visitas;
use Illuminate\Support\Facades\Log;

class VisitasController extends Controller
{
    public function index()
    {
        $visitas = Visitas::with('visitante')->paginate(10); // Paginación
        return view('visitas.show')->with(['visitas' => $visitas]);
    }

    public function create()
    {
        $visitantes = Visitantes::all();
        return view('visitas.create', compact('visitantes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->validationRules());
        
        try {
            Visitas::create($data);
            return redirect()->route('visitas.index')->with('success', 'Visita creada con éxito');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('visitas.create')->with('error', 'Error al crear visita: ' . $e->getMessage());
        }
    }    

    public function edit($id)
    {
        $visita = Visitas::findOrFail($id);
        $visitantes = Visitantes::all();
        return view('visitas.update', compact('visita', 'visitantes'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate($this->validationRules());
        
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
            Log::error($e->getMessage());
            return redirect()->route('visitas.index')->with('error', 'Error al eliminar visita: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $visita = Visitas::with('visitante')->findOrFail($id);
        return view('visitas.show', compact('visita'));
    }

    private function validationRules()
    {
        return [
            'ID_Visitante' => 'required|integer|exists:visitantes,ID_Visitante',
            'Fecha_Hora_Entrada' => 'required|date|after_or_equal:now',
            'Fecha_Hora_Salida' => 'nullable|date|after:Fecha_Hora_Entrada',
            'Proposito' => 'required|string|max:255',
        ];
    }
}
