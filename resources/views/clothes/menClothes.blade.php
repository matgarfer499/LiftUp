@extends('layouts.plantilla')

@section('title', 'Moda hombre')

@section('content')
<div class="w-full flex justify-center">
    <div class="w-11/12 flex flex-wrap justify-between">
        <div class="w-full font-normal text-sm text-[#9f9fa0] ml-2">Hombre</div>
        <div class="w-full font-bold text-lg ml-2">TODOS LOS PRODUCTOS <span class="font-normal text-xs text-[#9f9fa0]">{{$amount}} productos</span></div>
    </div>
</div>
<div class="w-full flex justify-center">
    <div class="w-11/12 flex flex-wrap sm:justify-end justify-between m-auto mb-4">
        <div class="w-20 h-8 absolute bg-white border-2 border-gray-300 rounded-full opacity-40 mt-1 ml-1 sm:hidden" id="layout">
        </div>
        <button class="w-40 h-10 border-2 border-gray-300 bg-gray-100 rounded-full flex justify-around items-center sm:hidden" id="displayBtn">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path d="M384 80c8.8 0 16 7.2 16 16V416c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V96c0-8.8 7.2-16 16-16H384zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
            </svg>
        </button>
        <div class="w-40 h-10 border-2 border-gray-300 bg-gray-100 rounded-full flex justify-evenly items-center mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
            </svg>
            <span class="font-semibold text-xs">
                FILTRAR Y ORDENAR
            </span>
        </div>
    </div>
</div>
<div class="w-full flex justify-center">
    <div class="w-11/12 flex flex-wrap justify-between">
        @foreach($menClothes as $man)
        @if($man->images->first()?->url)
        <div class="clothesDiv 2xl:w-2/12 xl:w-[250px] lg:w-[300px] sm:w-[300px] w-full mx-2 mb-10">
            <a href="{{route('images.see', ['id' => $man->id])}}">
                <img src="{{$man->images->first()?->url}}" class="clothesImg w-full 2xl:h-[400px] cursor-pointer hover:border-4 hover:border-gray-400" alt>
            </a>
            <div class="w-full flex flex-wrap">
                <div class="w-full flex justify-between items-center">
                    <span class="text-sm">{{$man->name}}</span>
                    @if($man->discount == 0)
                    <span class="text-xs">{{$man->price}} EUR</span>
                </div>
                @else
                <span class="line-through text-xs">{{$man->price}} EUR</span>
            </div>
            <div class="w-full flex justify-end">
                <span class="bg-black text-white text-xs tracking-wider">-{{$man->discount_rate}}% {{round($man->price - ($man->price * $man->discount_rate/100),2)}} EUR</span>
            </div>

            @endif
        </div>
    </div>
    @endif
    @endforeach
</div>
</div>
@endsection