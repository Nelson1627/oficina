<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuarios::all();
        return view('usuarios.show', compact('usuarios')); // Muestra la lista de usuarios
    }

    public function create()
    {
        $roles = ['Administrativo', 'Encargado', 'Otro'];
        return view('usuarios.create', compact('roles'));
    }

    public function store(Request $request)
    {
        // Validación de datos
        $data = $request->validate([
            'Nombre' => 'required|regex:/^[A-Za-z\s]+$/|max:255',
            'Rol' => 'required|in:Administrativo,Encargado,Otro',
            'Correo' => 'nullable|email|ends_with:@gmail.com'
        ], [
            'Nombre.required' => 'El nombre es obligatorio.',
            'Nombre.regex' => 'El nombre solo puede contener letras y espacios.',
            'Nombre.max' => 'El nombre no puede exceder 255 caracteres.',
            'Rol.required' => 'El rol es obligatorio.',
            'Rol.in' => 'El rol seleccionado no es válido.',
            'Correo.email' => 'El correo electrónico debe ser un formato válido.',
            'Correo.ends_with' => 'El correo electrónico debe terminar con @gmail.com.',
            'Correo.unique' => 'El correo electrónico ya está en uso.',
        ]);
    
        // Crear nuevo usuario
        Usuarios::create($data);
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado con éxito');
    }
    
    public function show($id)
    {
        $usuario = Usuarios::findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }

    public function edit($id)
    {
        $usuario = Usuarios::findOrFail($id);
        $roles = ['Administrativo', 'Encargado', 'Otro'];
        return view('usuarios.update', compact('usuario', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuarios::findOrFail($id);
    
        // Validación de datos
        $data = $request->validate([
            'Nombre' => 'required|regex:/^[A-Za-z\s]+$/|max:255',
            'Rol' => 'sometimes|required|in:Administrativo,Encargado,Otro',
            'Correo' => 'nullable|email|ends_with:@gmail.com'
        ], [
            'Nombre.required' => 'El nombre es obligatorio.',
            'Nombre.regex' => 'El nombre solo puede contener letras y espacios.',
            'Nombre.max' => 'El nombre no puede exceder 255 caracteres.',
            'Rol.required' => 'El rol es obligatorio.',
            'Rol.in' => 'El rol seleccionado no es válido.',
            'Correo.email' => 'El correo electrónico debe ser un formato válido.',
            'Correo.ends_with' => 'El correo electrónico debe terminar con @gmail.com.',
            'Correo.unique' => 'El correo electrónico ya está en uso.',
        ]);
    
        // Actualizar usuario
        $usuario->update($data);
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado con éxito');
    }

    public function destroy($id)
    {
        $usuario = Usuarios::find($id);
        if (!$usuario) {
            return redirect()->route('usuarios.index')->with('error', 'Usuario no encontrado');
        }

        try {
            $usuario->delete();
            return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado con éxito');
        } catch (\Exception $e) {
            return redirect()->route('usuarios.index')->with('error', 'Error al eliminar usuario: ' . $e->getMessage());
        }
    }
}
