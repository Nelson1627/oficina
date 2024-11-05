<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Visitas</title>
    <style>
        table { 
            width: 100%; 
            font-size: 18px; 
            border: 1px solid black; 
            border-collapse: collapse; 
        } 
        th { 
            background-color: burlywood; 
            border: 1px solid black; 
            text-align: left; 
            padding: 8px; 
        } 
        td { 
            border: 1px solid black; 
            text-align: center; 
            padding: 8px; 
        } 
    </style>
</head>
<body>
    <h1 align="center">Listado de Visitas</h1>
    <hr><br> 
    <table>
        <tr>
            <th>ID de Visita</th>
            <th>ID de Visitante</th>
            <th>Fecha y Hora de Entrada</th>
            <th>Fecha y Hora de Salida</th>
            <th>Propósito</th>
        </tr> 
        @if($data->isEmpty())
            <tr>
                <td colspan="5" style="text-align: center;">No hay visitas registradas.</td>
            </tr>
        @else
            @foreach ($data as $item) 
            <tr>
                <td style="background-color: bisque">{{$item['ID_Visita']}}</td>
                <td>{{$item['ID_Visitante']}}</td>
                <td>{{$item['Fecha_Hora_Entrada']}}</td>
                <td>{{$item['Fecha_Hora_Salida']}}</td>
                <td>{{$item['Proposito']}}</td>
            </tr> 
            @endforeach 
        @endif
    </table> 
</body>
</html>
