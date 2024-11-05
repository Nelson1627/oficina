@extends('layout.app')

@section('title', 'Modificar Informe')

@section('content')

<div class="container mt-5">
    <h1 class="text-center">Modificar Informe</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('informes.update', $informe->ID_Informe) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="ID_Informe">ID Informe</label>
            <input type="text" class="form-control" id="ID_Informe" name="ID_Informe" value="{{ $informe->ID_Informe }}" readonly>
        </div>
        <div class="form-group">
            <label for="ID_Visita">Seleccionar Visita</label>
            <select class="form-control" name="ID_Visita" id="ID_Visita" required>
                <option value="">Seleccione una visita</option>
                @foreach($visitas as $visita)
                    <option value="{{ $visita->ID_Visita }}" {{ $visita->ID_Visita == $informe->ID_Visita ? 'selected' : '' }}>
                        {{ $visita->Proposito }} <!-- Asegúrate de que 'descripcion' sea correcto -->
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="ID_Usuario">Seleccionar Usuario</label>
            <select class="form-control" name="ID_Usuario" id="ID_Usuario" required>
                <option value="">Seleccione un usuario</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->ID_Usuario }}" {{ $usuario->ID_Usuario == $informe->ID_Usuario ? 'selected' : '' }}>
                        {{ $usuario->Nombre }} <!-- Asegúrate de que 'Nombre' sea correcto -->
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="Fecha_Informe">Fecha del Informe</label>
            <input type="datetime-local" class="form-control" id="Fecha_Informe" name="Fecha_Informe" value="{{ \Carbon\Carbon::parse($informe->Fecha_Informe)->format('Y-m-d\TH:i') }}" required>
        </div>
        <div class="form-group">
            <label for="Contenido">Contenido</label>
            <textarea class="form-control" id="Contenido" name="Contenido" required>{{ $informe->Contenido }}</textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-success btn-block">Actualizar</button>
        </div>
    </form>
</div>

@endsection
