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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounde-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold text-center my-10">Subir Proyecto</h1>

                    @if(session()->has('mensaje'))
                        <p class="uppercase border border-green-600 bg-green-100 text-center text-green-600 font-bold p-2 my-5 text-sm rounded-lg">
                            {{session('mensaje')}}
                        </p>
                    @endif
                    
                    <div class="md:flex md:justify-center p-5">
                        <form action="{{route('prodig.subirproyecto')}}" method="POST" class="md:w-1/2 space-y-5" enctype="multipart/form-data">
                            @csrf
                            <!-- NOMBRE DE PROYECTO -->
                            <div>
                                <label class="block text-sm text-gray-500 font-bold upppercase mb-2" for="pro_nombre">Nombre del Proyecto</label>
                        
                                <input id="pro_nombre" class="block mt-1 w-full text-gray-700 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="pro_nombre" value="{{ old('pro_nombre') }}" autofocus />
                        
                                @error('pro_nombre')
                                    <livewire:mostrar-alerta :message="$message" />
                                @enderror
                            </div>
                        
                            <!-- CREADOR DEL PROYECTO -->
                            <div>
                                <label class="block text-sm text-gray-500 font-bold upppercase mb-2" for="pro_creador" >Centro Bolivariano de Informatica y Telematica</label>
                        
                                <input id="pro_creador" class="block mt-1 w-full text-gray-700 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="pro_creador" value="{{old('pro_creador')}}"  />
                        
                                @error('pro_creador')
                                    <livewire:mostrar-alerta :message="$message" />
                                @enderror
                            </div>
                        
                            <!-- COLABORACION -->
                            <div>
                                <label class="block text-sm text-gray-500 font-bold upppercase mb-2" for="pro_colaboracion" >Colaboración</label>
                        
                                <input id="pro_colaboracion" class="block mt-1 w-full text-gray-700 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="pro_colaboracion" value="{{old('pro_colaboracion')}}" />
                        
                                @error('pro_colaboracion')
                                    <livewire:mostrar-alerta :message="$message" />
                                @enderror
                            </div>
                        
                            <!-- DESCRIPCION -->
                            <div>
                                <label class="block text-sm text-gray-500 font-bold upppercase mb-2" for="pro_descripcion">Descripción</label>
                        
                                <textarea name="pro_descripcion" id="pro_descripcion" class="w-full bg-white border border-gray-300 rounded rounded-md transition text-base font-normal text-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 resize-none" rows="10"></textarea>
                        
                                @error('pro_descripcion')
                                    <livewire:mostrar-alerta :message="$message" />
                                @enderror
                            </div>
                        
                            <!-- audio o video -->
                            <div class="form-group">
                                <label class="block text-sm text-gray-500 font-bold upppercase mb-2" for="pro_audiovideo">Audio o video</label>
                                <input id="pro_audiovideo" name="pro_audiovideo" class="block mt-1 w-full text-gray-700 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="file" accept="video/*" />
                                
                                @error('pro_audiovideo')
                                    <livewire:mostrar-alerta :message="$message" />
                                @enderror
                            </div>
                        
                            <x-button class="my-5">
                                Subir Proyecto
                            </x-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>