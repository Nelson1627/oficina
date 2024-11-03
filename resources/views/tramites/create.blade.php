@extends('layout.app')

@section('title', 'Crear Trámite')

@section('content')
<div class="container mt-5">
    <form action="{{ route('tramites.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-6">
                <label for="ID_Visita">Seleccionar Visita</label>
                <select class="form-control" name="ID_Visita" id="ID_Visita" required>
                    <option value="">Seleccione una visita</option>
                    @foreach($visitas as $visita)
                        <option value="{{ $visita->ID_Visita }}">{{ $visita->proposito }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-6">
                <label for="ID_Usuario">Seleccionar Usuario</label>
                <select class="form-control" name="ID_Usuario" id="ID_Usuario" required>
                    <option value="">Seleccione un usuario</option>
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->ID_Usuario }}">{{ $usuario->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 mt-3">
                <label for="Descripción">Descripción</label>
                <textarea class="form-control" name="Descripción" id="Descripción" required></textarea>
            </div>
            <div class="col-6 mt-3">
                <label for="Estado">Estado</label>
                <select class="form-control" name="Estado" id="Estado" required>
                    <option value="Pendiente">Pendiente</option>
                    <option value="En Proceso">En Proceso</option>
                    <option value="Finalizado">Finalizado</option>
                </select>
            </div>
            <div class="col-6 mt-3">
                <label for="Fecha_Creación">Fecha de Creación</label>
                <input type="datetime-local" class="form-control" name="Fecha_Creación" id="Fecha_Creación" required>
            </div>
        </div>
        <hr>
        <div class="col-12 mt-2">
            <button class="btn btn-success">Guardar</button>
        </div>
    </form>
</div>
@endsection
