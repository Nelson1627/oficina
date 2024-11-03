@extends('layout.app')

@section('title', 'Lista de Trámites')

@section('content')
<style>
    body {
        background-image: url('https://i.pinimg.com/originals/ab/28/6b/ab286b43dad5d7d542199f4365821e3d.gif');
        background-size: cover;
        background-position: center;
        height: 100vh;
        margin: 0;
    }

    .container {
        background-color: rgba(255, 239, 204, 0.9);
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }

    h1 {
        font-family: 'Arial Black', sans-serif;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        color: #FFD700;
    }

    .table th {
        background-color: #FFA500;
        color: white;
    }

    tbody {
        background-color: rgba(255, 255, 204, 0.7);
    }

    .table td {
        transition: background-color 0.3s;
    }

    .table tr:hover td {
        background-color: rgba(255, 165, 0, 0.5);
    }
</style>

<div class="container mt-5">
    <h1 class="text-center mb-4 text-primary">Lista de Trámites</h1>
    <hr class="my-4">
    <div class="text-right mb-3">
        <a class="btn btn-success btn-lg" href="{{ route('tramites.create') }}">Agregar nuevo trámite</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover shadow-lg">
            <thead class="thead-light">
                <tr>
                    <th>ID Trámite</th>
                    <th>Proposito de Visita</th> <!-- Cambiado a Nombre de Visita -->
                    <th>Nombre de Usuario</th> <!-- Cambiado a Nombre de Usuario -->
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Fecha de Creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tramites as $tramite)
                <tr>
                    <td>{{ $tramite->ID_Tramite }}</td>
                    <td>{{ optional($tramite->visita)->Proposito }}</td> <!-- Cambiado a Proposito -->
                    <td>{{ optional($tramite->usuario)->Nombre }}</td>
                    <td>{{ $tramite->Descripción }}</td>
                    <td>{{ $tramite->Estado }}</td>
                    <td>{{ \Carbon\Carbon::parse($tramite->Fecha_Creación)->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('tramites.edit', $tramite->ID_Tramite) }}" class="btn btn-outline-warning">Editar</a>
                        <form action="{{ route('tramites.destroy', $tramite->ID_Tramite) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este trámite?');">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>
</div>
@endsection
