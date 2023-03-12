@extends('layouts.plantilla')

@section('title', 'Moda mujer')

@section('content')
    <div class="w-full flex flex-wrap justify-center"> 
            @foreach($womenClothes as $woman)
            @if($woman->images->first()?->url)
                <div class="w-[360px] mx-2 mb-10">
                <a href="{{route('images.see', ['id' => $woman->id])}}">
                        <img src="{{$woman->images->first()?->url}}" class="w-full h-[500px] cursor-pointer hover:border-4 hover:border-gray-400" alt>
                    </a>
                    <div class="w-full">
                        <span class="text-sm">{{$woman->name}}</span>
                        @if($woman->discount == 0)
                            <span class="float-right text-xs">{{$woman->price}} EUR</span>
                        @else
                        <span class="line-through float-right text-xs">{{$woman->price}} EUR</span></br>
                    </div>
                    <div class="w-full flex justify-end">
                    <span class="bg-black text-white text-xs tracking-wider">-{{$woman->discount_rate}}% {{round($woman->price - ($woman->price * $woman->discount_rate/100),2)}} EUR</span>
                        @endif
                    </div>
                </div>
                @endif
            @endforeach
    </div>
@endsection

