<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-light">{{__('Subir Libro')}}</h2>
        
        <x-submenu>
            <li class="mr-2">
                <a href="{{route('conteduc.index')}}" class="bg-blue-500 text-white p-3 rounded-lg">Contenido Educativo</a>
            </li>
            <li class="mr-2">
                <a href="{{route('conteduc.registros')}}" class="bg-blue-500 text-white p-3 rounded-lg">Registros</a>
            </li>
        </x-submenu>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounde-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold text-center my-10">Subir Libro</h1>

                    @if(session()->has('mensaje'))
                        <p class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5 text-sm rounded-lg">
                            {{session('mensaje')}}
                        </p>
                    @endif
                    
                    <div class="md:flex md:justify-center p-5">
                        <livewire:conteduc.subirlibro :tipo="$tipo='Guardar'" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    

</x-app-layout>