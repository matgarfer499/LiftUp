@extends('layouts.crud')

@section('title', 'CRUD ROPA')

@section('content')


<div class="w-9/12 flex-wrap justify-center mt-4">
    <h1 class="font-semibold text-2xl my-4 uppercase">Datos de la ropa</h1>
    <div class="w-11/12 border-x-2 border-t-2 bg-blue-700 border-gray-400 pt-1 pl-4">
        <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'add-clothe')">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </button>
        <x-modal name="add-clothe" focusable>
            <form method="POST" action="{{route('admin.create')}}" class="p-6">
                @csrf

                <h2 class="text-lg text-center uppercase font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Añadir ropa') }}
                </h2>

                <div class="mb-4">
                    <label for="type_product" class="w-full text-gray-700 font-bold mb-2">Tipo producto:</label>
                    <input type="text" id="type_product" name="type_product" wire:model="type_product" class="form-input rounded-md shadow-sm mt-1 w-full" />
                    @error('type_product') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="name" class="w-full text-gray-700 font-bold mb-2">Nombre del producto:</label>
                    <input type="text" id="name" name="name" wire:model="name" class="form-input rounded-md shadow-sm mt-1 w-full" />
                    @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="text-gray-700 font-bold mb-2" for="gender">Hombre</label>
                    <input id="gender" class="mt-1" type="radio" name="gender" value="H" />
                    <label class="text-gray-700 font-bold mb-2" for="gender">Mujer</label>
                    <input id="gender" class="mt-1" type="radio" name="gender" value="M" />
                    @error('gender') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="text-gray-700 font-bold mb-2" for="discount">Descuento: </label>
                    <label class="text-gray-700 font-bold mb-2" for="discount">No</label>
                    <input id="discount" class="mt-1" type="radio" wire:model="discount" name="discount" value="0" />
                    <label class="text-gray-700 font-bold mb-2" wire:model="discount" for="discount">Si</label>
                    <input id="discount" class="mt-1" type="radio" name="discount" value="1" />
                    @error('discount') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="discount_rate" class="w-full text-gray-700 font-bold mb-2">cantidad descuento:</label>
                    <input type="number" min="0" max="99" id="discount_rate" name="discount_rate" wire:model="discount_rate" class="form-input rounded-md shadow-sm mt-1 w-1/4" />
                    @error('discount_rate') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="price" class="w-full text-gray-700 font-bold mb-2">Precio:</label>
                    <input type="number" step="0.01" min="0" max="9999" id="price" name="price" wire:model="price" class="form-input rounded-md shadow-sm mt-1 w-1/4" />
                    @error('number') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="w-full text-gray-700 font-bold mb-2">Descripcion:</label>
                    <textarea id="description" name="description" wire:model="description" class="form-input rounded-md shadow-sm mt-1 w-full"></textarea>
                    @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="mt-6 flex justify-end">
                    <x-primary-button class="mr-3">
                        {{ __('Añadir') }}
                    </x-primary-button>
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancelar') }}
                    </x-secondary-button>
                </div>
            </form>
        </x-modal>
    </div>
    <table class="w-11/12 border-x-2 border-gray-400 table-fixed bg-white">
        <thead>
            <tr class="border-x-2 border-gray-400 bg-blue-700 text-white">
                <th class="p-4">Producto</th>
                <th class="p-4">Nombre</th>
                <th class="p-4">Genero</th>
                <th class="p-4 w-1/4">Descuento</th>
                <th class="p-4">Precio</th>
                <th class="p-4 w-1/4">Descripcion</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($clothes as $clothe)
            <tr class="border-b-2 border-gray-400 text-center hover:bg-gray-200">
                <td class="p-4">{{$clothe->type_product}}</td>
                <td class="p-4">{{$clothe->name}}</td>
                @if($clothe->gender == 'H')
                <td class="p-4">Hombre</td>
                @else
                <td class="p-4">Mujer</td>
                @endif
                @if($clothe->discount == '0')
                <td class="p-4">Sin descuento</td>
                @else
                <td class="p-4">Descuento del {{$clothe->discount_rate}}%</td>
                @endif
                <td class="p-4">{{$clothe->price}}€</td>
                <td class="w-1/4 truncate text-gray-600">"{{$clothe->description}}"</td>
                <td class="px-4 py-2 flex justify-center">
                    <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'edit-clothe-{{$clothe->id}}')" class="mx-2 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:stroke-green-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                    </button>
                    <x-modal name="edit-clothe-{{$clothe->id}}" focusable>
                        <form method="POST" action="{{route('admin.edit', $clothe->id)}}" class="p-6">
                            @csrf
                            @method('PUT')
                            <h2 class="text-lg text-center uppercase font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Editar ropa') }}
                            </h2>

                            <div class="mb-4">
                                <label for="type_product" class="w-full text-gray-700 font-bold mb-2">Tipo producto:</label>
                                <input type="text" id="type_product" name="type_product" wire:model="type_product" class="form-input rounded-md shadow-sm mt-1 w-full" value="{{$clothe->type_product}}" />
                                @error('type_product') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-4">
                                <label for="name" class="w-full text-gray-700 font-bold mb-2">Nombre del producto:</label>
                                <input type="text" id="name" name="name" wire:model="name" class="form-input rounded-md shadow-sm mt-1 w-full" value="{{$clothe->name}}" />
                                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-4">
                                <label class="text-gray-700 font-bold mb-2" for="gender">Hombre</label>
                                <input id="gender" class="mt-1" type="radio" name="gender" value="H" />
                                <label class="text-gray-700 font-bold mb-2" for="gender">Mujer</label>
                                <input id="gender" class="mt-1" type="radio" name="gender" value="M" />
                                @error('gender') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-4">
                                <label class="text-gray-700 font-bold mb-2" for="discount">Descuento: </label>
                                <label class="text-gray-700 font-bold mb-2" for="discount">No</label>
                                <input id="discount" class="mt-1" type="radio" wire:model="discount" name="discount" value="0" />
                                <label class="text-gray-700 font-bold mb-2" wire:model="discount" for="discount">Si</label>
                                <input id="discount" class="mt-1" type="radio" name="discount" value="1" />
                                @error('discount') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-4">
                                <label for="discount_rate" class="w-full text-gray-700 font-bold mb-2">cantidad descuento:</label>
                                <input type="number" id="discount_rate" name="discount_rate" wire:model="discount_rate" min="0" max="99" class="form-input rounded-md shadow-sm mt-1 w-1/4" value="{{$clothe->discount_rate}}"/>
                                @error('discount_rate') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-4">
                                <label for="price" class="w-full text-gray-700 font-bold mb-2">Precio:</label>
                                <input type="number" step="0.01" id="price" name="price" wire:model="price" min="0" max="9999" class="form-input rounded-md shadow-sm mt-1 w-1/4" value="{{$clothe->price}}"/>
                                @error('number') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-4">
                                <label for="description" class="w-full text-gray-700 font-bold mb-2">Descripcion:</label>
                                <textarea id="description" name="description" wire:model="description" class="form-input rounded-md shadow-sm mt-1 w-full" placeholder="{{$clothe->description}}"></textarea>
                                @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="mt-6 flex justify-end">
                                <x-primary-button class="mr-3">
                                    {{ __('Editar') }}
                                </x-primary-button>
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('Cancelar') }}
                                </x-secondary-button>
                            </div>
                        </form>
                    </x-modal>
                    <form class="pt-2" action="{{route('admin.delete', $clothe->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="mx-2 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:stroke-red-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="my-4 flex flex-wrap justify-center items-center w-full">
        {{$clothes->links()}}
    </div>
</div>
@endsection