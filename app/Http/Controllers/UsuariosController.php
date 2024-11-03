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
        $data = $request->validate([
            'Nombre' => 'required',
            'Rol' => 'required|in:Administrativo,Encargado,Otro',
            'Correo' => 'required|email'
        ]);

        Usuarios::create($data);
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado con éxito'); // Cambiado a index
    }

    public function show($id)
    {
        $usuario = Usuarios::findOrFail($id);
        return view('usuarios.show', compact('usuario')); // Este está bien, pero no se usa para mostrar todos
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

        $data = $request->validate([
            'Nombre' => 'required',
            'Rol' => 'sometimes|required|in:Administrativo,Encargado,Otro',
            'Correo' => 'required|email'
        ]);

        $usuario->update($data);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado con éxito'); // Cambiado a index
    }

    public function destroy($id)
    {
        try {
            Usuarios::destroy($id);
            return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado con éxito');
        } catch (\Exception $e) {
            return redirect()->route('usuarios.index')->with('error', 'Error al eliminar usuario: ' . $e->getMessage());
        }
    }
}
