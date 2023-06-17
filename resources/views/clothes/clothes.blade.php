@extends('layouts.plantilla')

@section('title', $gender)

@section('scripts')
@parent
<!-- @vite('resources/js/buttons.js') -->
@vite('resources/js/slider.js')
@vite('resources/js/displayMobile.js')
<script src="{{asset('js/wishlist.js')}}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.js"></script>
@vite('resources/js/filterSort.js')
@endsection

@section('content')
<div class="w-full flex justify-center">
    <input id="searchInput" name="{{$gender}}" type="text" class="opacity-0 w-11/12 m-auto p-4 shadow-lg shadow-black fixed z-50 bg-white rounded-full pointer-events-none" autofocus></input>
    <div class="w-11/12 flex flex-wrap justify-between">
        <div class="w-full font-normal text-sm text-[#9f9fa0] ml-2">
            {{$gender}}
        </div>
        <div class="w-full font-bold text-lg ml-2">TODOS LOS PRODUCTOS <span id="totalProducts" class="font-normal text-xs text-[#9f9fa0]">{{$amount}} productos</span></div>
    </div>
</div>
<div class="w-full flex justify-center">
    <div class="w-11/12 relative flex flex-wrap btnHide:justify-end justify-between mb-4">
        <div class="w-16 h-8 absolute top-1 left-2 bg-white border-2 border-gray-300 rounded-full opacity-40 btnHide:hidden" id="layout"></div>
        <button class="w-40 h-10 border-2 border-gray-300 bg-gray-100 rounded-full flex justify-around items-center btnHide:hidden" id="displayBtn">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path d="M384 80c8.8 0 16 7.2 16 16V416c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V96c0-8.8 7.2-16 16-16H384zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
            </svg>
        </button>
        <button id="filterSortBtn" class="h-10 border-2 border-gray-300 bg-gray-100 rounded-full flex justify-start items-center mr-2 hover:bg-gray-200 hover:border-gray-400 w-40">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
            </svg>
            <span class="font-semibold text-xs ml-2">
                FILTRAR Y ORDENAR
            </span>
        </button>
    </div>
