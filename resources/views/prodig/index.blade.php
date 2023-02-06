<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Proyectos Digitales') }}</h2>
        
        <x-submenu>
            <li class="mr-2">
                <a href="{{route('prodig.crearproyecto')}}" class="bg-blue-500 text-white p-3 rounded-lg">Subir Libros</a>
            </li>
            <li class="mr-2">
                <a href="{{route('prodig.registros')}}" class="bg-blue-500 text-white p-3 rounded-lg">Registros</a>
            </li>
        </x-submenu>
    </x-slot>

    <livewire:prodig.proyectosdigitales />
    
</x-app-layout>