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
  <div class="bg-slate-300 w-full">

    @if ($sizeExamen > 4)
        
      <form action="{{route('alumno.calificacionExamen')}}" method="POST" class="guardar-respuestas-form">
        @csrf
        <div class="bg-green-200 w-3/4 h-9/10 m-auto mt-5 shadow rounded">
          <div class="border border-2px h-9 bg-white flow-root">
            <label class="font-serif ml-2 text-lg mr-80">Alumno: {{auth()->user()->name}}</label>
            @foreach ($examen as $datoExamen)
                <label class="font-bold ml-10 text-xl">Examen: {{$datoExamen->titulo}}</label>
                <input name="idExamen" value="{{$datoExamen->id}}" hidden/> {{-- Id exammen--}}
                <input name="titulo" value="{{$datoExamen->titulo}}" hidden/> {{-- Id exammen--}}
                <input name="idUsuario" value="{{$datoExamen->idUsuario}}" hidden/>{{-- Id usuario docente--}}
                <input name="nombreUsuario" value="{{$datoExamen->nombreUsuario}}" hidden/>{{-- Nombre usuario docente--}}
            @endforeach
            {{-- btn salir --}}
            <a href="{{route('homealumno.examen'), $datoExamen->id}}">
              <button type="button" class="float-right"><svg class="h-8 w-8 text-black" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2" /><line x1="9" y1="9" x2="15" y2="15" /><line x1="15" y1="9" x2="9" y2="15" /></svg>
              </button>
            </a>
            {{-- Boton guardar --}}
            <button type="submit" class="float-right"><svg class="h-8 w-8 text-black" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" /><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><circle cx="12" cy="14" r="2" /><polyline points="14 4 14 8 8 8 8 4" /></svg>
            </button>
          </div>

          <div>
            @foreach ($preguntas as $index => $preguntass)
            @if ($index == 0)
                    <div>
                        <label class='font-bold ml-2 text-xl'>{{$index+1}}. {{$preguntass->pregunta}}</label>
                        <br>
                        <label class='mx-2'>
                            <input value="{{$preguntass->opcion1}}" name="resp1" type="radio" /> {{$preguntass->opcion1}}
                        </label>
                        <br>
                        <label class='mx-2'>
                            <input value="{{$preguntass->opcion2}}" name="resp2" type="radio" /> {{$preguntass->opcion2}}
                        </label>
                        <br>
                        <label class='mx-2'>
                            <input value="{{$preguntass->opcion3}}" name="resp3" type="radio"/> {{$preguntass->opcion3}}
                        </label>
                        <br>
                        <input name="correcta{{$index+1}}" value="{{$preguntass->correcta}}" hidden>
                    </div>
                    @endif
                    @if ($index == 1)
                        <div>
                            <label class='font-bold ml-2 text-xl'>{{$index+1}}. {{$preguntass->pregunta}}</label>
                            <br>
                            <label class='mx-2'>
                                <input value="{{$preguntass->opcion1}}" name="resp4" type="radio" /> {{$preguntass->opcion1}}
                            </label>
                            <br>
                            <label class='mx-2'>
                                <input value="{{$preguntass->opcion2}}" name="resp5" type="radio" /> {{$preguntass->opcion2}}
                            </label>
                            <br>
                            <label class='mx-2'>
                                <input value="{{$preguntass->opcion3}}" name="resp6" type="radio"/> {{$preguntass->opcion3}}
                            </label>
                            <br>
                            <input name="correcta{{$index+1}}" value="{{$preguntass->correcta}}" hidden>
                        </div>
                    @endif
                    @if ($index == 2)
                    <div>
                        <label class='font-bold ml-2 text-xl'>{{$index+1}}. {{$preguntass->pregunta}}</label>
                        <br>
                        <label class='mx-2'>
                            <input value="{{$preguntass->opcion1}}" name="resp7" type="radio" /> {{$preguntass->opcion1}}
                        </label>
                        <br>
                        <label class='mx-2'>
                            <input value="{{$preguntass->opcion2}}" name="resp8" type="radio" /> {{$preguntass->opcion2}}
                        </label>
                        <br>
                        <label class='mx-2'>
                            <input value="{{$preguntass->opcion3}}" name="resp9" type="radio"/> {{$preguntass->opcion3}}
                        </label>
                        <br>
                        <input name="correcta{{$index+1}}" value="{{$preguntass->correcta}}" hidden>
                    </div>
                    @endif
                    @if ($index == 3)
                    <div>
                        <label class='font-bold ml-2 text-xl'>{{$index+1}}. {{$preguntass->pregunta}}</label>
                        <br>
                        <label class='mx-2'>
                            <input value="{{$preguntass->opcion1}}" name="resp10" type="radio" /> {{$preguntass->opcion1}}
                        </label>
                        <br>
                        <label class='mx-2'>
                            <input value="{{$preguntass->opcion2}}" name="resp11" type="radio" /> {{$preguntass->opcion2}}
                        </label>
                        <br>
                        <label class='mx-2'>
                            <input value="{{$preguntass->opcion3}}" name="resp12" type="radio"/> {{$preguntass->opcion3}}
                        </label>
                        <br>
                        <input name="correcta{{$index+1}}" value="{{$preguntass->correcta}}" hidden>
                    </div>
                    @endif
                    @if ($index == 4)
                    <div>
                        <label class='font-bold ml-2 text-xl'>{{$index+1}}. {{$preguntass->pregunta}}</label>
                        <br>
                        <label class='mx-2'>
                            <input value="{{$preguntass->opcion1}}" name="resp13" type="radio" /> {{$preguntass->opcion1}}
                        </label>
                        <br>
                        <label class='mx-2'>
                            <input value="{{$preguntass->opcion2}}" name="resp14" type="radio" /> {{$preguntass->opcion2}}
                        </label>
                        <br>
                        <label class='mx-2'>
                            <input value="{{$preguntass->opcion3}}" name="resp15" type="radio"/> {{$preguntass->opcion3}}
                        </label>
                        <br>
                        <input name="correcta{{$index+1}}" value="{{$preguntass->correcta}}" hidden>
                    </div>
                    @endif
            @endforeach
          </div>
        </div>
      </form>

    @else
      <div class="bg-green-200 w-3/4 h-9/10 m-auto mt-5 shadow rounded">
        <div class="border border-2px h-9 bg-white flow-root">
          <label class="font-serif ml-2 text-lg mr-80">Alumno: {{auth()->user()->name}}</label>
          @foreach ($examen as $datoExamen)
              <input name="idExamen" value="{{$datoExamen->id}}" hidden/> {{-- Id exammen--}}
          @endforeach
          {{-- btn salir --}}
          <a href="{{route('homealumno.examen'), $datoExamen->id}}">
            <button type="button" class="float-right"><svg class="h-8 w-8 text-black" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2" /><line x1="9" y1="9" x2="15" y2="15" /><line x1="15" y1="9" x2="9" y2="15" /></svg>
            </button>
          </a>

        </div>
          <h1 class="text-3xl text-center pt-8">Examen no disponible</h1>
        </div>
      </div>
    @endif
  </div>
@endsection

@section('alert')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


    <script type="text/javascript">
        $('.guardar-respuestas-form').submit(function(e){
            e.preventDefault();
            Swal.fire({
              title: '¿Deseas envíar tus respuestas?',
              showCancelButton: true,
              confirmButtonText: 'Envíar',
              cancelButtonText: 'Cancelar',
              cancelButtonColor: '#d33',
              // denyButtonText: `Don't save`,
            }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              // if (result.isConfirmed) {
              //   Swal.fire('Saved!', '', 'success')
              // } else if (result.isDenied) {
              //   Swal.fire('Changes are not saved', '', 'info')
              // }
              this.submit();
            })
        })
    </script>
@endsection