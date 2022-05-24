<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{!! asset('css/cardExamenDocente.css') !!}">
    <title>Document</title>
</head>
<body>
    <h1 class="text-center" style="text-align: center">Reporte de calificaciones</h1>
    <label class="text-center"><strong>DATOS GENERALES</strong></label>
    <br>
    <label><strong>Nombre del alumno:</strong> {{auth()->user()->name}} </label>
    <br>
    <label><strong>ID del alumno:</strong> {{auth()->user()->id}} </label>
    <br><br>

    <label><strong>Calificacion general</strong></label>

    <div class="container">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-20">
            <table style="background-color: white; text-align: left; width: 100%; border-collapse:collapse">
                <thead style="background-color: #246355; border-bottom: solid 5px #0F362D; color: white;">
                    <tr>
                        <th style="border: solid 1px black; padding: 20px;">ID de Resultado</th> 
                        <th style="border: solid 1px black; padding: 20px;">Docente</th> 
                        <th style="border: solid 1px black; padding: 20px;">Titulo del examen</th> 
                        <th style="border: solid 1px black; padding: 20px;">Número de intentos</th> 
                        <th style="border: solid 1px black; padding: 20px;">Promedio</th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach ($calFinal as $calFinales)
                        <tr style="border: solid 1px black;">
                        {{-- <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            Apple MacBook Pro 17"
                        </th> --}}
                            <td style="border: solid 1px black; padding: 20px;">{{$calFinales->id}}</td>
                            <td style="border: solid 1px black; padding: 20px;">{{$calFinales->docente}}</td>
                            <td style="border: solid 1px black; padding: 20px;">{{$calFinales->tituloExamen}}</td>
                            <td style="border: solid 1px black; padding: 20px;">{{$calFinales->intentos}}</td>
                            <td style="border: solid 1px black; padding: 20px;">{{$calFinales->promedio}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
        
    {{-- ------------------------------------------------------------------- --}}
    <br><br>
    <label><strong>Calificaciones individuales</strong></label>
    <div class="container">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-20">
            <table style="background-color: white; text-align: left; width: 100%; border-collapse:collapse">
                <thead style="background-color: #246355; border-bottom: solid 5px #0F362D; color: white;">
                    <tr>
                        <th style="border: solid 1px black; padding: 20px;">ID de Resultado</th> 
                        <th style="border: solid 1px black; padding: 20px;">Docente</th> 
                        <th style="border: solid 1px black; padding: 20px;">Titulo del examen</th> 
                        <th style="border: solid 1px black; padding: 20px;">Intento realizado</th> 
                        <th style="border: solid 1px black; padding: 20px;">Calificacion</th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listaCal as $calificaciones)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        {{-- <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            Apple MacBook Pro 17"
                        </th> --}}
                            <td style="border: solid 1px black; padding: 20px;">{{$calificaciones->idResultado}}</td>
                            <td style="border: solid 1px black; padding: 20px;">{{$calificaciones->docente}}</td>
                            <td style="border: solid 1px black; padding: 20px;">{{$calificaciones->tituloExamen}}</td>
                            <td style="border: solid 1px black; padding: 20px;">{{$calificaciones->numIntento}}</td>
                            <td style="border: solid 1px black; padding: 20px;">{{$calificaciones->calificacion}}</td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>