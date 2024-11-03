@extends('layouts.app2')

@section('content')
<style>
    body {
        background-image: url('https://i.pinimg.com/originals/45/67/a8/4567a837b545d22b9dcde81ccd98b70e.gif'); 
        background-size: cover;
        background-position: center;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        color: rgb(174, 14, 14);
        font-family: 'Arial', sans-serif;
        overflow: hidden;
    }

    .login-background {
        background-color: rgba(49, 227, 188, 0.526); /* Fondo oscuro con opacidad */
        padding: 40px;
        border-radius: 15px;
        text-align: center;
        box-shadow: 0 4px 30px rgba(162, 116, 116, 0.5);
        animation: fadeIn 1s ease-in-out;
    }

    h1 {
        font-size: 2.5rem;
        text-shadow: 2px 2px 4px rgba(211, 161, 161, 0.7);
    }

    p {
        font-size: 1.25rem;
        margin-bottom: 20px;
    }

    .btn {
        margin: 10px;
        padding: 10px 20px;
        border-radius: 5px;
        transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
        font-weight: bold;
    }

    .btn-outline-warning {
        border: 2px solid #ffc107;
        color: #ffc107;
    }

    .btn-outline-danger {
        border: 2px solid #dc3545;
        color: #dc3545;
    }

    .btn:hover {
        transform: scale(1.1); /* Efecto de zoom al pasar el ratón */
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<div class="login-background">
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">¡Bienvenido al Sistema de Registro de Visitas!</h1>
            <p class="lead">Administra y controla las visitas a tu oficina de manera eficiente.</p>
            <a href="/visitantes/show" class="btn btn-outline-warning">VER VISITANTES</a>
            <a href="/visitantes/create" class="btn btn-outline-danger">REGISTRAR NUEVO VISITANTE</a>
        </div>
    </div>
</div>
@endsection

@section('navbar')
<nav class="navbar navbar-expand-lg bg-dark navbar-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Inventario</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/home">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/visitas/show">Visitas</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
@endsection
