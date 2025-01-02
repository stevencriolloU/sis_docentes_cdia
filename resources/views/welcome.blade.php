<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="https://lh6.googleusercontent.com/proxy/rumSgkvAQPNMwibBU3y7ILHbugoo_3S-7KcktyZGwLRhQ4p7F29ivBsK7koVLgMYCv9t1VTaSQI_cyUBhzWpQguVqfJ8AVQq2ySe-FDqug" type="image/png">

        <title>SISTEMA DE SEGUIMIENTO DOCENTE</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

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
                <h1 class="text-2xl font-bold uppercase tracking-wide">
                    Universidad Nacional de Chimborazo
                </h1>
            </div>

            @if (Route::has('login'))
                <nav class="flex flex-1 justify-end items-center gap-4">
                    @auth
                        <a
                            href="{{ route(Auth::user()->hasRole('admin') ? 'admin.dashboard' : (Auth::user()->hasRole('docente') ? 'docente.dashboard' : 'estudiante.dashboard')) }}"
                            class="flex items-center bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-md transition-all duration-300">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" 
                            class="flex items-center bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-md transition-all duration-300">
                            <img src="{{ asset('images/8679838_login_box_line_icon.svg') }}" alt="Icono de inicio de sesión" class="h-5 w-5 mr-2">
                            Iniciar Sesión
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" 
                                class="flex items-center bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-md transition-all duration-300">
                                <img src="{{ asset('images/register.svg') }}" alt="Icono de registro" class="h-5 w-5 mr-2">
                                Registrarse
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        <main class="flex-grow flex items-center justify-center px-4 sm:px-6 lg:px-8 p-6">
            <section class="rounded-lg shadow-md items-center justify-center p-8">                           

                <div class="bg-gray-500 rounded-lg p-8 shadow text-center mb-8">
                    <h1 class="text-3xl font-bold mb-4">
                        Bienvenido al Sistema de Seguimiento Docente
                    </h1>     
                    <p class="text-lg leading-relaxed">
                        Este sistema está diseñado para facilitar el seguimiento y la evaluación del desempeño de los docentes. 
                        Explore las herramientas disponibles y maximice la eficiencia de la gestión educativa.
                    </p>
                </div>

                <div id="contenedor-funcionalidades" class="text-center">
                    
                    <div class="funcionalidad bg-gray-500 rounded-lg p-6 shadow flex flex-col justify-center items-center opacity-0 hidden transition-opacity duration-1000 ease-in-out">            
                        <div class="text-center">
                            <h3 class="text-xl font-semibold mb-2">Seguimiento docente</h3>
                            <img src="/images/Docentes.svg" alt="S.Docente" class="mx-auto mb-4 w-20 h-20 object-contain">           
                            <p>Crear encuestas únicas y personalizadas para cada clase.</p>
                        </div>
                    </div>

                    <div class="funcionalidad bg-gray-500 rounded-lg p-6 shadow flex flex-col justify-center items-center opacity-0 hidden transition-opacity duration-1000 ease-in-out">                  
                        <div class="text-center">
                            <h3 class="text-xl font-semibold mb-2">Evaluación del personal</h3>
                            <img src="/images/Evaluacion.svg" alt="Evaluacion" class="mx-auto mb-4 w-20 h-20 object-contain">           
                            <p>Completar encuestas sobre las clases y el desempeño del docente.</p>
                        </div>
                    </div>

                    <div class="funcionalidad bg-gray-500 rounded-lg p-6 shadow flex flex-col justify-center items-center opacity-0 hidden transition-opacity duration-1000 ease-in-out">                 
                        <div class="text-center">
                            <h3 class="text-xl font-semibold mb-2">Informes y Resultados</h3>
                            <img src="/images/Informes.svg" alt="Informes" class="mx-auto mb-4 w-20 h-20 object-contain">           
                            <p>Genere informes personalizados para monitorear el progreso y los resultados.</p>
                        </div>
                    </div>

                    <div class="funcionalidad bg-gray-500 rounded-lg p-6 shadow flex flex-col justify-center items-center opacity-0 hidden transition-opacity duration-1000 ease-in-out">                                                
                        <div class="text-center">
                            <h3 class="text-xl font-semibold mb-2">Compresión de resultados</h3>
                            <img src="/images/Resultados.svg" alt="Resultados" class="mx-auto mb-4 w-20 h-20 object-contain">           
                            <p>Ver estadísticas de las conexiones de docentes y estudiantes en un rango de fechas.</p>  
                        </div>
                    </div>   
                </div>
            </section>            
        </main>

        <script>
            let currentIndex = 0; 
            const funcionalidades = document.querySelectorAll('#contenedor-funcionalidades > .funcionalidad');
            const totalFunciones = funcionalidades.length;

            function mostrarFuncionalidad(index) {
                funcionalidades[index].classList.remove('hidden');
                setTimeout(() => {
                    funcionalidades[index].classList.remove('opacity-0');
                    funcionalidades[index].classList.add('opacity-100');
                }, 50);
            }

            function ocultarFuncionalidad(index) {
                funcionalidades[index].classList.remove('opacity-100');
                funcionalidades[index].classList.add('opacity-0');
                setTimeout(() => {
                    funcionalidades[index].classList.add('hidden');
                }, 1000); 
            }

            function cambiarFuncionalidad() {
                const indexAnterior = currentIndex; 
                currentIndex = (currentIndex + 1) % totalFunciones; 

                ocultarFuncionalidad(indexAnterior); 
                setTimeout(() => {
                    mostrarFuncionalidad(currentIndex); 
                }, 1000); 
            }

            mostrarFuncionalidad(currentIndex);

            setInterval(cambiarFuncionalidad, 5000);
        </script>

        <style>
            .opacity-0 {
                opacity: 0;
            }
            .opacity-100 {
                opacity: 1;
            }
            .transition-opacity {
                transition: opacity 1s ease-in-out;
            }
        </style>

        <footer class="bg-gray-500 py-4">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
                &copy; {{ date('Y') }} Sistema de Seguimiento Docente. Todos los derechos reservados.
            </div>
        </footer>

    </body>
</html>