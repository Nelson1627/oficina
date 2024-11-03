@extends('layout.app')

@section('title', 'Crear Visitante')

@section('content')
<div class="container mt-5">
    <h2>Crear Visitante</h2>
    
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

    <form action="{{ route('visitantes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Nombre">Nombre</label>
            <input type="text" class="form-control" name="Nombre" id="Nombre" required>
        </div>
        <div class="form-group">
            <label for="Documento_ID">Documento ID</label>
            <input type="text" class="form-control" name="Documento_ID" id="Documento_ID" required>
        </div>
        <div class="form-group">
            <label for="Telefono">Teléfono</label>
            <input type="text" class="form-control" name="Telefono" id="Telefono">
        </div>
        <div class="form-group">
            <label for="Correo">Correo</label>
            <input type="email" class="form-control" name="Correo" id="Correo">
        </div>
        <br>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
