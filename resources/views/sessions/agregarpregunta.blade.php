@extends('layouts.interface')

@section('title', 'Examen')

@section('estilos')
    <link rel="stylesheet" href="{!! asset('css/agregarPregunta.css') !!}">
@endsection


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
{{-- <h1>{{$examen}}</h1> --}}
    <form class='form-register' action="{{route('homedocente.savePregunta')}}" method="POST">
        @csrf
        @foreach ($examen as $item)
            <h1 class="text-center"> Examen: {{$item->titulo}}</h1>
        @endforeach

        <input type="text" name="idExamen" value="{{$idExamen}}" hidden>        
        <p class='mb-4'>Escriba la pregunta</p>
        <input class='controls' type='text' name='pregunta' id='pregunta' placeholder='Ingrese la pregunta'/>
        @error('pregunta')
            <p class="border border-red-500 rounded-md bg-red-100 w-full-text-red-600 p-10 my-2 text-black">*{{$message}}</p>
        @enderror
        <p class='mb-4'>Indique las posibles respuestas</p>
        <input class='controls' type='text' name='opcion1' id='1' placeholder='Opcion 1'/>
        @error('opcion1')
            <p class="border border-red-500 rounded-md bg-red-100 w-full-text-red-600 p-10 my-2 text-black">*{{$message}}</p>
        @enderror
        <input class='controls' type='text' name='opcion2' id='2' placeholder='Opcion 2'/>
        @error('opcion2')
            <p class="border border-red-500 rounded-md bg-red-100 w-full-text-red-600 p-10 my-2 text-black">*{{$message}}</p>
        @enderror
        <input class='controls' type='text' name='opcion3' id='3' placeholder='Opcion 3'/>
        @error('opcion3')
            <p class="border border-red-500 rounded-md bg-red-100 w-full-text-red-600 p-10 my-2 text-black">*{{$message}}</p>
        @enderror
        <p class='mb-4 mt-0'>Seleccione la respuesta correcta</p>
        {{-- <input class='controls' type='text' name='correcta' id='correcta' placeholder='Correcta' /> --}}
        <br>
                {{-- SELECT --}}
                <div class='mb-4 relative'>
                    <div class='relative rounded shadow-sm'>
                        <div>
                            <select name='correcta' id='correcta' class='shadow appearence-none border rounded w-full py-2 pr-3 pl-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'>
                                <option value='opcion1'>Respuesta 1</option>
                                <option value='opcion2'>Respuesta 2</option>
                                <option value='opcion3'>Respuesta 3</option>
                            </select>
                        </div>
                        <div class='absolute  inset-y-0  left-2 flex items-center'>
                        </div>
                    </div>
                </div>
        

        <div class='flex items-center'>
            <button class='botons sepa btn btn-primary' type="submit">Guardar</button>

            <a href="{{route('homedocente.editarExamen', $idExamen)}}" class="botons text-center">
                <button class='btn btn-primary col-md-6 text-center' type="button">Salir</button>
            </a>
        </div>
    </form>
@endsection
