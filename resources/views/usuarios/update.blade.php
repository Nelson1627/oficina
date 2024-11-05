@extends('layout.app')

@section('title', 'Modificar Usuario')

@section('content')

<div class="container mt-5">
    <h1 class="text-center">Modificar Usuario</h1>
    <h5 class="text-center">Formulario para actualizar datos del usuario</h5>
    <hr>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <form action="{{ route('usuarios.update', $usuario->ID_Usuario) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="id_usuario">ID Usuario</label>
            <input type="text" class="form-control" id="id_usuario" name="id_usuario" value="{{ $usuario->ID_Usuario }}" required readonly>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control @error('Nombre') is-invalid @enderror" id="nombre" name="Nombre" value="{{ old('Nombre', $usuario->Nombre) }}" required>
            @error('Nombre')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="rol">Rol</label>
            <select name="Rol" id="rol" class="form-control @error('Rol') is-invalid @enderror">
                <option value="Administrativo" {{ $usuario->Rol == 'Administrativo' ? 'selected' : '' }}>Administrativo</option>
                <option value="Encargado" {{ $usuario->Rol == 'Encargado' ? 'selected' : '' }}>Encargado</option>
                <option value="Otro" {{ $usuario->Rol == 'Otro' ? 'selected' : '' }}>Otro</option>
            </select>
            @error('Rol')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="correo">Correo Electrónico</label>
            <input type="email" class="form-control @error('Correo') is-invalid @enderror" id="correo" name="Correo" value="{{ old('Correo', $usuario->Correo) }}" required>
            @error('Correo')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
</div>

@endsection
