@extends('layouts.plantilla')

@section('title','Home')

@section('option')
<ul class="w-1/2 px-16 ml-auto flex justify-end pt-1">
    <li class="mx-6">
        <a href="{{route('login.index')}}" class="font-semibold hover:bg-indigo-700 py-3 px-4 rounded-md">Iniciar Sesión</a>
    </li>

    <li class="mx-6">
        <a href="{{route('register.index')}}" class="font-semibold border-2 border-white py-2 px-4 rounded-md hover:bg-white hover:text-indigo-700">Registrar</a>
    </li>
</ul>
@endsection

@section('content')

<div class="flex justify-center max-w-sm w-full h-full lg:max-w-full lg:flex">        
    <div class="mb-8 w-full h-full">
        <h1 class="text-5xl text-center pt-24">Sistema de examenes</h1>
        {{-- <img src="{{ asset('images/fondoo.jpg') }}" alt="mi foto" class="w-full"> --}}
    </div>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    @if (SESSION('logout') == 'saliste')
        <script type="text/javascript">
            Swal.fire('Has cerrado sesion')
        </script>
    @endif
@endsection
