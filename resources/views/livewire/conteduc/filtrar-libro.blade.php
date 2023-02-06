<div class="bg-gray-100 px-10">
    <h2 class="text-2xl md:text-4xl text-gray-600 text-center font-extrabold my-5">Buscar Contenido Educativo</h2>

    <div class="max-w-3xl mx-auto">
        <form wire:submit.prevent='filtrarlibros'>
            <div class="md:flex md:flex-row gap-5 justify-center">
                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-700 uppercase font-bold" for="nombrelibro">Titulo del libro</label>
                    <input 
                        id="nombrelibro"
                        type="text"
                        placeholder="Titulo del libro"
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                        wire:model='nombrelibro'
                    />
                </div>

                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-700 uppercase font-bold">Tipo de Contenido Educativo</label>
                    <select wire:model='tipoconteduc' class="border-gray-300 p-2 w-full rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">-- Selecciones --</option>
                        <option value="inicial">Inicial</option>
                        <option value="primaria">Primaria</option>
                        <option value="media">Media</option>
                        <option value="maestro">Maestro</option>
                        <option value="lectura">Lectura</option>
                    </select>
                </div>
                
                <div class="flex justify-center items-center">
                    <input 
                        type="submit"
                        class="bg-indigo-500 hover:bg-indigo-600 transition-colors text-white text-sm font-bold px-4 py-2 rounded cursor-pointer uppercase w-full md:w-auto"
                        value="Buscar Libro"
                    />
                </div>
            </div>

        </form>
    </div>
</div>
