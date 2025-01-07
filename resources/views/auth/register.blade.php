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

        <main class="flex-grow items-center justify-center p-6 px-4 sm:px-6 lg:px-8">
            <section class="rounded-lg shadow-md">  
                <x-guest-layout>
                    <x-authentication-card>
                        <x-slot name="logo">
                            <x-authentication-card-logo />
                        </x-slot>

                        <x-validation-errors class="mb-4" />

                        <h1 class="text-center text-2xl font-bold text-white mb-8">Registrarse</h1>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div>
                                <x-label for="name" value="{{ __('Nombre') }}" />
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            </div>

                            <div class="mt-4">
                                <x-label for="email" value="{{ __('Correo') }}" />
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                            </div>

                            <div class="mt-4">
                                <x-label for="password" value="{{ __('Contraseña') }}" />
                                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                            </div>

                            <div class="mt-4">
                                <x-label for="password_confirmation" value="{{ __('Confirmar contraseña') }}" />
                                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                            </div>

                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                <div class="mt-4">
                                    <x-label for="terms">
                                        <div class="flex items-center">
                                            <x-checkbox name="terms" id="terms" required />

                                            <div class="ms-2">
                                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                                ]) !!}
                                            </div>
                                        </div>
                                    </x-label>
                                </div>
                            @endif

                            <div class="flex items-center justify-end mt-4">
                                <a class="underline text-sm text-white hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                                    {{ __('¿Ya estas registrado?') }}
                                </a>
                            </div>

                            <div class="flex items-center justify-center mt-4">
                                <x-button class="justify-center w-full py-3 text-lg bg-gray-800 text-white rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-600">
                                    {{ __('Registrarse') }}
                                </x-button>
                            </div>
                        </form>
                    </x-authentication-card>
                </x-guest-layout>
            </section>
        </main>

        <footer class="bg-gray-500 py-4">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
                &copy; {{ date('Y') }} Sistema de Seguimiento Docente. Todos los derechos reservados.
            </div>
        </footer>

    </body>
</html>