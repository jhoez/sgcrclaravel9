<div>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:mx-6 lg:-mx-8">
          <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
              @if(session()->has('mensaje'))
                <div class="flex items-center justify-center max-w-xl mx-auto uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5 text-sm rounded-lg">
                  {{session('mensaje')}}
                </div>
              @endif

              <table class="min-w-full">
                <thead class="border-b bg-cyan-500">
                  <tr>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Libro</th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Imagen</th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Colección</th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Acción</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($libros as $libro)
                    <tr class="border-b">
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$libro->nomblib}}</td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$libro->relimagen->nombimg}}</td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$libro->coleccion}}</td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        <div class="flex flex-row items-stretch gap-3 mt-5 md:mt-0">
                          <a href="{{route('conteduc.detallelib',$libro->idlib)}}"><img src="{{asset('storage/fonts/view.svg')}}" alt=""></a>
                          <a href="{{route('conteduc.updatelib',$libro->idlib)}}"><img src="{{asset('storage/fonts/pencil.svg')}}" alt=""></a>
                          
                          {{-- <button wire:click="$emit('dlibro',{{$libro->idlib}})">
                            <img src="{{asset('storage/fonts/cross.svg')}}" alt="">
                          </button> --}}
                          <button wire:click="$emit('eliminarlibro',{{$libro->idlib}})">
                            <img src="{{asset('storage/fonts/cross.svg')}}" alt="">
                          </button>
                        </div>
                      </td>
                    </tr>
                  @empty
                    <tr class="border-b">
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">No hay Registros</td>
                    </tr>
                  @endforelse
    
                </tbody>
              </table>
              <div class="mt-10">
                {{$libros->links()}}{{-- paginacion --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    
      @push('scripts')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
        <script>
            Livewire.on('eliminarlibro', libroid =>{
                Swal.fire({
                    title: '¿Eliminar Libro?',
                    text: "Una Libro eliminado no se puede recuperar!!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Eliminar!!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let resultado = Livewire.emit('dlibro',libroid);
                        console.log(resultado);
                        /* Swal.fire(
                            'Libro Eliminado!!',
                            'Eliminado correctamente.',
                            'success'
                        ) */
                    }
                });
            });
      </script>
      @endpush
</div>