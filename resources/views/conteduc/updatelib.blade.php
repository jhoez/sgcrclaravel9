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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounde-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session()->has('mensaje'))
                        <div class="text-center uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-3">
                            {{ session('mensaje') }}
                        </div>
                    @endif
                    
                    <h1 class="text-2xl font-bold text-center my-10">Editar Libro: {{ $libros->nomblib }}</h1>
                    
                    <div class="md:flex md:justify-center p-5">
                        <livewire:conteduc.editalibro :libros="$libros"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>