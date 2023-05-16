@extends('layouts.plantilla')

@section('title', 'wishlist')

@section('content')
<div class="w-screen flex justify-center">
    <div class="w-11/12 flex flex-wrap justify-between">
        <div class="w-full font-bold text-lg ml-2">TUS FAVORITOS <span class="font-normal text-xs text-[#9f9fa0]">{{$liked[0]->wishlist->count()}} productos</span></div>
    </div>
</div>
<div class="w-full flex justify-center">
    <div class="w-11/12 flex flex-wrap justify-between">
    @foreach($liked[0]->wishlist as $wish)
        @if($wish->images->first()?->url)
            <div class="clothesDiv group relative 2xl:w-2/12 xl:w-[250px] lg:w-[300px] sm:w-[300px] w-full mx-2 mb-10">
                <button id="{{$wish->id}}" class="w-[30px] h-[30px] bg-white/40 shadow-sm shadow-[#676767] rounded-full absolute right-2 top-2 backdrop-blur-md group-hover:opacity-90 opacity-0 duration-500 ease-in-out flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[20px] h-[20px]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                    </svg>
                </button>
                <a href="{{route('images.see', ['id' => $wish->id])}}">
                    <img src="{{$wish->images->first()?->url}}" class="clothesImg w-full 2xl:h-[350px] cursor-pointer hover:border-2 hover:border-gray-400 object-cover" alt>
                </a>
                <div class="w-full flex flex-wrap">
                    <div class="w-full flex justify-between items-center">
                        <span class="text-sm">{{$wish->name}}</span>
                        @if($wish->discount == 0)
                        <span class="text-xs">{{$wish->price}} EUR</span>
                    </div>
                        @else
                        <span class="line-through text-xs">{{$wish->price}} EUR</span>
                </div>
                <div class="w-full flex justify-end">
                    <span class="bg-black text-white text-xs tracking-wider">-{{$wish->discount_rate}}% {{round($wish->price - ($wish->price * $wish->discount_rate/100),2)}} EUR</span>
                </div>
                    @endif
            </div>
        </div>
    @endif
    @endforeach
</div>
</div>
@endsection