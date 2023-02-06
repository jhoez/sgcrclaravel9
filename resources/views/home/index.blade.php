<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Dashboard') }}</h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="mx-auto">
            <div class="flex justify-center items-center gap-10">
                <div class="basis-1/2">
                    <img src="{{asset('storage/carousel/tiger.jpg')}}" alt="">
                    <h3 class="text-sm font-bold uppercase text-gray-600">
                        Fundación Bolivariana de Informática y Telemática, 
                        ente adscrito al MPPE Impulsamos las políticas del 
                        Sistema Educativo Nacional a través del uso de las TIC.
                    </h3>
                </div>
                <div class="basis-1/3 bg-indigo-700">noticias de twetter</div>
            </div>
        </div>
    </div>
</x-app-layout>