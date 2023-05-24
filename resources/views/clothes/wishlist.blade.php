@extends('layouts.plantilla')

@section('title', 'wishlist')

@section('scripts')
@parent
@vite('resources/js/displayMobile.js')
<script src="{{asset('js/wishlist.js')}}"></script>
@endsection

@section('content')
<div class="w-screen flex justify-center">
    <div class="w-11/12 flex flex-wrap justify-between">
        <div class="w-full font-bold text-lg ml-2">TUS FAVORITOS <span class="font-normal text-xs text-[#9f9fa0]">{{$liked[0]->wishlist->count()}} productos</span></div>
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
    <div id="clothesContainer" class="w-11/12 grid grid-cols-auto-fit-minmax gap-4">
        @foreach($liked[0]->wishlist as $wish)
        @if($wish->images->first()?->url)
        <div class="clothesDiv group relative w-full mb-10">
            <button onclick="addToWishlist({{$wish->id}}, this)" class="likeBtn w-[30px] h-[30px] bg-white/40 shadow-sm shadow-[#676767] rounded-full absolute right-2 top-2 backdrop-blur-md group-hover:opacity-90 opacity-0 duration-500 ease-in-out flex justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[20px] h-[20px]">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                </svg>
            </button>
            <a href="{{route('images.see', ['id' => $wish->id])}}">
                <img src="{{$wish->images->first()?->url}}" class="clothesImg w-full 2xl:h-[350px] cursor-pointer hover:border-2 hover:border-gray-400 object-cover" alt>
            </a>
            <div class="w-full flex flex-wrap">
                <div class="w-full flex justify-between items-center">
                    <span class="text-xs font-semibold uppercase">{{$wish->name}}</span>
                    @if($wish->discount == 0)
                    <span class="text-sm font-bold">{{$wish->price}}€</span>
                </div>
                @else
                <div>
                    <span class="line-through text-xs">{{$wish->price}}€</span>
                    <span class="text-red-500 font-bold text-sm tracking-wider">{{round($wish->price - ($wish->price * $wish->discount_rate/100),2)}}€</span>
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