@extends('layouts.interface')

@section('title', 'Examen')

@section('estilos')
    <link rel="stylesheet" href="{!! asset('css/cardExamenDocente.css') !!}">
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

    <div class='w-3/4 bg-pastel-50 h-3/4 m-auto mt-5 shadow rounded relative flow-root'>
        <div class='border border-2px h-9 bg-white'>
            <label class='font-serif ml-2 text-xl'>Tus exámenes</label>
            <a href="{{ route('homedocente.tituloExamen') }}">
                <button class='float-right'>
                    <svg class="h-8 w-8 text-black" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <circle cx="12" cy="12" r="9" />
                        <line x1="9" y1="12" x2="15" y2="12" />
                        <line x1="12" y1="9" x2="12" y2="15" />
                    </svg>
                </button>
            </a>
        </div>
    <div>
     {{-- {{$listaExamenes}} --}}
     @foreach ($listaExamenes as $examenes)
     <div class="mb-3">
         <div class="card-container">
             <div class="card-title-exam">
                 <h3>{{ $examenes->titulo }}</h3>
             </div>
             <div class="image-exam-docente"><img src="{{ asset('images/examenn.jpg') }}" alt="mi foto">
             </div>
             <div class="mitad-exa">
                 <div class="btn">
                     <a href="{{ route('homedocente.editarExamen', $examenes->id) }}">
                         <button>
                             <svg class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </button>
                    </a>

                    {{-- Eliminar examen --}}
                     <form action="{{ route('homedocente.eliminarexamen', $examenes->id) }}" method="POST" class="eliminar-examen-form">
                         @csrf
                         @method('delete')
                         <button type="submit">
                             <svg class="h-8 w-8 text-red-600" width="24" height="24" viewBox="0 0 24 24"
                                 stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                 stroke-linejoin="round">
                                 <path stroke="none" d="M0 0h24v24H0z" />
                                 <line x1="18" y1="6" x2="6" y2="18" />
                                 <line x1="6" y1="6" x2="18" y2="18" />
                             </svg>
                         </button>
                     </form>
                     
                 </div>
             </div>
         </div>
     </div>
 @endforeach
@endsection        


@section('alert')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    {{-- @if (session('eliminarExa')=='eliExa')
    <script type="text/javascript">
        Swal.fire(
            'Eliminado',
            'El examen se ha eliminado',
            'success'
            )
    </script>
    @endif --}}

    @if (SESSION('delete') == 'eliminado')
        <script type="text/javascript">
            Swal.fire(
                'No se ha podido eliminar',
                'El examen no se ha eliminado',
                'warning'    
            )
        </script>
    @endif



    <script type="text/javascript">
        $('.eliminar-examen-form').submit(function(e){
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