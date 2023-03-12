<div class="flex flex-wrap justify-center w-3/4">
    @if (session()->has('message'))
        <div class="bg-green-200 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="w-full">
        <div class="mb-4">
            <label for="type_product" class="w-1/12 text-gray-700 font-bold mb-2">Tipo producto:</label>
            <input type="text" id="type_product" name="type_product" wire:model="type_product" class="form-input rounded-md shadow-sm mt-1 w-2/12" />
            @error('type_product') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="name" class="w-1/12 text-gray-700 font-bold mb-2">Nombre del producto:</label>
            <input type="text" id="name" name="name" wire:model="name" class="form-input rounded-md shadow-sm mt-1 w-2/12" />
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="text-gray-700 font-bold mb-2" for="gender">Hombre</label>
            <input id="gender" class="mt-1" type="radio" name="gender" value="H"/>
            <label class="text-gray-700 font-bold mb-2" for="gender">Mujer</label>
            <input id="gender" class="mt-1" type="radio" name="gender" value="M"/>
            @error('gender') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        
        <div class="mb-4">
            <label class="text-gray-700 font-bold mb-2" for="discount">Descuento: </label>   
            <label class="text-gray-700 font-bold mb-2" for="discount">No</label>
            <input id="discount" class="mt-1" type="radio" name="discount" value="0"/>
            <label class="text-gray-700 font-bold mb-2" for="discount">Si</label>
            <input id="discount" class="mt-1" type="radio" name="discount" value="1"/>
            @error('discount') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="discount_rate" class="w-1/12 text-gray-700 font-bold mb-2">Indica la cantidad del descuento:</label>
            <input type="number" id="discount_rate" name="discount_rate" wire:model="discount_rate" class="form-input rounded-md shadow-sm mt-1 block w-2/12" />
            @error('discount_rate') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="price" class="w-1/12 text-gray-700 font-bold mb-2">Precio:</label>
            <input type="number" id="price" name="price" wire:model="price" class="form-input rounded-md shadow-sm mt-1 w-2/12" />
            @error('number') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="w-1/12 text-gray-700 font-bold mb-2">Descripcion:</label>
            <textarea id="description" name="description" wire:model="description" class="form-input rounded-md shadow-sm mt-1 w-full"></textarea>
            @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mt-6">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue disabled:opacity-25 transition ease-in-out duration-150">
                Añadir
            </button>
        </div>
    </form>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
