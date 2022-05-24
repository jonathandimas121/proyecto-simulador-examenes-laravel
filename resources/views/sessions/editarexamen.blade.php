@extends('layouts.interface')

@section('title', 'Examen')

@section('estilos')
    <link rel="stylesheet" href="{!! asset('css/cardPregunta.css') !!}">
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
<div class='bg-pastel-50 w-3/4 h-9/10 m-auto mt-5 shadow rounded'>
    <div class='border border-2px h-9 bg-white flow-root'>
        @foreach ($examen as $datoExamen)
            <label class='font-bold ml-2 text-xl ml-10'>{{$datoExamen->titulo}}</label>

            {{-- Boton salir --}}
            <a href="{{ route('homedocente.examen'), $datoExamen->id }}">
                <button class='float-right mr-1'>
                    <svg class="h-8 w-8 text-black"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/> <line x1="9" y1="9" x2="15" y2="15" />  <line x1="15" y1="9" x2="9" y2="15" /></svg>
                </button>
            </a>

            {{-- Boton agregar --}}
            <a href="{{ route('homedocente.addPregunta', $datoExamen->id) }}">
                <button class='float-right mr-1'>
                    <svg class="h-8 w-8 text-black"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/><circle cx="12" cy="12" r="9" />  <line x1="9" y1="12" x2="15" y2="12" />  <line x1="12" y1="9" x2="12" y2="15" /></svg>
                </button>
            </a>
            
        @endforeach
    </div>

    @foreach ($preguntas as $datosPreguntas)
        <div class="card-titlee">
            <div class="card-cuestions">
            <b>
                <p>{{$datosPreguntas->pregunta}}</p>
            </b>
            <div class="buttonsDocente">
                {{-- btn editar --}}
                <a href="{{ route('homedocente.editarPregunta', $datosPreguntas -> id) }}">  
                    <button class="btnedit">
                        <img src="{{ asset('images/editar.png') }}" alt="mi foto">
                    </button>
                </a>

                {{-- btn eliminar --}}
                <form action="{{ route('homedocente.destroyPregunta', $datosPreguntas -> id) }}" method="POST" class="delete-form-pregunta">
                    @csrf
                    @method('delete')
                    <button class="btnedit" type="submit" id="formulario-eliminar">
                        <img src="{{ asset('images/eliminar.png') }}" alt="mi foto">
                    </button>
                </form>
            </div>
            </div>
        </div>
        <div style="padding: 15px">
        </div>
    @endforeach
@endsection

@section('alert')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    @if (SESSION('delete') == 'eliminado')
        <script type="text/javascript">
            Swal.fire('No es posible eliminarlo')
        </script>
    @endif



    <script type="text/javascript">
        $('.delete-form-pregunta').submit(function(e){
            e.preventDefault();
            Swal.fire({
                title: '¿Estás seguro?',
                text: "No podras reestablecer los cambios!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Si, eliminar!'
                }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        })
    </script>
@endsection
