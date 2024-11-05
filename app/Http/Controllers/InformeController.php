<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informe; 
use App\Models\Visitas;
use App\Models\Usuarios;

class InformeController extends Controller
{
    public function index()
    {
        $informes = Informe::with(['usuario', 'visita'])->get();
        $visitas = Visitas::all();
    
        return view('informes.show')->with([
            'informes' => $informes,
            'visitas' => $visitas
        ]);
    }
    
    public function create()
    {
        $visitas = Visitas::all();
        $usuarios = Usuarios::all();
        return view('informes.create', compact('visitas', 'usuarios'));
    }
    
    public function store(Request $request)
    {
        $data = $request->validate([
            'ID_Visita' => 'nullable|integer',
            'ID_Usuario' => 'nullable|integer',
            'Fecha_Informe' => 'required|date',
            'Contenido' => 'nullable|string'
        ]);

        try {
            Informe::create($data);
            return redirect()->route('informes.index')->with('success', 'Informe creado con éxito');
        } catch (\Exception $e) {
            return redirect()->route('informes.create')->with('error', 'Error al crear informe: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $informe = Informe::findOrFail($id);
        return view('informes.showDetail', compact('informe'));
    }

    public function edit($id)
    {
        $informe = Informe::findOrFail($id);
        $visitas = Visitas::all(); 
        $usuarios = Usuarios::all(); 
        return view('informes.update', compact('informe', 'visitas', 'usuarios'));
    }
    
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'ID_Visita' => 'nullable|integer',
            'ID_Usuario' => 'nullable|integer',
            'Fecha_Informe' => 'required|date',
            'Contenido' => 'nullable|string'
        ]);

        $informe = Informe::findOrFail($id);
        $informe->update($data);
        return redirect()->route('informes.index')->with('success', 'Informe actualizado con éxito');
    }

    public function destroy($id)
    {
        try {
            Informe::destroy($id);
            return redirect()->route('informes.index')->with('success', 'Informe eliminado con éxito');
        } catch (\Exception $e) {
            return response()->json(['res' => false, 'message' => $e->getMessage()]);
        }       
    }

    public function __construct() 
    { 
        $this->middleware('auth'); 
    }
}
