<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Canaimitas') }}</h2>
        
        <x-submenu>
            <li class="mr-2">
                <a href="{{route('canaimitas.index')}}" class="bg-blue-500 text-white p-3 rounded-lg">Registrar Canaimita</a>
            </li>
            <li class="mr-2">
                <a href="{{route('canaimitas.index')}}" class="bg-blue-500 text-white p-3 rounded-lg">Crear Reportes</a>
            </li>
            <li class="mr-2">
                <a href="{{route('canaimitas.index')}}" class="bg-blue-500 text-white p-3 rounded-lg">Archivos</a>
            </li>
            <li class="mr-2">
                <a href="{{route('canaimitas.index')}}" class="bg-blue-500 text-white p-3 rounded-lg">Asistencia</a>
            </li>
            <li class="mr-2">
                <a href="{{route('canaimitas.index')}}" class="bg-blue-500 text-white p-3 rounded-lg">Carousel</a>
            </li>
        </x-submenu>
    </x-slot>
    
</x-app-layout>