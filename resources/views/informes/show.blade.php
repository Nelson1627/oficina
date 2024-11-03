@extends('layout.app')

@section('title', 'Detalles del Informe')

@section('content')
<style>
    body {
        background-image: url('https://i.pinimg.com/originals/2e/fa/74/2efa7485320e4e8ead33bad9e03106d9.gif');
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
    <h1 class="text-center mb-4 text-primary">Detalles del Informe</h1>
    <hr class="my-4">
    <div class="text-right mb-3">
        <a class="btn btn-primary btn-lg" href="{{ route('informes.create') }}">Agregar nuevo informe</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover shadow-lg">
            <thead class="thead-light">
                <tr>
                    <th>ID Informe</th>             
                    <th> Proposito de Visita</th>
                    <th>Nombre de Usuario</th>
                    <th>Fecha del Informe</th>
                    <th>Contenido</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($informes as $informe)
                <tr>
                    <td>{{ $informe->ID_Informe }}</td>                    
                    <td>{{ optional($informe->visita)->Proposito }}</td> <!-- Cambiado a Proposito -->
                    <td>{{ optional($informe->usuario)->Nombre }}</td>
                    <td>{{ \Carbon\Carbon::parse($informe->Fecha_Informe)->format('d/m/Y H:i') }}</td>
                    <td>{{ $informe->Contenido }}</td>
                    <td>
                        <a href="{{ route('informes.edit', $informe->ID_Informe) }}" class="btn btn-outline-warning">Editar</a>
                        <form action="{{ route('informes.destroy', $informe->ID_Informe) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este informe?');">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
