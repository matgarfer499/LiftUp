@extends('layouts.plantilla')

@section('title', $gender)

@section('scripts')
@parent
@vite('resources/js/buttons.js')
@vite('resources/js/slider.js')
@endsection

@section('content')
<div class="w-full flex justify-center">
    <div class="w-11/12 flex flex-wrap justify-between">
        <div class="w-full font-normal text-sm text-[#9f9fa0] ml-2">
            {{$gender}}
        </div>
        <div class="w-full font-bold text-lg ml-2">TODOS LOS PRODUCTOS <span class="font-normal text-xs text-[#9f9fa0]">{{$amount}} productos</span></div>
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
        <button id="filterSortBtn" class="w-40 h-10 border-2 border-gray-300 bg-gray-100 rounded-full flex justify-evenly items-center mr-2 hover:bg-gray-200 hover:border-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
            </svg>
            <span class="font-semibold text-xs">
                FILTRAR Y ORDENAR
            </span>
        </button>
    </div>
</div>
<div id="backgroundBlur" class="w-screen h-screen bg-black/90 backdrop-blur-sm fixed top-0 z-40 hidden">
</div>
<div id="filterSortDiv" class="fixed z-50 h-screen max-h-screen w-1/4 bg-white top-0 -right-2/4 overflow-auto scrollbar-x-hidden">
    <div class="w-11/12 flex justify-between items-center h-[50px] m-auto">
        <div id="closeFiltersBtn" class="w-1/4 flex cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </div>
        <span class="font-semibold text-sm w-2/5 flex justify-center">FILTRAR Y ORDENAR</span>
        <span class="font-medium text-xs text-gray-400 w-1/4 flex justify-center">QUITAR FILTROS</span>
    </div>
    <details class="w-11/12 py-6 border-b-2 border-gray-300 m-auto cursor-pointer">
        <summary class="flex justify-between items-center h-full">
            <span class="font-bold">ORDENAR POR</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 stroke-gray-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
        </summary>
        <div class="py-2">
            <input type="radio" name="lowHigh" value="low" id="low" class="checked:ring-black p-3">
            <label for="low">De menor a mayor</label>
        </div>
        <div class="py-2">
            <input type="radio" name="lowHigh" value="high" class="checked:ring-black p-3">
            <label for="high">De mayor a menor</label>
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
            <div class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">Camisetas</div>
            <div class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">Sudaderas</div>
            <div class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">Pantalones</div>
            <div class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">Shorts</div>
            <div class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">Tanks</div>
            <div class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">Tirantes</div>
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
            <div class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">XS</div>
            <div class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">S</div>
            <div class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">M</div>
            <div class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">L</div>
            <div class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">XL</div>
            <div class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">2XL</div>
        </div>
    </details>
    <details class="w-11/12 cursor-pointer py-6 border-b-2 border-gray-300 m-auto">
        <summary class="flex justify-between items-center h-full">
            <span class="font-bold">COLOR</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 stroke-gray-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
        </summary>
    </details>
    <details class="w-11/12 cursor-pointer py-6 border-b-2 border-gray-300 m-auto">
        <summary class="flex justify-between items-center h-full">
            <span class="font-bold">DESCUENTO</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 stroke-gray-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
        </summary>
        <div class="w-full grid grid-cols-2 gap-1">
            <div class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">10%</div>
            <div class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">20%</div>
            <div class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">40%</div>
            <div class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">50%</div>
            <div class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">75%</div>
        </div>
    </details>
    <details class="w-11/12 cursor-pointer py-6 border-b-2 border-gray-300 m-auto">
        <summary class="flex justify-between items-center h-full">
            <span class="font-bold">PRECIO</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 stroke-gray-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
        </summary>
        <div class="w-full grid grid-cols-2 gap-1">
            <div class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">10€ - 20€</div>
            <div class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">20€ - 30€</div>
            <div class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">30€ - 50€</div>
            <div class="flex justify-center items-center py-2 w-full border-2 border-gray-400 my-1">50€ - 100€</div>
        </div>
    </details>
    <button class="w-11/12 m-auto mt-10 p-1 flex justify-center items-center bg-black text-white text-lg font-semibold rounded-full">
        VER PRODUCTOS
    </button>
</div>
<div class="w-full flex justify-center">
    <div id="clothesContainer" class="w-11/12 grid grid-cols-auto-fit-minmax gap-4">
        @foreach($clothes as $clothe)
        @if($clothe->images->first()?->url)
        <div class="group relative w-full mb-10">
            <button data-clo="{{$clothe->id}}" class="likeBtn w-[30px] h-[30px] bg-white/40 shadow-sm shadow-[#676767] rounded-full absolute right-2 top-2 backdrop-blur-md group-hover:opacity-90 opacity-0 duration-500 ease-in-out flex justify-center items-center">
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