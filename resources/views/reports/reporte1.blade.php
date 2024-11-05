<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Lista de Visitas</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            padding: 20px;
            margin: auto;
            max-width: 800px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #007bff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:hover {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de Visitas</h1>
        <table>
            <thead>
                <tr>
                    <th>ID Visita</th>
                    <th>Nombre del Visitante</th>
                    <th>Fecha y Hora de Entrada</th>
                    <th>Fecha y Hora de Salida</th>
                    <th>Propósito</th>
                </tr>
            </thead>
            <tbody>
                @foreach($visitas as $visita)
                <tr>
                    <td>{{ $visita->ID_Visita }}</td>
                    <td>{{ $visita->visitante->Nombre ?? 'N/A' }}</td>
                    <td>{{ $visita->Fecha_Hora_Entrada }}</td>
                    <td>{{ $visita->Fecha_Hora_Salida ?? 'N/A' }}</td>
                    <td>{{ $visita->Proposito }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
