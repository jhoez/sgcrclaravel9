<div>
    <livewire:conteduc.filtrar-libro />

    <div class="bg-blue-100 rounded-lg">
        <div class="flex flex-wrap justify-between gap-1">
            @forelse ($libros as $data)
                <div class="rounded-lg shadow-lg bg-white m-4">
                    <img class="md:h-auto object-cover md:w-44 rounded-t-lg" src="{{asset('storage/carousel/tiger.jpg')}}" alt=""/>
                    <div class="p-4 md:w-40">
                        <h5 class="text-gray-700 text-sm overflow-auto">{{$data->nomblib}}</h5>
                        
                        <div class="justify-center flex flex-row gap-1">
                            <a href="{{route('descargar.verlib',$data->nomblib)}}" target="_blank" class="mt-5">
                                <img src="{{asset('storage/fonts/view.svg')}}" alt="" class="w-8">
                            </a>
                            <a href="{{route('descargar.desclib',$data->nomblib)}}" class="mt-5">
                                <img src="{{asset('storage/fonts/download.svg')}}" alt="" class="w-8">
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="p-3 text-center text-sm text-gray-600">No hay Registros</p>
            @endforelse
        </div>
        
        <div class="m-10">
            {{$libros->links()}}{{-- paginacion --}}
        </div>
    </div>
</div>