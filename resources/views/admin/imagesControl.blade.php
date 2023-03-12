@extends('layouts.crud')

@section('title', 'CRUD ROPA')

@section('content')


<div class="w-9/12 flex-wrap justify-center mt-4">
    <h1 class="font-semibold text-2xl my-4 uppercase">Imagenes de la ropa</h1>
    <table class="w-11/12 border-x-2 border-gray-400 table-fixed bg-white">
        <thead>
            <tr class="border-x-2 border-gray-400 bg-blue-700 text-white">
                <th class="p-4">Producto</th>
                <th class="p-4">Nombre</th>
                <th class="p-4 w-3/5">Imagenes</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($images as $image)
            <tr class="border-b-2 border-gray-400 text-center hover:bg-gray-200">
                <td class="p-4">{{$image->type_product}}</td>
                <td class="p-4">{{$image->name}}</td>
                <td class="p-4">
                    <div class="flex flex-wrap justify-start">
                        @for($i=0; $i < count($image->images); $i++)
                            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'deleteImg-{{$image->images[$i]->idImg}}')" class="mx-2 cursor-pointer">
                                <img src="{{$image->images[$i]->url}}" class="w-[60px] h-[80px] ml-2 cursor-pointer hover:border-8 hover:border-red-600" alt="">
                            </button>
                            <x-modal name="deleteImg-{{$image->images[$i]->idImg}}" focusable>
                                <form method="POST" action="{{ route('admin.deleteImg',$image->images[$i]->idImg) }}" class="p-6">
                                    @csrf
                                    @method('delete')
                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                        {{ __('¿Seguro que quieres eliminar esta imagen?') }}
                                    </h2>
                                    <div class="w-full flex justify-center">
                                        <img src="{{$image->images[$i]->url}}" class="w-[200px] h-[300px]" alt="">
                                    </div>
                                    <div class="mt-6 flex justify-center">
                                        <x-secondary-button x-on:click="$dispatch('close')">
                                            {{ __('Cancelar') }}
                                        </x-secondary-button>
                                        <x-danger-button class="ml-3">
                                            {{ __('Borrar imagen') }}
                                        </x-danger-button>
                                    </div>
                                </form>
                            </x-modal>
                            @endfor
                    </div>
                </td>
                <td class="px-4 py-2 flex items-center h-[100px]">
                    <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'createImg-{{$image->id}}')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="black" class="w-12 h-12 hover:stroke-blue-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                    <x-modal name="createImg-{{$image->id}}" focusable>
                        <form method="POST" action="{{ route('admin.uploadImg') }}" class="p-6">
                            @csrf
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                Añadir imagen a {{$image->type_product}} {{$image->name}}
                            </h2>
                            <input type="text" id="idClo" name="idClo" wire:model="idClo" value="{{$image->id}}" class="form-input hidden" />
                            <div class="my-6">
                                <label for="url" class="w-full text-gray-700 font-bold mb-2">Introduce la url:</label>
                                <input type="text" id="url" name="url" wire:model="url" class="form-input rounded-md shadow-sm mt-1 w-full" />
                                @error('url') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('Cancelar') }}
                                </x-secondary-button>
                                <x-primary-button class="ml-3">
                                    {{ __('Añadir imagen') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </x-modal>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="my-4 flex flex-wrap justify-center items-center w-full pb-2">
        {{$images->links()}}
    </div>
</div>
@endsection