@extends('layout.app')

@section('title', 'Modificar Visita')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Modificar Visita</h1>
    <h5 class="text-center">Formulario para actualizar visitas</h5>
    <hr>
    <form action="{{ route('visitas.update', $visita->ID_Visita) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="id_visitante">Seleccionar Visitante</label>
            <select class="form-control" name="ID_Visitante" id="id_visitante" required>
                @foreach($visitantes as $visitante)
                    <option value="{{ $visitante->ID_Visitante }}" {{ $visitante->ID_Visitante == $visita->ID_Visitante ? 'selected' : '' }}>
                        {{ $visitante->Nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="fecha_hora_entrada">Fecha y Hora de Entrada</label>
            <input type="datetime-local" class="form-control" id="fecha_hora_entrada" name="Fecha_Hora_Entrada" value="{{ \Carbon\Carbon::parse($visita->Fecha_Hora_Entrada)->format('Y-m-d\TH:i') }}" required>
        </div>
        
        <div class="form-group">
            <label for="fecha_hora_salida">Fecha y Hora de Salida</label>
            <input type="datetime-local" class="form-control" id="fecha_hora_salida" name="Fecha_Hora_Salida" value="{{ $visita->Fecha_Hora_Salida ? \Carbon\Carbon::parse($visita->Fecha_Hora_Salida)->format('Y-m-d\TH:i') : '' }}">
        </div>
        
        <div class="form-group">
            <label for="proposito">Propósito</label>
            <select class="form-control" name="Proposito" id="proposito" required>
                <option value="">Seleccione un propósito</option>
                @foreach(['Reunión de trabajo', 'Entrevista', 'Entrega de documentos', 'Consulta de servicios', 'Capacitación', 'Revisión de proyectos', 'Asesoría legal', 'Atención al cliente', 'Actualización de datos', 'Networking'] as $proposito)
                    <option value="{{ $proposito }}" {{ $visita->Proposito == $proposito ? 'selected' : '' }}>{{ $proposito }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="col-12 mt-2">
            <button type="submit" class="btn btn-success">Actualizar</button>
        </div>
    </form>
</div>
@endsection
