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
    <form class='form-register' action="{{ route('homedocente.crearExamen') }}" method="POST">
        @csrf
        <div class='mt-0'>
            <h1 class='mt-0 mb-1 flex justify-center'>Examen</h1>
            <div>
                <label>Usuario:</label>
                <input class='controls' type='text' name='nombreUsuario' id='nombreUsuario' value="{{ auth()->user()->name }}" readonly/>
            </div>

            <div>
                <label>ID</label>
                <input class='controls' type='text' name='idUsuario' id='idUsuario' value="{{auth()->user()->id}}" readonly/>
            </div>

            <div>
                <label>Titulo del examen</label>
                <input class='controls' type='text' name='titulo' id='titulo' />
                <div>

                    @error('titulo')
                    <p class="border border-red-500 rounded-md bg-red-100 w-full-text-red-600 p-10 my-2 text-black">*{{$message}}</p>
                    @enderror

                    @error('error_mes')
                    <p class="border border-red-500 rounded-md bg-red-100 w-full-text-red-600 p-10 my-2 text-black">*{{$message}}</p>
                    @enderror
                </div>

            </div>
                
            <div class='flex items-center'>
                <button type="submit" class='botons sepa btn btn-primary'>Continuar</button>

                <a class="botons text-center" href="{{ route('homedocente.examen') }}">
                    <button class='btn btn-primary col-md-6 text-center'>Salir</button>
                </a>
            </div>
        </div>
    </form>
@endsection
