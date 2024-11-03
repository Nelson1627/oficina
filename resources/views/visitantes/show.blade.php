@extends('layout.app')

@section('title', 'Lista de Visitantes')

@section('content')
<style>
    body {
        background-image: url('https://i.pinimg.com/originals/16/9c/11/169c11293f5c08a325ee1bbc8a0d4cb8.gif');
        background-size: cover; /* Asegura que el fondo cubra toda la pantalla */
        background-position: center; /* Centra la imagen de fondo */
        height: 100vh; /* Asegura que el body ocupe toda la altura de la ventana */
        margin: 0; /* Elimina márgenes por defecto */
    }

    .container {
        background-color: rgba(217, 230, 232, 0.67); /* Fondo blanco con opacidad para mejorar la legibilidad */
        border-radius: 10px; /* Bordes redondeados */
        padding: 20px; /* Espaciado interno */
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Sombra para darle profundidad */
    }

    h1 {
        font-family: 'Arial Black', sans-serif;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        background-color: rgb(244, 246, 235);
    }
    tbody {
        background-color: rgba(171, 190, 198, 0.234);
    }

    .table th {
        background-color: #ffa600;
        color: rgba(195, 148, 7, 0.545);
    }

    .table td {
        transition: background-color 0.3s;
    }

    .table tr:hover td {
        background-color: #2f68a25b;
    }
</style>

<div class="container mt-5">
    <h1 class="text-center mb-4 text-primary">Lista de Visitantes</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="text-right mb-3">
        <a class="btn btn-primary btn-lg" href="{{ route('visitantes.create') }}">Agregar nuevo visitante</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover shadow-lg">
            <thead class="thead-light">
                <tr>
                    <th>ID Visitante</th>
                    <th>Nombre</th>
                    <th>Documento ID</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($visitantes as $visitante)
                <tr>
                    <td>{{ $visitante->ID_Visitante }}</td>
                    <td>{{ $visitante->Nombre }}</td>
                    <td>{{ $visitante->Documento_ID }}</td>
                    <td>{{ $visitante->Telefono }}</td>
                    <td>{{ $visitante->Correo }}</td>
                    <td>
                        <a href="{{ route('visitantes.edit', $visitante->ID_Visitante) }}" class="btn btn-outline-warning">Editar</a>
                        <form action="{{ route('visitantes.destroy', $visitante->ID_Visitante) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este visitante?');">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
