@extends('layouts.plantilla')

@section('title', 'Moda hombre')

@section('content')
    <div class="w-full flex flex-wrap justify-center"> 
            @foreach($menClothes as $man)
            @if($man->images->first()?->url)
                <div class="w-[360px] mx-2 mb-10">
                    <a href="{{route('images.see', ['id' => $man->id])}}">
                        <img src="{{$man->images->first()?->url}}" class="w-full h-[500px] cursor-pointer hover:border-4 hover:border-gray-400" alt>
                    </a>
                    <div class="w-full">
                        <span class="text-sm">{{$man->name}}</span>
                        @if($man->discount == 0)
                            <span class="float-right text-xs">{{$man->price}} EUR</span>
                        @else
                        <span class="line-through float-right text-xs">{{$man->price}} EUR</span></br>
                    </div>
                    <div class="w-full flex justify-end">
                    <span class="bg-black text-white text-xs tracking-wider">-{{$man->discount_rate}}% {{round($man->price - ($man->price * $man->discount_rate/100),2)}} EUR</span>
                        @endif
                    </div>
                </div>
                @endif
            @endforeach
    </div>
@endsection

