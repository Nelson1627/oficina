@extends('layout.app')

@section('title', 'Crear Usuario')

@section('content')

<div class="container mt-5">
    <h2>Crear Usuario</h2>
    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="Nombre" id="nombre" required>
        </div>
        <div class="form-group">
            <label for="rol">Rol</label>
            <select class="form-control" name="Rol" id="rol" required>
                <option value="">Selecciona un rol</option>
                @foreach($roles as $rol)
                    <option value="{{ $rol }}">{{ ucfirst($rol) }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" class="form-control" name="Correo" id="correo" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>

@endsection
