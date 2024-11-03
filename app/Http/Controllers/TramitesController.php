<?php

namespace App\Http\Controllers;

use App\Models\Tramites;
use App\Models\Usuarios;
use App\Models\Visitas;
use Illuminate\Http\Request;

class TramitesController extends Controller
{
    public function index()
    {
        $tramites = Tramites::with(['usuario', 'visita'])->get(); // Carga los trámites junto con los usuarios y visitas
        $visitas = Visitas::all(); // Carga todas las visitas
    
        return view('tramites.show')->with([
            'tramites' => $tramites,
            'visitas' => $visitas
        ]);
    }
    
    
    public function show($ID_Tramite)
    {
        $tramite = Tramites::findOrFail($ID_Tramite);
        return view('tramites.showDetail', compact('tramite'));
    }
    

    public function create()
    {
        $usuarios = Usuarios::all();
        $visitas = Visitas::all();
        return view('tramites.create', compact('usuarios', 'visitas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ID_Visita' => 'required|exists:visitas,ID_Visita',
            'ID_Usuario' => 'required|exists:usuarios,ID_Usuario',
            'Descripción' => 'required|string',
            'Estado' => 'required|string|in:Pendiente,En Proceso,Finalizado',
            'Fecha_Creación' => 'required|date',
        ]);

        Tramites::create($data); // Crear nuevo trámite
        return redirect()->route('tramites.index')->with('success', 'Trámite creado exitosamente.');
    }

    public function edit($ID_Tramite)
    {
        $tramite = Tramites::findOrFail($ID_Tramite);
        $usuarios = Usuarios::all();
        $visitas = Visitas::all();

        return view('tramites.update', compact('tramite', 'usuarios', 'visitas'));
    }

    public function update(Request $request, $ID_Tramite)
    {
        $tramite = Tramites::findOrFail($ID_Tramite);

        $data = $request->validate([
            'ID_Visita' => 'required|exists:visitas,ID_Visita',
            'ID_Usuario' => 'required|exists:usuarios,ID_Usuario',
            'Descripción' => 'required|string',
            'Estado' => 'required|string|in:Pendiente,En Proceso,Finalizado',
            'Fecha_Creación' => 'required|date',
        ]);

        $tramite->update($data); // Actualizar el trámite
        return redirect()->route('tramites.index')->with('success', 'Trámite actualizado exitosamente.');
    }

    public function destroy($ID_Tramite)
    {
        $tramite = Tramites::findOrFail($ID_Tramite);
        
        try {
            $tramite->delete(); // Eliminar el trámite
            return redirect()->route('tramites.index')->with('success', 'Trámite eliminado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('tramites.index')->with('error', 'Error al eliminar el trámite.');
        }
    }
}
