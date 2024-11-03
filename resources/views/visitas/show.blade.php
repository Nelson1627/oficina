@extends('layout.app')

@section('title', 'Lista de Visitas')

@section('content')
<style>
    body {
        background-image: url('https://i.pinimg.com/originals/b9/e4/96/b9e4960c1476c78043d499d975f86cdb.gif');
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
    <h1 class="text-center mb-4 text-primary">Lista de Visitas</h1>
    <hr class="my-4">
    <div class="text-right mb-3">
        <a class="btn btn-primary btn-lg" href="{{ route('visitas.create') }}">Agregar nueva visita</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover shadow-lg">
            <thead class="thead-light">
                <tr>
                    <th>ID Visita</th>
                    <th>Nombre del Visitante</th> <!-- Cambiado para mostrar el nombre -->
                    <th>Fecha y Hora de Entrada</th>
                    <th>Fecha y Hora de Salida</th>
                    <th>Propósito</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($visitas as $visita)
                <tr>
                    <td>{{ $visita->ID_Visita }}</td>
                    <td>{{ $visita->visitante->Nombre ?? 'N/A' }}</td> <!-- Mostrar el nombre del visitante -->
                    <td>{{ $visita->Fecha_Hora_Entrada }}</td>
                    <td>{{ $visita->Fecha_Hora_Salida ?? 'N/A' }}</td>
                    <td>{{ $visita->Proposito }}</td>
                    <td>
                        <a href="{{ route('visitas.edit', $visita->ID_Visita) }}" class="btn btn-outline-warning">Editar</a>
                        <form action="{{ route('visitas.destroy', $visita->ID_Visita) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta visita?');">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

<style>
    body {
        background-color: #f8f9fa;
    }
    h1 {
        font-family: 'Arial Black', sans-serif;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
    }
    .table th {
        background-color: #007bff;
        color: white;
    }
    .table td {
        transition: background-color 0.3s;
    }
    .table tr:hover td {
        background-color: #e9ecef;
    }
</style>
