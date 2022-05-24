@extends('layouts.interface')

@section('title', 'Examen')

@section('estilos')
<link rel="stylesheet" href="{!! asset('css/cardExamenAlumno.css') !!}">
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
<div class='w-3/4 bg-pastel-50 h-3/4 m-auto mt-5 shadow rounded relative flow-root'>
    <div class='border border-2px h-9 bg-white text-center'>
      <label class='font-serif ml-2 text-2xl'>Exámenes Disponibles</label>
    </div>
    <div>
        @foreach ($listaExamenes as $examenes)

            <div class="mb-3">
                <div class="card-container">
                <div class="card-title"><h3>{{$examenes->titulo}}</h3></div>
                <div class="image-container"><img src="{{ asset('images/cardImagee.jpg') }}" alt="foto">
                    <div class="mitad">
                        <div class="card-content">     
                            <div class="card-body"><p class="card-title-p">Profesor:</p> <p class="card-profesor">{{$examenes->nombreUsuario}}</p></div>
                        </div>
                        <a href="{{route('alumno.listarPreguntasResponder', $examenes->id)}}">
                            <div class="btn"><button>Ver examen</button></div>
                        </a>
                    </div>
                </div>
            </div>
           
        @endforeach

    </div>
  </div>
</div> 
@endsection