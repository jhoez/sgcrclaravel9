<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Detalles') }}</h2>
        
        <x-submenu>
            <li class="mr-2">
                <a href="{{route('conteduc.registros')}}" class="bg-blue-500 text-white p-3 rounded-lg">Registros</a>
            </li>
        </x-submenu>
    </x-slot>

    <div class="bg-gray-50 mb-5">
      <h2 class="text-2xl text-gray-600 text-center font-extrabold pt-5 mb-5">Detalle de libro: {{$libro->nomblib}}</h2>

      <div class="flex">
        <div class="overflow-x-auto sm:mx-6 lg:-mx-8">
          <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
              
              <div class="flex justify-center">
                <div class="md:w-6/12 lg:w-6/12 px-5">
                  <img  src="{{asset("storage/".$libro->relimagen->ruta."/".$libro->relimagen->nombimg)}}" alt="">
                </div>
                <div class="md:w-6/12 lg:w-6/12 flex flex-col items-center md:flex-row">
                  <div class="md:w-6/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10 md:py-10">
                    <p class="text-gray-800 text-sm mb:3 font-bold mt-5">
                      <span class="font-normal">Nombre del Libro: </span>
                      {{$libro->nomblib}}
                    </p>
          
                    
                    <p class="text-gray-800 text-sm mb:3 font-bold">
                      <span class="font-normal">Colección: </span>
                      {{$libro->coleccion}}
                    </p>
                    
                    <p class="text-gray-800 text-sm mb:3 font-bold">
                      <span class="font-normal">Nivel: </span>
                      {{$libro->nivel}}
                    </p>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

</x-app-layout>