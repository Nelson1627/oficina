@extends('layout.app')

@section('title', 'Crear Usuario')

@section('content')

<div class="container mt-5">
    <h2>Crear Usuario</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Nombre">Nombre</label>
            <input type="text" class="form-control" name="Nombre" id="Nombre" required>
        </div>
        <div class="form-group">
            <label for="rol">Rol</label>
            <select class="form-control @error('Rol') is-invalid @enderror" name="Rol" id="rol" required>
                <option value="">Selecciona un rol</option>
                @foreach($roles as $rol)
                    <option value="{{ $rol }}">{{ ucfirst($rol) }}</option>
                @endforeach
            </select>
            @error('Rol')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="Correo">Correo</label>
            <input type="email" class="form-control" name="Correo" id="Correo">
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>

@endsection
