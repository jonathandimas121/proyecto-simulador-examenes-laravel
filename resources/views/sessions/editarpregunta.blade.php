@extends('layouts.interface')

@section('title', 'Examen')

@section('estilos')
    <link rel="stylesheet" href="{!! asset('css/editarPregunta.css') !!}">
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
{{-- <div class='w-full bg-slate-300 overflow auto'> --}}
    @foreach ($pregunta as $datoPregunta)
    <form class='form-register' action="{{route('homedocente.saveEditarPregunta', $datoPregunta)}}" method="POST">
            @csrf
            @method('put')
            <div class='mt-0'>
                <input type="text" name="idExamen" value="{{$datoPregunta -> idExamen}}" hidden>

                <label class='mt-3'>Pregunta: </label>
                <input class='controls' type='text' name='pregunta' id='pregunta' placeholder='Ingresa la nueva pregunta' value="{{$datoPregunta -> pregunta}}"/>
                @error('pregunta')
                    <p class="border border-red-500 rounded-md bg-red-100 w-full-text-red-600 p-10 my-2 text-black">*{{$message}}</p>
                @enderror
                <label >Opcion 1:</label>
                <input class='controls' type='text' name='opcion1' id='1' placeholder='Ingresa la nueva opcion 1' value="{{$datoPregunta -> opcion1}}"/>
                @error('opcion1')
                    <p class="border border-red-500 rounded-md bg-red-100 w-full-text-red-600 p-10 my-2 text-black">*{{$message}}</p>
                @enderror
                <label>Opcion 2:</label>
                <input class='controls' type='text' name='opcion2' id='2' placeholder='Ingresa la nueva  opcion 2' value="{{$datoPregunta -> opcion2}}"/>
                @error('opcion2')
                    <p class="border border-red-500 rounded-md bg-red-100 w-full-text-red-600 p-10 my-2 text-black">*{{$message}}</p>
                @enderror
                <label>Opcion 3:</label>
                <input class='controls' type='text' name='opcion3' id='3' placeholder='Ingresa la nueva opcion 3' value="{{$datoPregunta -> opcion3}}"/>
                @error('opcion3')
                    <p class="border border-red-500 rounded-md bg-red-100 w-full-text-red-600 p-10 my-2 text-black">*{{$message}}</p>
                @enderror

                
                <label class='mt-2'>Respuesta correcta</label>
                {{-- <input class='controls' type='text' name='correcta' id='correcta' placeholder='Ingresa la nueva respuesta correcta' value="{{$datoPregunta -> correcta}}"/> --}}
                {{-- SELECT --}}
                <div class='mb-4 relative'>
                    <div class='relative rounded shadow-sm'>
                        <div>
                            <select name='correcta' id='correcta' class='shadow appearence-none border rounded w-full py-2 pr-3 pl-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'>
                                <option value="{{$datoPregunta -> correcta}}">{{$datoPregunta -> correcta}}</option>

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
                    
                    <a href="{{route('homedocente.editarExamen', $datoPregunta -> idExamen)}}" class="botons text-center">
                        <button class='btn btn-primary col-md-6 text-center'>Salir</button>
                    </a>
                    
                </div>
            </div>
        </form>
    @endforeach
{{-- </div> --}}
@endsection
