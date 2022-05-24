@extends('layouts.interface')

@section('title', 'Resultados')

@section('direccionhome')
{{ route('homedocente.index') }}
@endsection

@section('direccionexamen')
{{ route('homedocente.examen') }}
@endsection

@section('direccionresultados')
{{ route('homedocente.resultados') }}
@endsection


@section('content')
<div class='w-4/4 bg-pastel-50 h-4/4 m-10 mt-5 shadow rounded relative flow-root'>
    <div class='border border-2px h-9 bg-white text-center'>
      <label class='font-serif ml-2 text-2xl'>Reporte de calificaciones</label>
    </div>

    @if ($sizeRes<1)
        <h1 class="text-3xl text-center pt-8">No hay resultados disponibles</h1>
    @else

        <div class="flex justify-end">
            <a href="{{route('homedocente.descargarPDFDocente')}}" class="btn btn-sm btn-primary"><button class="bg-blue-400 hover:bg-blue-500 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center"><svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg><span>Descargar PDF</span></button></a>
        </div>

        <h1 class="text-3xl text-center pt-8">Calificación general</h1>

        <div class="container">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-20">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="border border-gray-400 px-4 py-2 text-gray-800">ID de Resultado</th> 
                            <th class="border border-gray-400 px-4 py-2 text-gray-800">ID del alumno</th> 
                            <th class="border border-gray-400 px-4 py-2 text-gray-800">Alumno</th> 
                            <th class="border border-gray-400 px-4 py-2 text-gray-800">Titulo del examen</th> 
                            <th class="border border-gray-400 px-4 py-2 text-gray-800">Número de intentos</th> 
                            <th class="border border-gray-400 px-4 py-2 text-gray-800">Promedio</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($calFinal as $calFinales)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            {{-- <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                Apple MacBook Pro 17"
                            </th> --}}
                                <td class="px-6 py-4">{{$calFinales->id}}</td>
                                <td class="px-6 py-4">{{$calFinales->idAlumno}}</td>
                                <td class="px-6 py-4">{{$calFinales->alumno}}</td>
                                <td class="px-6 py-4">{{$calFinales->tituloExamen}}</td>
                                <td class="px-6 py-4">{{$calFinales->intentos}}</td>
                                <td class="px-6 py-4">{{$calFinales->promedio}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
            
        {{-- ------------------------------------------------------------------- --}}
        <h1 class="text-3xl text-center pt-8">Calificaciones individuales</h1>
        <div class="container">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-20">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="border border-gray-400 px-4 py-2 text-gray-800">ID de Resultado</th> 
                            <th class="border border-gray-400 px-4 py-2 text-gray-800">ID del alumno</th> 
                            <th class="border border-gray-400 px-4 py-2 text-gray-800">Alumno</th> 
                            <th class="border border-gray-400 px-4 py-2 text-gray-800">Titulo del examen</th> 
                            <th class="border border-gray-400 px-4 py-2 text-gray-800">Intento realizado</th> 
                            <th class="border border-gray-400 px-4 py-2 text-gray-800">Calificacion</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listaCal as $calificaciones)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            {{-- <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                Apple MacBook Pro 17"
                            </th> --}}
                                <td class="px-6 py-4">{{$calificaciones->idResultado}}</td>
                                <td class="px-6 py-4">{{$calificaciones->idAlumno}}</td>
                                <td class="px-6 py-4">{{$calificaciones->alumno}}</td>
                                <td class="px-6 py-4">{{$calificaciones->tituloExamen}}</td>
                                <td class="px-6 py-4">{{$calificaciones->numIntento}}</td>
                                <td class="px-6 py-4">{{$calificaciones->calificacion}}</td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif 
    
</div> 
@endsection