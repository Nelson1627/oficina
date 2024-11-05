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
        color: #fff;
        font-family: 'Arial', sans-serif;
        overflow: hidden;
    }

    .login-background {
        background-color: rgba(0, 0, 0, 0.7); /* Fondo oscuro */
        padding: 50px;
        border-radius: 15px;
        text-align: center;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
        animation: fadeIn 1s ease-in-out;
    }

    h1 {
        font-size: 2.5rem;
        text-shadow: 2px 2px 4px rgba(255, 255, 255, 0.7);
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
        color: #fff;
    }

    .btn-outline-warning {
        border: 2px solid #ffc107;
        color: #ffc107;
    }

    .btn-outline-info {
        border: 2px solid #17a2b8;
        color: #17a2b8;
    }

    .btn:hover {
        transform: scale(1.1);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    }

    .info-section {
        margin-top: 30px;
        padding: 20px;
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        color: #333;
        text-align: left;
    }

    .info-section h2 {
        font-size: 2rem;
        color: #333;
    }

    .info-section p {
        font-size: 1rem;
        color: #555;
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
            <h1 class="display-4">¡Bienvenido al Sistema de Registro de Visitas a Oficina de JulNel Innovations!</h1>
            <p class="lead">Administra y controla las visitas a tu oficina de manera eficiente.</p>
            <a href="/visitantes/show" class="btn btn-outline-warning">VER VISITANTES</a>                    
            <a href="/visitantes/create" class="btn btn-outline-info">REGISTRAR NUEVO VISITANTE</a>
        </div>
        <div class="info-section">
            <h2>Información de la Empresa</h2>
            <p><strong>Nombre:</strong> JulNel Innovations</p>
            <p><strong>Ubicación:</strong> Itca Fepade Zacatecoluca, zacatecoluca</p>
            <p><strong>Teléfono:</strong> +503 4536 7890</p>
            <p><strong>Email:</strong> julnel@gmail.com</p>
        </div>
    </div>
</div>
@endsection
