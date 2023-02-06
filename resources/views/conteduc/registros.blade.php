<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Libros registrados') }}</h2>
        
        <x-submenu>
            <li class="mr-2">
                <a href="{{route('conteduc.index')}}" class="bg-blue-500 text-white p-3 rounded-lg">Contenido Educativo</a>
            </li>
            <li class="mr-2">
                <a href="{{route('conteduc.crearcontenido')}}" class="bg-blue-500 text-white p-3 rounded-lg">Subir Libros</a>
            </li>
        </x-submenu>
    </x-slot>

    <livewire:conteduc.mostrarlibros />

</x-app-layout>