</div>
<div id="filterSortDiv" class="fixed z-50 h-screen max-h-screen sm:w-3/4 md:w-2/4 lg:w-1/4 w-full bg-white top-0 -right-[2000px] overflow-auto scrollbar-x-hidden">
    <div class="w-11/12 flex justify-between items-center h-[50px] m-auto">
        <div id="closeFiltersBtn" class="w-1/4 flex cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </div>
        <span class="font-semibold text-sm w-2/5 flex justify-center">FILTRAR Y ORDENAR</span>
        <button value="{{$gender}}" id="removeFilters" class="font-medium text-[10px] text-gray-400 w-1/4 flex justify-end">QUITAR FILTROS</button>
    </div>
    <details class="w-11/12 py-6 border-b-2 border-gray-300 m-auto cursor-pointer">
        <summary class="flex justify-between items-center h-full">
            <span class="font-bold">ORDENAR POR</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 stroke-gray-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
        </summary>
        <div class="py-2">
            <input type="radio" name="sort" value="asc" class="sort checked:ring-black p-3">
            <label for="low">De mas barato a mas caro</label>
        </div>
        <div class="py-2">
            <input type="radio" name="sort" value="desc" class="sort checked:ring-black p-3">
            <label for="high">De mas caro a mas barato</label>
        </div>
        <div class="py-2">
            <input type="radio" name="sort" value="default" class="sort checked:ring-black p-3" checked>
            <label for="high">Relevancia</label>
        </div>
        <div class="py-2">
            <input type="radio" name="sort" value="new" class="sort checked:ring-black p-3">
            <label for="high">Nuevos</label>
        </div>
    </details>
    <details class="w-11/12 py-6 border-b-2 border-gray-300 m-auto cursor-pointer">
        <summary class="flex justify-between items-center h-full">
            <span class="font-bold">TIPO DE PRODUCTO</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 stroke-gray-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
        </summary>
        <div class="w-full grid grid-cols-2 gap-1">
            <div class="checkbox relative">
                <input name="typeProduct" type="checkbox" id="shirts" value="camiseta" class="noChecked pointer-events-none bottom-0 right-0 opacity-0 absolute checked:bg-black">
                <label for="shirts" class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">Camisetas</label>
            </div>
            <div class="checkbox relative">
                <input name="typeProduct" type="checkbox" id="hoodies" value="sudadera" class="noChecked pointer-events-none bottom-0 right-0 opacity-0 absolute checked:bg-black">
                <label for="hoodies" class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">Sudaderas</label>
            </div>
            <div class="checkbox relative">
                <input name="typeProduct" type="checkbox" id="bottoms" value="pantalon" class="noChecked pointer-events-none bottom-0 right-0 opacity-0 absolute checked:bg-black">
                <label for="bottoms" class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">Pantalones</label>
            </div>
            <div class="checkbox relative">
                <input name="typeProduct" type="checkbox" id="shorts" value="short" class="noChecked pointer-events-none bottom-0 right-0 opacity-0 absolute checked:bg-black">
                <label for="shorts" class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">Shorts</label>
            </div>
            <div class="checkbox relative">
                <input name="typeProduct" type="checkbox" id="tanks" value="tank" class="noChecked pointer-events-none bottom-0 right-0 opacity-0 absolute checked:bg-black">
                <label for="tanks" class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">Tanks</label>
            </div>
            <div class="checkbox relative">
                <input name="typeProduct" type="checkbox" id="tirantes" value="tirante" class="noChecked pointer-events-none bottom-0 right-0 opacity-0 absolute checked:bg-black">
                <label for="tirantes" class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">Tirantes</label>
            </div>
        </div>
    </details>
    <details class="w-11/12 cursor-pointer py-6 border-b-2 border-gray-300 m-auto">
        <summary class="flex justify-between items-center h-full">
            <span class="font-bold">TALLA</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 stroke-gray-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
        </summary>
        <div class="w-full grid grid-cols-4 gap-1">
            <div class="checkbox relative">
                <input name="sizes" type="checkbox" id="XS" value="XS" class="noChecked pointer-events-none bottom-0 right-0 opacity-0 absolute checked:bg-black">
                <label for="XS" class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">XS</label>
            </div>
            <div class="checkbox relative">
                <input name="sizes" type="checkbox" id="S" value="S" class="noChecked pointer-events-none bottom-0 right-0 opacity-0 absolute checked:bg-black">
                <label for="S" class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">S</label>
            </div>
            <div class="checkbox relative">
                <input name="sizes" type="checkbox" id="M" value="M" class="noChecked pointer-events-none bottom-0 right-0 opacity-0 absolute checked:bg-black">
                <label for="M" class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">M</label>
            </div>
            <div class="checkbox relative">
                <input name="sizes" type="checkbox" id="L" value="L" class="noChecked pointer-events-none bottom-0 right-0 opacity-0 absolute checked:bg-black">
                <label for="L" class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">L</label>
            </div>
            <div class="checkbox relative">
                <input name="sizes" type="checkbox" id="XL" value="XL" class="noChecked pointer-events-none bottom-0 right-0 opacity-0 absolute checked:bg-black">
                <label for="XL" class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">XL</label>
            </div>
            <div class="checkbox relative">
                <input name="sizes" type="checkbox" id="2XL" value="2XL" class="noChecked pointer-events-none bottom-0 right-0 opacity-0 absolute checked:bg-black">
                <label for="2XL" class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">2XL</label>
            </div>
        </div>
    </details>
    <details class="w-11/12 cursor-pointer py-6 border-b-2 border-gray-300 m-auto">
        <summary class="flex justify-between items-center h-full">
            <span class="font-bold">COLOR</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 stroke-gray-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
        </summary>
        <div class="w-full grid grid-cols-3 mb-2">
            @foreach($colors as $color)
            <div class="colorCheckbox w-1/3 m-auto relative">
                <input name="color" type="checkbox" id="{{$color->color}}" value="{{$color->color}}" class="noChecked bottom-0 right-0 opacity-0 absolute pointer-events-none" autofocus>
                <div class="w-12 h-12 rounded-full border-black/50 border-2 m-2 relative" style="background-color:#{{$color->color}}">
                    <label for="{{$color->color}}" class="w-full h-full absolute"></label>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hidden pointer-events-none absolute top-2 left-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                </div>
            </div>
            @endforeach
        </div>
    </details>
    <details class="w-11/12 cursor-pointer py-6 border-b-2 border-gray-300 m-auto">
        <summary class="flex justify-between items-center h-full">
            <span class="font-bold">DESCUENTO</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 stroke-gray-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
        </summary>
        <div class="w-full grid grid-cols-2 gap-1">
            <div class="checkbox relative">
                <input name="discount" type="checkbox" id="10%" value="10" class="noChecked pointer-events-none bottom-0 right-0 opacity-0 absolute checked:bg-black">
                <label for="10%" class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">10%</label>
            </div>
            <div class="checkbox relative">
                <input name="discount" type="checkbox" id="20%" value="20" class="noChecked pointer-events-none bottom-0 right-0 opacity-0 absolute checked:bg-black">
                <label for="20%" class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">20%</label>
            </div>
            <div class="checkbox relative">
                <input name="discount" type="checkbox" id="30%" value="30" class="noChecked pointer-events-none bottom-0 right-0 opacity-0 absolute checked:bg-black">
                <label for="30%" class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">30%</label>
            </div>
            <div class="checkbox relative">
                <input name="discount" type="checkbox" id="40%" value="40" class="noChecked pointer-events-none bottom-0 right-0 opacity-0 absolute checked:bg-black">
                <label for="40%" class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">40%</label>
            </div>
            <div class="checkbox relative">
                <input name="discount" type="checkbox" id="50%" value="50" class="noChecked pointer-events-none bottom-0 right-0 opacity-0 absolute checked:bg-black">
                <label for="50%" class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">50%</label>
            </div>
        </div>
    </details>
    <details class="w-11/12 cursor-pointer py-6 border-b-2 border-gray-300 m-auto">
        <summary class="flex justify-between items-center h-full">
            <span class="font-bold">PRECIO</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 stroke-gray-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
        </summary>
        <div class="w-full grid grid-cols-1">
            <div class="flex w-11/12 m-auto justify-between items-center">
                <span id="min-price"></span>
                <span id="max-price"></span>
            </div>
            <div class="w-11/12 m-auto">
                <div id="slider" class="mt-2"></div>
            </div>
        </div>
    </details>
    <button id="filterBtn" value="{{$gender}}" class="w-11/12 m-auto mt-10 p-1 flex justify-center items-center bg-black text-white text-lg font-semibold rounded-full">
        VER PRODUCTOS
    </button>
