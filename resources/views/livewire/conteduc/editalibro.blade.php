<form class="md:w-1/2 space-y-5" wire:submit.prevent='actualizarlibro' enctype="multipart/form-data">
    <!-- coleccionlib -->
    <div>
        <x-label for="coleccionlib" :value="__('Colección')" />
        <p class="text-sm text-gray-500"><strong>Colección actual: </strong> {{$libros->coleccion}}</p>
        <select wire:model="coleccion"  id="coleccionlib" class='w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'>
            <option value="">-- Seleccione --</option>
            @foreach( $arraycoleccion as $colec )
                <option value="{{$colec->nombcata}}">{{$colec->nombcata}}</option>
            @endforeach
        </select>

        {{-- <div wire:loading.delay.longer>Procesando los datos man</div> --}}

        @error('coleccion')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <!-- nivel -->
    <div>
        @if (!empty($arraynivel))
            <x-label for="niveles" :value="__('Nivel')" />
            <p class="text-sm text-gray-500"><strong>Nivel actual: </strong> {{$libros->nivel}}</p>
            <select wire:model="niveles" id="niveles" class='w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'>
                <option value="">-- Seleccione --</option>
                @foreach( $arraynivel as $colniv )
                    <option value="{{$colniv->nombcata}}">{{$colniv->nombcata}}</option>
                @endforeach
            </select>

            @error('niveles')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        @endif
    </div>

    <!-- imagen -->
    <div>
        <x-label for="portada" :value="__('Portada del Libro')" />

        <x-input wire:model="portada_nueva" id="portada" class="block mt-1 w-full pl-1" type="file" accept="image/*" />

        <div class="my-5 w-80">
            @if ($portada)
                Portada actual:
                <img src="{{ asset("storage/".$libros->relimagen->ruta."/".$libros->relimagen->nombimg) }}"><!-- temporaryUrl() permite ver la portada temporal a subir -->
            @endif
        </div>

        @error('portada_nueva')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <!-- LIBRO -->
    <div class="">
        <x-label for="archlibro" :value="__('Libro (PDF)')" />
        <p class="text-sm text-gray-500"><strong>Libro actual: </strong> {{$libros->nomblib}}</p>
        <x-input wire:model="libro_nuevo" id="archlibro" class="block mt-1 w-full pl-1" type="file" accept=".pdf" />

        @error('libro_nuevo')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <x-button class="my-5">
        Actualizar Libro
    </x-button>
</form>