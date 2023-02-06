<form class="md:w-1/2 space-y-5" wire:submit.prevent="insertarproyecto" enctype="multipart/form-data">
    <!-- NOMBRE DE PROYECTO -->
    <div>
        <x-label for="pro_nombre" :value="__('Nombre del Proyecto')" />

        <x-input id="pro_nombre" class="block mt-1 w-full" type="text" name="pro_nombre" :value="old('pro_nombre')" autofocus />

        @error('pro_nombre')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <!-- CREADOR DEL PROYECTO -->
    <div>
        <x-label for="pro_creador" :value="__('Centro Bolivariano de Informatica y Telematica')" />

        <x-input id="pro_creador" class="block mt-1 w-full" type="text" name="pro_creador" :value="old('pro_creador')"  />

        @error('pro_creador')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <!-- COLABORACION -->
    <div>
        <x-label for="pro_colaboracion" :value="__('Colaboración')" />

        <x-input id="pro_colaboracion" class="block mt-1 w-full" type="text" name="pro_colaboracion" :value="old('pro_colaboracion')" />

        @error('pro_colaboracion')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <!-- DESCRIPCION -->
    <div>
        <x-label for="pro_descripcion" :value="__('Descripción')" />

        <textarea wire:model='pro_descripcion' name="pro_descripcion" id="pro_descripcion" :value="old('pro_descripcion')" class="w-full bg-white border border-gray-300 rounded rounded-md transition text-base font-normal text-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 resize-none" rows="10"></textarea>

        @error('pro_descripcion')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <!-- audio o video -->
    <div class="form-group">
        <x-label for="pro_audiovideo" :value="__('Audio o video')" />
        <x-input wire:model="pro_audiovideo" id="pro_audiovideo" class="block mt-1 w-full" type="file" accept="video/*" />

        @error('pro_audiovideo')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <x-button class="my-5">
        {{$tipo}} Datos
    </x-button>
</form>