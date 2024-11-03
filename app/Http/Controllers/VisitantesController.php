<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitantes;

class VisitantesController extends Controller
{
    public function index()
    {
        $visitantes = Visitantes::all(); 
        return view('visitantes.show')->with(['visitantes' => $visitantes]); 
    }

    public function create()
    {
        return view('visitantes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'Nombre' => 'required',
            'Documento_ID' => 'required',
            'Telefono' => 'nullable',
            'Correo' => 'nullable|email'
        ]);

        try {
            Visitantes::create($data);
            return redirect()->route('visitantes.index')->with('success', 'Visitante creado con éxito');
        } catch (\Exception $e) {
            return redirect('/visitantes/create')->with('error', 'Error al crear Visitantes: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $visitante = Visitantes::findOrFail($id);
        return view('visitantes.showDetail')->with(['visitante' => $visitante]);
    }

    public function edit($id)
    {
        $visitante = Visitantes::findOrFail($id);
        return view('visitantes.update', ['visitante' => $visitante]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'Nombre' => 'required',
            'Documento_ID' => 'required',
            'Telefono' => 'nullable',
            'Correo' => 'nullable|email'
        ]);

        try {
            $visitante = Visitantes::findOrFail($id);
            $visitante->update($data);
            return redirect()->route('visitantes.index')->with('success', 'Visitante actualizado con éxito');
        } catch (\Exception $e) {
            return redirect()->route('visitantes.edit', $id)->with('error', 'Error al actualizar el visitante: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            Visitantes::destroy($id);
            return redirect()->route('visitantes.index')->with('success', 'Visitante eliminado con éxito');
        } catch (\Exception $e) {
            return redirect()->route('visitantes.index')->with('error', 'Error al eliminar el visitante: ' . $e->getMessage());
        }
    }

    public function __construct() 
    { 
        $this->middleware('auth'); 
    }
}
