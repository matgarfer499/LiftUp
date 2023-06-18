@extends('layouts.crud')

@section('title', 'CRUD ROPA')

@section('content')


<div class="w-9/12 flex-wrap justify-center mt-4">
    <div class="w-11/12 border-2 border-[#B4C3C9] rounded-md flex justify-between items-center p-4 my-4">
        <h1 class="font-semibold text-2xl">IMAGENES DE LA ROPA</h1>
        <div class="relative w-4/12">
            <div id="url" data-url="imagenes"></div>
            <input id="searchBar" name="generalData" type="text" class="w-full flex justify-between bg-[#F1F3F4] p-2 rounded-md border-0 relative" placeholder="Buscar">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="lg:w-[25px] lg:h-[25px] w-5 h-5 stroke-[#848484] absolute right-2 top-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>
            </input>
        </div>
    </div>
    <div id="table">
        <table class="w-11/12 border-x-2 border-2 border-[#B4C3C9] rounded-md table-fixed bg-white">
            <thead>
                <tr class="text-[#081226]">
                    <th class="p-4 w-2/12">Producto</th>
                    <th class="p-4 w-9/12">Imagenes</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($images as $image)
                <tr class="text-sm hover:bg-gray-200">
                    <td class="p-4 flex flex-col"><span class="flex justify-between">{{$image->type_product}}
                            @if($image->gender == 'H')
                            <svg fill="blue" class="w-6 h-6" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 262.02 262.02" xml:space="preserve">
                                <g>
                                    <path d="M130.914,61.404c16.928,0,30.701-13.771,30.701-30.699C161.615,13.774,147.842,0,130.914,0
		c-16.93,0-30.703,13.774-30.703,30.705C100.211,47.633,113.984,61.404,130.914,61.404z M130.914,15
		c8.657,0,15.701,7.045,15.701,15.705c0,8.656-7.044,15.699-15.701,15.699c-8.659,0-15.703-7.043-15.703-15.699
		C115.211,22.045,122.255,15,130.914,15z" />
                                    <path d="M142.779,68.914h-23.54c-16.518,0-29.956,13.439-29.956,29.959v50.484c0,9.509,4.495,18.307,11.966,23.924v81.238
		c0,4.143,3.358,7.5,7.5,7.5c4.142,0,7.5-3.357,7.5-7.5v-85.316c0-2.879-1.623-5.376-4.003-6.633
		c-4.912-2.623-7.963-7.684-7.963-13.213V98.873c0-8.248,6.709-14.959,14.956-14.959h23.54c8.248,0,14.957,6.711,14.957,14.959
		v50.484c0,5.53-3.054,10.592-7.971,13.216c-2.377,1.258-3.998,3.753-3.998,6.63v85.316c0,4.143,3.358,7.5,7.5,7.5
		c4.142,0,7.5-3.357,7.5-7.5V173.28c7.473-5.616,11.969-14.415,11.969-23.923V98.873C172.736,82.354,159.298,68.914,142.779,68.914z
		" />
                                </g>
                            </svg>
                            @else
                            <svg fill="#de45a6" class="w-6 h-6" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 265.566 265.566" xml:space="preserve">
                                <g>
                                    <path d="M132.786,61.402c16.928,0,30.701-13.77,30.701-30.695C163.486,13.775,149.714,0,132.786,0
		c-16.931,0-30.705,13.775-30.705,30.707C102.08,47.633,115.855,61.402,132.786,61.402z M132.786,15
		c8.657,0,15.701,7.046,15.701,15.707c0,8.654-7.043,15.695-15.701,15.695c-8.66,0-15.705-7.041-15.705-15.695
		C117.08,22.046,124.126,15,132.786,15z" />
                                    <path d="M185.885,165.856l-14.304-28.607V99.09c0-16.545-13.46-30.005-30.004-30.005h-17.588c-16.544,0-30.004,13.46-30.004,30.005
		v38.155l-14.305,28.612c-1.162,2.324-1.038,5.086,0.329,7.297c1.367,2.211,3.781,3.557,6.38,3.557h23.97v81.355
		c0,4.143,3.358,7.5,7.5,7.5s7.5-3.357,7.5-7.5v-81.355h15.039v81.355c0,4.143,3.358,7.5,7.5,7.5c4.142,0,7.5-3.357,7.5-7.5v-81.355
		h23.779c2.599,0,5.013-1.346,6.38-3.557C186.924,170.942,187.048,168.182,185.885,165.856z M98.524,161.711l9.67-19.342
		c0.521-1.041,0.791-2.189,0.791-3.354V99.09c0-8.273,6.731-15.005,15.004-15.005h17.588c8.273,0,15.004,6.731,15.004,15.005v39.93
		c0,1.164,0.271,2.313,0.792,3.354l9.669,19.337H98.524z" />
                                </g>
                            </svg>
                            @endif
                        </span>
                        <span class="text-gray-600 truncate">{{$image->name}}</span>
                    </td>
                    <td class="p-4">
                        <div class="flex flex-wrap justify-center gap-2">
                            @for($i=0; $i < count($image->images); $i++)
                                <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'deleteImg-{{$image->images[$i]->idImg}}')" class="cursor-pointer relative group">
                                    <img src="{{$image->images[$i]->url}}" class="w-[60px] h-[80px] cursor-pointer object-cover" alt="">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="black" class="w-8 h-8 absolute top-[25px] left-[15px] group-hover:opacity-90 opacity-0 duration-500 ease-in-out">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                                <x-modal name="deleteImg-{{$image->images[$i]->idImg}}" focusable>
                                    <form method="POST" action="{{ route('admin.deleteImg',$image->images[$i]->idImg) }}" class="p-6">
                                        @csrf
                                        @method('delete')
                                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 text-center">
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
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="black" class="w-8 h-8 hover:stroke-blue-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                        <x-modal name="createImg-{{$image->id}}" focusable>
                            <form method="POST" action="{{ route('admin.uploadImg') }}" class="p-6" enctype="multipart/form-data">
                                @csrf
                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    Añadir imagen a {{$image->type_product}} {{$image->name}}
                                </h2>
                                <input type="text" id="idClo" name="idClo" wire:model="idClo" value="{{$image->id}}" class="form-input hidden" />
                                <div class="my-6">
                                    <label for="url{{$image->id}}" class="w-full text-gray-700 font-bold mb-2">Sube una imagen:</label>
                                    <input type="file" id="url{{$image->id}}" name="url" wire:model="url" class="imgs form-input rounded-md shadow-sm mt-1 w-full" />
                                    <input type="text" id="name" name="name" value="{{$image->name}}" class="hidden">
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
</div>
@endsection