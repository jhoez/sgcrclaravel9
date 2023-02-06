<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SGCRC') }}</title>

        @livewireStyles

        @stack('styles')

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <header>
            <img src="{{asset('storage/img/bannerfundabit.png')}}" alt="">
        </header>
        <div class="bg-gray-100 flex flex-col min-h-screen">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="">
                    <div class="max-w-7xl mx-auto text-center flex justify-between py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="container mx-auto mt-5">
                {{ $slot }}
            </main>

            <footer class="mt-auto p-4 bg-white md:flex md:flex-col md:items-center gap-2 md:p-6 dark:bg-gray-800">
                <div class="flex">
                    <div class="w-1/3">
                        <p class="text-center font-bold text-gray-500">Dirección</p>
                        <hr>
                        <p class="text-justify text-gray-500 p-5">
                            Esq. de Salas a Caja de Agua, Edif. 
                            Sede del Ministerio del Poder Popular para la Educación (MPPE), 
                            Parroquia Altagracia, Dtto. Capital, Caracas- Venezuela, 
                            Teléfonos: (+58-212) 506.88.15 - RIF: G-20003142-5
                        </p>
                    </div>
                    <div class="w-1/3">
                        <p class="text-center font-bold text-gray-500">Acerca de Fundabit</p>
                        <hr class="mb-5">
                        
                        <ul class="flex flex-col items-center gap-5 text-sm text-gray-500 dark:text-gray-400 sm:mt-0">
                            <li>
                                <a href="#" class="mr-4 mt-5 hover:underline">Misión y Visión</a>
                            </li>
                            <li>
                                <a href="#" class="mr-4 mt-5 hover:underline">Objetivos</a>
                            </li>
                            <li>
                                <a href="#" class="mr-4 mt-5 hover:underline">Valores</a>
                            </li>
                        </ul>
                    </div>
                    <div class="w-1/3">
                        <p class="text-center font-bold text-gray-500">Coordinación Zonal Distrito Capital</p>
                        <hr>
                        <ul class="flex flex-col items-center mt-3 text-sm text-gray-500 dark:text-gray-400 sm:mt-0">
                            <li>
                                <p class="mr-4 mt-5 text-sm">Correo: NombreDeCorro@empresa.com</p>
                            </li>
                            <li>
                                <p class="mr-4 mt-5 text-sm">Numero: (0212)123-12-12</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <span class="text-sm text-gray-500 sm:text-center">
                    © {{ now()->year }}. Todos los derechos reservados.
                </span>
            </footer>

            @livewireScripts

            @stack('scripts')
        </div>
    </body>
</html>
