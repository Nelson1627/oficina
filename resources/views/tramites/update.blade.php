@extends('layout.app')

@section('title', 'Modificar Trámite')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Modificar Trámite</h1>
    <form action="{{ route('tramites.update', $tramite->ID_Tramite) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="ID_Visita">Seleccionar Visita</label>
            <select class="form-control" name="ID_Visita" id="ID_Visita" required>
                <option value="">Seleccione una visita</option>
                @foreach($visitas as $visita)
                    <option value="{{ $visita->ID_Visita }}" {{ $visita->ID_Visita == $tramite->ID_Visita ? 'selected' : '' }}>
                        {{ $visita->proposito }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="ID_Usuario">Seleccionar Usuario</label>
            <select class="form-control" name="ID_Usuario" id="ID_Usuario" required>
                <option value="">Seleccione un usuario</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->ID_Usuario }}" {{ $usuario->ID_Usuario == $tramite->ID_Usuario ? 'selected' : '' }}>
                        {{ $usuario->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Descripción">Descripción</label>
            <textarea class="form-control" id="Descripción" name="Descripción" required>{{ $tramite->Descripción }}</textarea>
        </div>

        <div class="form-group">
            <label for="Estado">Estado</label>
            <select class="form-control" name="Estado" id="Estado" required>
                <option value="Pendiente" {{ $tramite->Estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="En Proceso" {{ $tramite->Estado == 'En Proceso' ? 'selected' : '' }}>En Proceso</option>
                <option value="Finalizado" {{ $tramite->Estado == 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
            </select>
        </div>

        <div class="form-group">
            <label for="Fecha_Creación">Fecha de Creación</label>
            <input type="datetime-local" class="form-control" id="Fecha_Creación" name="Fecha_Creación" value="{{ \Carbon\Carbon::parse($tramite->Fecha_Creación)->format('Y-m-d\TH:i') }}" required>
        </div>

        <div class="form-group">
            <button class="btn btn-success btn-block">Actualizar</button>
        </div>
    </form>
</div>
@endsection
