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
    <!-- Header -->
    <header class="flex items-center bg-gray-500 py-4 px-5">
        <div class="flex items-center">
            <img src="https://lh6.googleusercontent.com/proxy/rumSgkvAQPNMwibBU3y7ILHbugoo_3S-7KcktyZGwLRhQ4p7F29ivBsK7koVLgMYCv9t1VTaSQI_cyUBhzWpQguVqfJ8AVQq2ySe-FDqug" 
                alt="Logo" class="h-10 w-auto mr-2">
            <h1 class="text-2xl font-bold uppercase tracking-wide text-white">
                Universidad Nacional de Chimborazo
            </h1>
        </div>
        <nav class="flex flex-1 justify-end items-center gap-4">
            <a href="{{ route('welcome') }}" 
                class="flex items-center bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-md transition-all duration-300">
                <img src="{{ asset('images/Regresar.svg') }}" alt="Icono de registro" class="h-5 w-5 mr-2">
                Regresar al inicio
            </a>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="flex-grow items-center justify-center p-6 px-4 sm:px-6 lg:px-8">
        <section class="rounded-lg shadow-md">
            <x-guest-layout>
                <x-authentication-card>
                    <x-slot name="logo">
                        <x-authentication-card-logo />
                    </x-slot>

                    <!-- Mensaje de verificación -->
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
                        <p>{{ __('Antes de continuar, ¿podrías verificar tu dirección de correo electrónico haciendo clic en el enlace que te acabamos de enviar? Si no has recibido el correo, con gusto te enviaremos otro.') }}</p>
                    </div>

                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-6 text-center font-medium text-sm text-black-600 text-lg leading-relaxed">
                            {{ __('Se ha enviado un nuevo enlace de verificación a la dirección de correo electrónico que proporcionaste en la configuración de tu perfil.') }}
                        </div>
                    @endif

                    <!-- Formulario de reenvío de correo de verificación -->
                    <div class="mt-6 flex flex-col items-center space-y-4">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf

                            <div>
                                <x-button type="submit" class="flex items-center bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-md transition-all duration-300">
                                    {{ __('Reenviar correo de verificación') }}
                                </x-button>
                            </div>
                        </form>

                        <!-- Enlaces de perfil y logout -->
                        <div class="flex justify-center space-x-4">
                            <a
                                href="{{ route('profile.show') }}"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150 flex items-center bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-md transition-all duration-300"
                            >
                                {{ __('Editar perfil') }}
                            </a>

                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150 flex items-center bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-md transition-all duration-300">
                                    {{ __('Cerrar sesión') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </x-authentication-card>
            </x-guest-layout>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-500 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            &copy; {{ date('Y') }} Sistema de Seguimiento Docente. Todos los derechos reservados.
        </div>
    </footer>
</body>

</html>
