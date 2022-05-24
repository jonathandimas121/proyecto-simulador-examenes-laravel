<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1 class="center"style="text-align: center">Reporte de resultados</h1>
    <label class="text-center"><strong>DATOS GENERALES</strong></label>
    <br>
    <label><strong>Nombre del docente:</strong> {{auth()->user()->name}} </label>
    <br>
    <label><strong>ID del docente:</strong> {{auth()->user()->id}} </label>
    <br><br>

    <label><strong>Calificacion general</strong></label>
    <div class="container">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-20">
            <table style="background-color: white; text-align: left; width: 100%; border-collapse:collapse">
                <thead style="background-color: #246355; border-bottom: solid 5px #0F362D; color: white;">
                    <tr>
                        <th style="border: solid 1px black; padding: 10px;">ID de Resultado</th> 
                        <th style="border: solid 1px black; padding: 10px;">ID del alumno</th> 
                        <th style="border: solid 1px black; padding: 10px;">Alumno</th> 
                        <th style="border: solid 1px black; padding: 10px;">Titulo del examen</th> 
                        <th style="border: solid 1px black; padding: 10px;">Número de intentos</th> 
                        <th style="border: solid 1px black; padding: 10px;">Promedio</th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach ($calFinal as $calFinales)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        {{-- <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            Apple MacBook Pro 17"
                        </th> --}}
                            <td style="border: solid 1px black; padding: 10px;">{{$calFinales->id}}</td>
                            <td style="border: solid 1px black; padding: 10px;">{{$calFinales->idAlumno}}</td>
                            <td style="border: solid 1px black; padding: 10px;">{{$calFinales->alumno}}</td>
                            <td style="border: solid 1px black; padding: 10px;">{{$calFinales->tituloExamen}}</td>
                            <td style="border: solid 1px black; padding: 10px;">{{$calFinales->intentos}}</td>
                            <td style="border: solid 1px black; padding: 10px;">{{$calFinales->promedio}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
        
    {{-- ------------------------------------------------------------------- --}}
    <br>
    <label><strong>Calificaciones individuales</strong></label>
    <div class="container">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-20">
            <table style="background-color: white; text-align: left; width: 100%; border-collapse:collapse">
                <thead style="background-color: #246355; border-bottom: solid 5px #0F362D; color: white;">
                    <tr>
                        <th style="border: solid 1px black; padding: 10px;">ID de Resultado</th> 
                        <th style="border: solid 1px black; padding: 10px;">ID del alumno</th> 
                        <th style="border: solid 1px black; padding: 10px;">Alumno</th> 
                        <th style="border: solid 1px black; padding: 10px;">Titulo del examen</th> 
                        <th style="border: solid 1px black; padding: 10px;">Intento realizado</th> 
                        <th style="border: solid 1px black; padding: 10px;">Calificacion</th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listaCal as $calificaciones)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        {{-- <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            Apple MacBook Pro 17"
                        </th> --}}
                            <td style="border: solid 1px black; padding: 10px;">{{$calificaciones->idResultado}}</td>
                            <td style="border: solid 1px black; padding: 10px;">{{$calificaciones->idAlumno}}</td>
                            <td style="border: solid 1px black; padding: 10px;">{{$calificaciones->alumno}}</td>
                            <td style="border: solid 1px black; padding: 10px;">{{$calificaciones->tituloExamen}}</td>
                            <td style="border: solid 1px black; padding: 10px;">{{$calificaciones->numIntento}}</td>
                            <td style="border: solid 1px black; padding: 10px;">{{$calificaciones->calificacion}}</td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</body>
</html>