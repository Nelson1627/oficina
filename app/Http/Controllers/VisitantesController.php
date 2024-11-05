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
            'Nombre' => 'required|regex:/^[A-Za-z\s]+$/|max:255', // Solo letras y espacios
            'Documento_ID' => 'required|regex:/^\d{8}-\d{1}$/', // 8 dígitos seguidos de un guion y un dígito
            'Telefono' => 'nullable|digits:8', // Exactamente 8 dígitos
            'Correo' => 'nullable|email|ends_with:@gmail.com' // Debe terminar con @gmail.com
        ], [
            'Nombre.required' => 'El nombre es obligatorio.',
            'Nombre.regex' => 'El nombre solo puede contener letras y espacios.',
            'Documento_ID.required' => 'El Documento ID es obligatorio.',
            'Documento_ID.regex' => 'El Documento ID debe tener 8 dígitos seguidos de un guion y un dígito.',
            'Telefono.digits' => 'El teléfono debe tener exactamente 8 dígitos.',
            'Correo.email' => 'El correo electrónico debe ser válido.',
            'Correo.ends_with' => 'El correo electrónico debe terminar con @gmail.com.',
        ]);
    
        try {
            Visitantes::create($data);
            return redirect()->route('visitantes.index')->with('success', 'Visitante creado con éxito');
        } catch (\Exception $e) {
            return redirect('/visitantes/create')->with('error', 'Error al crear Visitantes: ' . $e->getMessage());
        }
    }
    
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'Nombre' => 'required|regex:/^[A-Za-z\s]+$/|max:255', // Solo letras y espacios
            'Documento_ID' => 'required|regex:/^\d{8}-\d{1}$/', // 8 dígitos seguidos de un guion y un dígito
            'Telefono' => 'nullable|digits:8', // Exactamente 8 dígitos
            'Correo' => 'nullable|email|ends_with:@gmail.com' // Debe terminar con @gmail.com
        ], [
            'Nombre.required' => 'El nombre es obligatorio.',
            'Nombre.regex' => 'El nombre solo puede contener letras y espacios.',
            'Documento_ID.required' => 'El Documento ID es obligatorio.',
            'Documento_ID.regex' => 'El Documento ID debe tener 8 dígitos seguidos de un guion y un dígito.',
            'Telefono.digits' => 'El teléfono debe tener exactamente 8 dígitos.',
            'Correo.email' => 'El correo electrónico debe ser válido.',
            'Correo.ends_with' => 'El correo electrónico debe terminar con @gmail.com.',
        ]);
    
        try {
            $visitante = Visitantes::findOrFail($id);
            $visitante->update($data);
            return redirect()->route('visitantes.index')->with('success', 'Visitante actualizado con éxito');
        } catch (\Exception $e) {
            return redirect()->route('visitantes.edit', $id)->with('error', 'Error al actualizar el visitante: ' . $e->getMessage());
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
