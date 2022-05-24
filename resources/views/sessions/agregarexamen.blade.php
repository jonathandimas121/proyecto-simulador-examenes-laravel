@extends('layouts.interface')

@section('title', 'Crear Examen')

@section('estilos')
<link rel="stylesheet" href="{!! asset('css/generarExamen.css') !!}">
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
    {{-- <h1>{{ $id }}</h1> --}}
    <form class='form-register' action="{{route('homedocente.crearPreguntas')}}" method="POST">
        @csrf
        <p class="mb-3">ID de examen:</p>
        <input type="text" readonly name="idExamen" id="idExamen" value="{{ $id }}" class="controls"/>

        <p class='mb-4'>Escriba la pregunta</p>
        <input class='controls' type='text' name='pregunta' id='pregunta' placeholder='Ingrese la pregunta' required/>
        @error('pregunta')
            <p class="border border-red-500 rounded-md bg-red-100 w-full-text-red-600 p-10 my-2 text-black">*{{$message}}</p>
        @enderror
        <p class='mb-3'>Indique las posibles respuestas</p>
        <input class='controls' type='text' name='opcion1' id='opcion1' placeholder='Opcion 1' required/>
        @error('opcion1')
            <p class="border border-red-500 rounded-md bg-red-100 w-full-text-red-600 p-10 my-2 text-black">*{{$message}}</p>
        @enderror
        <input class='controls' type='text' name='opcion2' id='opcion2' placeholder='Opcion 2' required/>
        @error('opcion2')
            <p class="border border-red-500 rounded-md bg-red-100 w-full-text-red-600 p-10 my-2 text-black">*{{$message}}</p>
        @enderror
        <input class='controls' type='text' name='opcion3' id='opcion3' placeholder='Opcion 3' required/>
        @error('opcion3')
            <p class="border border-red-500 rounded-md bg-red-100 w-full-text-red-600 p-10 my-2 text-black">*{{$message}}</p>
        @enderror

        <p class='mb-3 mt-0'>Selecciona la respuesta correcta</p>
        {{-- <input class='controls' type='text' name='correcta' id='correcta' placeholder='Correcta'/> --}}
        {{-- SELECT --}}
        <br><br>
        {{-- <div class='mb-4 relative'>
            <div class='relative rounded shadow-sm'>
                <div>
                    <select name='correcta' id='correcta' class='shadow appearence-none border rounded w-full py-2 pr-3 pl-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'>
                        <option value='opcion1'>Primera respuesta</option>
                        <option value='opcion2'>Segunda respuesta</option>
                        <option value='opcion3'>Tercera respuesta</option>
                    </select>
                </div>
                <div class='absolute  inset-y-0  left-2 flex items-center'>
                </div>
            </div> --}}
        </div>

        <label class="mx-2">
            <input type="checkbox" name="correcta1" value="1"/>
            Primera
        </label>

        <label class="mx-2">
            <input type="checkbox" name="correcta2" value="2"/>
            Segunda
        </label>

        <label class="mx-2">
            <input type="checkbox" name="correcta3" value="3"/>
            Tercera
        </label>

        <div class='flex items-center'>
            <button class='botons sepa btn btn-primary' type="submit">Guardar Pregunta</button>
            
            <a href="{{ route('homedocente.examen') }}"
                class="botons font-semibold hover:bg-indigo-700 py-2 px-2 rounded-md mt-6 flex justify-center">
                <button type="button">Salir</button>
            </a>
        </div>
    </form>
@endsection
