@extends('layout.app')

@section('title', 'Detalles de Usuarios')
<style>
    body {
        background-image: url('https://i.pinimg.com/originals/d0/b6/69/d0b6699c086df2e9d298d1589eb07857.gif');
        background-size: cover;
        background-position: center;
        height: 100vh;
        margin: 0;
    }

    .container {
        background-color: rgba(255, 228, 228, 0.67); /* Fondo claro con opacidad */
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }

    h1 {
        font-family: 'Arial Black', sans-serif;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        background-color: rgb(255, 204, 204); /* Fondo rojo claro */
        color: #b22222; /* Color de texto rojo oscuro */
    }

    tbody {
        background-color: rgba(255, 200, 200, 0.234);
    }

    .table th {
        background-color: #ff6347; /* Color de fondo rojo tomate */
        color: white; /* Texto blanco */
    }

    .table td {
        transition: background-color 0.3s;
    }

    .table tr:hover td {
        background-color: rgba(255, 99, 71, 0.853); /* Color de fondo al pasar el mouse */
    }
</style>

@section('content')

<div class="container mt-5">
    <h1 class="text-center mb-4">Lista de Usuarios</h1>
    <hr class="my-4">
    <div class="text-right mb-3">
        <a class="btn btn-danger btn-lg" href="{{ route('usuarios.create') }}">Agregar nuevo usuario</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered shadow-lg mt-4">
            <thead class="thead-light">
                <tr>
                    <th>ID Usuario</th>
                    <th>Nombre</th>
                    <th>Rol</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->ID_Usuario }}</td>
                    <td>{{ $usuario->Nombre }}</td>
                    <td>{{ $usuario->Rol }}</td>
                    <td>{{ $usuario->Correo }}</td>
                    <td>
                        <a href="{{ route('usuarios.edit', $usuario->ID_Usuario) }}" class="btn btn-outline-warning">Editar</a>
                        <form action="{{ route('usuarios.destroy', $usuario->ID_Usuario) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
