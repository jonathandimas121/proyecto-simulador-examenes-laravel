@extends('layouts.interface')

@section('title', 'Examen')

@section('estilos')
<link rel="stylesheet" href="{!! asset('css/examenResultados.css') !!}">
@endsection

@section('direccionhome')
{{ route('homealumno.index') }}
@endsection

@section('direccionexamen')
{{ route('homealumno.examen') }}
@endsection

@section('direccionresultados')
{{ route('homealumno.resultados') }}
@endsection

@section('content')
<div class='content-result'>
    <div class='bg-transparent w-50 m-auto shadow rounded'>
        <div class='bg-white flow-root text-center'>
            <label class='font-serif p-1 text-center text-lg'>Alumno: {{auth()->user()->name}}</label>
            <a href="{{route('homealumno.examen')}}"><button class='float-right mr-1'>
                <svg class="h-8 w-8 text-black"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/> <line x1="9" y1="9" x2="15" y2="15" />  <line x1="15" y1="9" x2="9" y2="15" /></svg>
            </button></a>
        </div>            
        <div class='text-center flow-root'>
            @if ($cal == 20)
                <label class='result-resp'>La calificación obtenida es 20/100 Respuestas correctas: 1</label>
            @endif

            @if ($cal == 40)
                <label class='result-resp'>La calificación obtenida es 40/100 Respuestas correctas: 2</label>
            @endif

            @if ($cal == 60)
                <label class='result-resp'>La calificación obtenida es 60/100 Respuestas correctas: 3</label>
            @endif

            @if ($cal == 80)
                <label class='result-resp'>Tu calificación es 80/100 Respuestas correctas: 4</label>
            @endif

            @if ($cal == 100)
                <label class='result-resp'>Tu calificación es 100/100 Respuestas correctas: 5</label>
            @endif
   
        </div>            
        <div class='content-center'>
            @if ($cal == 0)
                <div class='img-result'><img src="{{ asset('images/0buenas.jpg') }}" alt="foto" width='400'></div>
            @endif

            @if ($cal == 20)
                <div class='img-result'><img src="{{ asset('images/1buena.jpg') }}" alt="foto" width='400'></div>
            @endif

            @if ($cal == 40)
                <div class='img-result'><img src="{{ asset('images/2buenas.jpg') }}" alt="foto" width='400'></div>
            @endif

            @if ($cal == 60)
                <div class='img-result'><img src="{{ asset('images/3buenas.jpg') }}" alt="foto" width='400'></div>
            @endif

            @if ($cal == 80)
                <div class='img-result'><img src="{{ asset('images/4buenas.jpg') }}" alt="foto"></div>
            @endif

            @if ($cal == 100)
                <div class='img-result'><img src="{{ asset('images/5buenas.jpg') }}" alt="foto" width='400'></div>
            @endif

        </div>
    </div>
</div>
@endsection