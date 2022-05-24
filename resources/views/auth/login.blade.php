@extends('layouts.plantilla')

@section('title','Login')

@section('option')
  <ul class="w-1/2 px-16 ml-auto flex justify-end pt-1">
      <li class="mx-6">
          <a href="{{route('home')}}" class="font-semibold hover:bg-indigo-700 py-3 px-4 rounded-md">Home</a>
      </li>
  </ul>
@endsection

@section('content')
<div class="flex justify-center max-w-sm w-full h-6/2 lg:max-w-full lg:flex" style="height: 50%;">        
  <div class='w-full max-w-xs m-auto pt-24 absolute'>
      <form class='bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4' method="POST">
        @csrf
          <div class='mb-4 relative'>
              <h1 class="text-center">Login</h1>
              <label class='block text-gray-700 text-sm font-fold mb-2'>Usuario</label>
            <div class='relative rounded shadow-sm'>
              <div>
                <input type='text' name='usuario' id="usuario" placeholder='Ingresa tu usuario'
                class='shadow appearence-none border rounded w-full py-2 px-4.5 pr-3 pl-10 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'>
              </div>
              <div class=' absolute  inset-y-0  left-2 flex items-center'>
                <i class='material-icons'>account_circle</i>
              </div>
            </div>
          </div>
          {{-- @error('message')
        <p class="border border-red-500 rounded-md bg-red-100 w-full-text-red-600 p-2 my-2">Error</p>
        @enderror --}}
          <div class='mb-4 relative'>
                <label class='block text-gray-700 text-sm font-fold mb-2'>Contraseña</label>
            <div class='relative rounded shadow-sm'>
              <div>
                <input type='password' name='password' id='password'
                placeholder='*******' class='shadow appearence-none border rounded w-full py-2 pr-3 pl-10 px-4.5 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'>
              </div>
              <div class=' absolute  inset-y-0  left-2 flex items-center'>
                <i class='material-icons'>verified_user</i>
              </div>
            </div>
        </div>
        {{-- @error('message')
        <p class="border border-red-500 rounded-md bg-red-100 w-full-text-red-600 p-2 my-2">Error</p>
        @enderror --}}
{{-- 
        <div class="topping ml-1 mb-1">
          <input type="checkbox" id="topping" name="topping" value="Paneer" /> Ver contraseña
        </div> --}}
        
        @error('message')
        <p class="border border-red-500 rounded-md bg-red-100 w-full-text-red-600 p-2 my-2"><small>*{{$message}}</small></p>
        @enderror
        
        <button class='bg-blue-500 hover:bg-blue-700 text-white text-sm font-bold py-2 px-4 mt-3 rounded focus:outline-none focus:shadow-outline w-full m-auto' type="submit">Iniciar Sesión</button>

        <p class='my-2 text-sm flex justify-center px-3 '>¿No tienes una cuenta?</p>

        <a href=" {{ route('register.index') }} ">
          <button type="button" class='bg-slate-50 hover:bg-slate-200 text-black shadow-md rounded border-2 border-gray-300 py-2 px-4 w-full m-auto'>Crear Cuenta
          </button>
        </a>

      </form>
  </div>

    <img loading="lazy" src="{{ asset('images/fondo3.jpg') }}" alt="mi foto" height="30%" width="100%" class="h-1/8 w-6/6 mx-auto" />
</div>
@endsection