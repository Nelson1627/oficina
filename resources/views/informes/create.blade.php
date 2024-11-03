@extends('layout.app')

@section('title', 'Crear Informe')

@section('content')

<div class="container mt-5">
    <h2>Crear Informe</h2>
    <form action="{{ route('informes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="ID_Visita">Seleccionar Visita</label>
            <select class="form-control" name="ID_Visita" id="ID_Visita" required>
                <option value="">Seleccione una visita</option>
                @foreach($visitas as $visita)
                    <option value="{{ $visita->ID_Visita }}">{{ $visita->proposito }}</option> <!-- Cambiado a proposito -->
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="ID_Usuario">Seleccionar Usuario</label>
            <select class="form-control" name="ID_Usuario" id="ID_Usuario" required>
                <option value="">Seleccione un usuario</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->ID_Usuario }}">{{ $usuario->Nombre }}</option> <!-- Asegúrate de que el campo sea correcto -->
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="Fecha_Informe">Fecha del Informe</label>
            <input type="datetime-local" class="form-control" name="Fecha_Informe" id="Fecha_Informe" required>
        </div>
        <div class="form-group">
            <label for="Contenido">Contenido</label>
            <textarea class="form-control" name="Contenido" id="Contenido" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Crear Informe</button>
    </form>
</div>

@endsection