</div>
<div class="w-full flex justify-center">
    <div id="clothesContainer" class="w-11/12 grid grid-cols-auto-fit-minmax gap-4">
        @foreach($clothes as $clothe)
        @if($clothe->images->first()?->url)
        <div class="group relative w-full mb-10">
            <button onclick="addToWishlist({{$clothe->id}}, this)" class="likeBtn w-[30px] h-[30px] bg-white/40 shadow-sm shadow-[#676767] rounded-full absolute right-2 top-2 backdrop-blur-md group-hover:opacity-90 opacity-0 duration-500 ease-in-out flex justify-center items-center">
                @if($clothe->isLiked)
                <svg xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[20px] h-[20px]">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                </svg>
                @else
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[20px] h-[20px]">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                </svg>
                @endif
            </button>
            <a href="{{route('images.see', ['id' => $clothe->id])}}">
                <img src="{{$clothe->images->first()?->url}}" class="w-full 2xl:h-[350px] cursor-pointer hover:border-2 hover:border-gray-400 object-cover" alt>
            </a>
            <div class="w-full flex flex-wrap">
                <div class="w-full flex justify-between items-center">
                    <span class="text-xs font-semibold uppercase">{{$clothe->name}}</span>
                    @if($clothe->discount == 0)
                    <span class="text-sm font-bold">{{$clothe->price}}€</span>
                </div>
                @else
                <div>
                    <span class="line-through text-xs">{{$clothe->price}}€</span>
                    <span class="text-red-500 font-bold text-sm tracking-wider">{{round($clothe->price - ($clothe->price * $clothe->discount_rate/100),2)}}€</span>
                </div>
            </div>

            @endif
        </div>
    </div>
    @endif
    @endforeach
</div>
</div>
@endsection