<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="https://lh6.googleusercontent.com/proxy/rumSgkvAQPNMwibBU3y7ILHbugoo_3S-7KcktyZGwLRhQ4p7F29ivBsK7koVLgMYCv9t1VTaSQI_cyUBhzWpQguVqfJ8AVQq2ySe-FDqug" type="image/png">

        <title>SISTEMA DE SEGUIMIENTO DOCENTE</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
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
                <nav class="flex flex-1 justify-end items-center gap-4">
                    <a href="{{ route('welcome') }}" 
                        class="flex items-center bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-md transition-all duration-300">
                        <img src="{{ asset('images/Regresar.svg') }}" alt="Icono de registro" class="h-5 w-5 mr-2">
                        Regresar al inicio</a>
                </nav>
        </header>

        <main class="flex-grow items-center justify-center px-4 sm:px-6 lg:px-8 p-8">
            <section class="rounded-lg shadow-md p-8">                           
                <x-guest-layout>

                    <div>
                        <x-authentication-card>

                            <x-validation-errors/>

                            @session('status')
                                <div class="mb-4 text-sm text-green-600 p-8 rounded">
                                    {{ $value }}
                                </div>
                            @endsession

                            <h1 class="text-center text-2xl font-bold text-white mb-8">Iniciar Sesión</h1>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="mb-6">
                                    <x-label for="email" value="{{ __('Correo') }}" class="text-white" />
                                    <x-input 
                                        id="email" 
                                        class="block mt-1 w-full px-4 py-3 bg-white border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                                        type="email" 
                                        name="email" 
                                        :value="old('email')" 
                                        required 
                                        autofocus 
                                        autocomplete="username" />
                                </div>

                                <div class="mb-6 relative">
                                    <x-label for="password" value="{{ __('Contraseña') }}" class="text-white" />
                                    <x-input 
                                        id="password" 
                                        class="block mt-1 w-full px-4 py-3 bg-white border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                                        type="password" 
                                        name="password" 
                                        required 
                                        autocomplete="current-password"/>
                                </div>

                                <div class="flex items-center justify-between mb-6">
                                    <div class="flex items-center">
                                        <x-checkbox id="remember_me" name="remember" />
                                        <span class="ms-2 text-sm text-white">{{ __('Recuerdame') }}</span>
                                    </div>

                                    @if (Route::has('password.request'))
                                        <a class="underline text-sm text-white hover:text-gray-400" href="{{ route('password.request') }}">
                                            {{ __('¿Olvidaste tu contraseña?') }}
                                        </a>
                                    @endif
                                </div>

                                <div class="flex items-center justify-center">
                                    <x-button class="justify-center w-full py-3 text-lg bg-gray-800 text-white rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-600">
                                        {{ __('Iniciar Sesión') }}
                                    </x-button>
                                </div>
                            </form>

                        </x-authentication-card>
                    </div>
                </x-guest-layout>
            </section> 
        </main>
        <footer class="bg-gray-500 mt-12 py-4">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
                &copy; {{ date('Y') }} Sistema de Seguimiento Docente. Todos los derechos reservados.
            </div>
        </footer>
        
    </body>
</html>