<form class="md:w-1/2 space-y-5" wire:submit.prevent='insertarlibro' enctype="multipart/form-data">
    <!-- coleccionlib -->
    <div>
        <x-label for="coleccionlib" :value="__('Colección')" />
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
    @if (!empty($arraynivel))
        <div>
            <x-label for="niveles" :value="__('Nivel')" />
            <select wire:model="niveles" id="niveles" class='w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'>
                <option value="">-- Seleccione --</option>
                @foreach( $arraynivel as $colniv )
                    <option value="{{$colniv->nombcata}}">{{$colniv->nombcata}}</option>
                @endforeach
            </select>

            @error('niveles')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>
    @endif

    <!-- imagen -->
    <div>
        <x-label for="portada" :value="__('Portada del Libro')" />

        <x-input wire:model="portada" id="portada" class="block mt-1 w-full" type="file" accept="image/*" />

        <div class="my-5 w-80">
            @if ($portada)
                Portada:
                <img src="{{ $portada->temporaryUrl() }}"><!-- temporaryUrl() permite ver la portada temporal a subir -->
            @endif
        </div>

        @error('portada')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <!-- LIBRO -->
    <div class="form-group">
        <x-label for="archlibro" :value="__('Libro (PDF)')" />
        <x-input wire:model="archlibro" id="archlibro" class="block mt-1 w-full" type="file" accept=".pdf" />

        @error('portada')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <x-button class="my-5">
        {{$tipo}} datos
    </x-button>
</form>