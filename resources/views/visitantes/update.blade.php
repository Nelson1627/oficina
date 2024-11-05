@extends('layout.app')

@section('title', 'Modificar Visitante')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Modificar Visitante</h1>
    <h5 class="text-center">Formulario para actualizar datos del visitante</h5>
    <hr>

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

    <form action="{{ route('visitantes.update', $visitante->ID_Visitante) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="Nombre" value="{{ old('Nombre', $visitante->Nombre) }}" required>
            @error('Nombre')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="documento_id">Documento ID</label>
            <input type="text" class="form-control" id="documento_id" name="Documento_ID" value="{{ old('Documento_ID', $visitante->Documento_ID) }}" required pattern="\d{8}-\d{1}" title="Formato: 12345678-9">
            @error('Documento_ID')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="tel" class="form-control" id="telefono" name="Telefono" value="{{ old('Telefono', $visitante->Telefono) }}" pattern="\d{8}" title="Debe tener exactamente 8 dígitos">
            @error('Telefono')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="correo">Correo Electrónico</label>
            <input type="email" class="form-control" id="correo" name="Correo" value="{{ old('Correo', $visitante->Correo) }}">
            @error('Correo')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button class="btn btn-success" type="submit">Actualizar</button>
    </form>
</div>
@endsection
