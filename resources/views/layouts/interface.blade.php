<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>
    <!-- Tailwind CSS Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">

    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    <!-- Fontawesome Link -->
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">

    {{-- Iconos --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    
    @yield('estilos')

</head>

<body class="bg-gray-100 text-gray-800">
    
    <nav class='flex py-5 bg-indigo-500 text-white'>
        <div class="w-1/2 px-12 mr-auto">
            <p class="text 2xl font-bold">{{ auth()->user()->name }}</p>
        </div>

        <ul class="w-1/2 px-12 mr-auto flex justify-center">
            <li class="mx-6">
                <a class="font-semibold hover:bg-indigo-600 py-3 px-4 rounded-md"
                    href="@yield('direccionhome')">Inicio</a>
                <a class="font-semibold hover:bg-indigo-600 py-3 px-4 rounded-md"
                    href="@yield('direccionexamen')">Examenes</a>
                <a class="font-semibold hover:bg-indigo-600 py-3 px-4 rounded-md"
                    href="@yield('direccionresultados')">Resultados</a>
            </li>
        </ul>

        <form class="cerrar-session-form" method="POST" action="{{route('login.destroy')}}">
            @csrf
            <div class="w-1/2 px-12 mr-auto flex justify-end">
                <button type="submit" class="font-semibold py-3 px-4 rounded-md bg-red-500 hover:bg-red-600">
                    <a>Cerrar</a>
                </button>
            </div>
        </form>
    </nav>

    @yield('content')
    {{-- <nav class='flex py-3 bg-indigo-500 text-white'>
        <div class="w-1/2 px-12 mr-auto">
            <a href="{{ route('home') }}" class="font-semibold hover:bg-indigo-700 py-3 px-4 rounded-md">Home</a>
        </div>
    </nav>
    <h1 class="text-5xl text-center pt-24">La cuenta expiro</h1> --}}
    
    @yield('alert')

    {{-- ALERTA CERRAR SESSION --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $('.cerrar-session-form').submit(function(e){
            e.preventDefault();
            Swal.fire({
                title: '¿Quieres cerrar sesión?',
                // text: "No podras reestablecer los cambios!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Si, cerrar sesión!'
                }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        })
    </script>


</body>

</html>
