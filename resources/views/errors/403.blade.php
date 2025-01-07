<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="https://lh6.googleusercontent.com/proxy/rumSgkvAQPNMwibBU3y7ILHbugoo_3S-7KcktyZGwLRhQ4p7F29ivBsK7koVLgMYCv9t1VTaSQI_cyUBhzWpQguVqfJ8AVQq2ySe-FDqug" type="image/png">

        <title>SISTEMA DE SEGUIMIENTO DOCENTE</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                @import url('https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css');
            </style>
        @endif
    </head>

    <body class="h-screen flex flex-col min-h-screen text-white antialiased bg-gray-800 shadow-lg">

        <header class="flex items-center bg-gray-500 py-4 px-5">
            <div class="flex items-center">
                <img src="https://lh6.googleusercontent.com/proxy/rumSgkvAQPNMwibBU3y7ILHbugoo_3S-7KcktyZGwLRhQ4p7F29ivBsK7koVLgMYCv9t1VTaSQI_cyUBhzWpQguVqfJ8AVQq2ySe-FDqug" 
                    alt="Logo" 
                    class="h-10 w-auto mr-2">
                <h1 class="text-2xl font-bold uppercase tracking-wide text-white">
                    Universidad Nacional de Chimborazo
                </h1>
            </div>
            @if (Route::has('login'))
                <nav class="flex flex-1 justify-end items-center gap-4">
                    @auth
                        
                    @else
                        <a href="{{ route('login') }}" class="text-white hover:underline px-4">
                            Iniciar Sesión
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-white hover:underline px-4">
                                Registrarse                    
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif

                <nav class="flex flex-1 justify-end items-center gap-4">
                    <a href="{{ route('welcome') }}" 
                        class="flex items-center bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-md transition-all duration-300">
                        <img src="{{ asset('images/Regresar.svg') }}" alt="Icono de registro" class="h-5 w-5 mr-2">
                        Regresar al inicio</a>
                </nav>
        </header>

        <main class="flex-grow flex items-center justify-center px-4 sm:px-6 lg:px-8 p-8">
            <section class="bg-gray-500 rounded-lg shadow-md p-8">                           


                <h1 class="text-center text-2xl font-semibold mb-2 text-red-500 py-6" style="font-family: 'Poppins', sans-serif;">

                    Error 403: Acceso Denegado
                </h1>

                <img src="/images/Error.svg" alt="S.Docente" class="mx-auto w-20 h-20 object-contain">    

                <div class="flex items-center">                           
                    <p class="text-center text-lg leading-relaxed flex-1 p-6">
                        No tienes los roles correctos para acceder a esta sección. Si consideras que esto es un error, por favor contacta con el administrador del sistema.
                    </p>
                </div>

                <div class="mt-8 text-center space-x-4">
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button 
                            type="submit" 
                            class="inline-block bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-md transition-all duration-300 w-48">
                            Cerrar Sesión
                        </button>
                    </form>
                </div>
            </section>            
        </main>

        <footer class="bg-gray-500 mt-12 py-4">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
                &copy; {{ date('Y') }} Sistema de Seguimiento Docente. Todos los derechos reservados.
            </div>
        </footer>

    </body>
</html>
