@extends('layouts.plantilla')

@section('title', '' .$images[0]->name)


@section('scripts')
@parent
@vite('resources/js/images.js')
<script src="{{asset('js/wishlist.js')}}"></script>
@endsection

@section('content')
<div class="w-full flex flex-wrap">
    <div class="sm:w-6/12 w-full flex justify-between">
        <div class="sm:w-2/5 w-full block sm:absolute sm:h-[90vh] h-96 top-20 snap-y snap-mandatory overflow-scroll scrollbar-x-hidden border-b-2 border-black sm:border-0">
            @for($i = 0; $i< count($images[0]->images); $i++)
                <div class="imgContainer snap-start flex sm:w-[96%] w-full sm:h-[90vh] h-full">
                    <img src="{{$images[0]->images[$i]->url}}" class="w-full sm:object-cover object-contain">
                </div>
                @endfor
        </div>
        <div class="cursor-pointer hidden ml-2 sm:ml-0 h-full sm:flex sm:justify-start sm:flex-col sm:items-end flex-col flex-wrap w-full">
            @for($i = 0; $i< count($images[0]->images); $i++)
                <button class="imgSelector w-2/12" data-index="{{$i}}">
                    <img src="{{$images[0]->images[$i]->url}}" class="w-[70px] lg:w-[80px] md:w-[60px] sm:w-[45px] my-1 hover:border-2 hover:border-black">
                </button>
            @endfor
        </div>
    </div>
    <div class="w-full sm:w-5/12 h-screen">
        <div class="w-11/12 m-auto sm:w-full flex sm:flex-row gap-2 justify-between sm:items-center">
            <span class="text-2xl sm:text-3xl font-semibold uppercase flex flex-col">{{$images[0]->name}} <span class="text-[10px] sm:text-xs text-gray-400">{{$images[0]->type_product}}</span></span>
            @if($images[0]->discount == 1)
            <span class="text-red-600 text-2xl float-right mt-[12px]">-{{$images[0]->discount_rate}}% | {{round($images[0]->price - ($images[0]->price * $images[0]->discount_rate/100),2)}}€</span>
            @else
            <span class="text-2xl font-semibold float-right leading-10 mt-[5px]">{{$images[0]->price}}€</span>
            @endif
        </div>
        <br>
        <p class="text-[#4B4949] sm:w-full w-11/12 m-auto text-justify">{{$images[0]->description}}</p>
        <details class="w-11/12 m-auto sm:w-full border-y-2 border-x-0 border-[#acaaaa] my-4 py-2">
            <summary class="flex justify-between" id="materialsDisplay">
                <span class="p-1 font-bold text-xl">
                    COMPOSIÓN Y MATERIALES
                </span>
                <span class="font-bold flex justify-center items-center" id="moreLess">
                    <svg id="more" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                    <svg id="less" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg w-6 h-6 hidden">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                    </svg>

                </span>
            </summary>
            <p class="text-[#4B4949] text-justify w-11/12 p-2">{{$images[0]->material}}</p>
        </details>
        <div class="w-11/12 m-auto sm:w-full flex flex-wrap justify-evenly mt-4">
            @for($i = 0; $i < count($colores[0]->clothingColor); $i++)
                <div class="w-[25px] h-[25px] mr-2 cursor-pointer border-2 border-[#acaaaa] hover:border-4 focus:border-2 active:border-white" style="background-color:#{{$colores[0]->clothingColor[$i]->color}}">
                </div>
                @endfor
        </div>
        <div class="w-11/12 m-auto sm:w-full border-y-2 border-x-0 border-black flex flex-col justify-center mt-4">
            @for($i = 0; $i < count($tallas[0]->clothingSize); $i++)
                <div class="h-[35px] w-full cursor-pointer hover:bg-[#e0e0e0] text-sm flex items-center justify-between">
                    <span>{{$tallas[0]->clothingSize[$i]->size}}</span>
                    <span class="text-[#4B4949]">
                        @if($tallas[0]->clothingSize[$i]->pivot->stock < 10) Quedan pocas unidades @endif </span>
                </div>
                @endfor
        </div>
        <div class="w-11/12 m-auto sm:w-full flex justify-between">
            <span class="font-normal text-sm">ENCUENTRA TU TALLA</span>
            <span class="font-normal hover:underline text-sm">GUIA DE TALLAS</span>
        </div>
        <div class="w-11/12 m-auto sm:w-full flex justify-between mt-10">
            <div class="w-9/12 rounded-xl bg-black flex justify-center items-center p-4 tracking-widest">
                <span>
                    <svg class="w-[15px] h-[15px] mr-2" viewBox="0 0 24 24" fill="" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.0004 9V6C16.0004 3.79086 14.2095 2 12.0004 2C9.79123 2 8.00037 3.79086 8.00037 6V9M3.59237 10.352L2.99237 16.752C2.82178 18.5717 2.73648 19.4815 3.03842 20.1843C3.30367 20.8016 3.76849 21.3121 4.35839 21.6338C5.0299 22 5.94374 22 7.77142 22H16.2293C18.057 22 18.9708 22 19.6423 21.6338C20.2322 21.3121 20.6971 20.8016 20.9623 20.1843C21.2643 19.4815 21.179 18.5717 21.0084 16.752L20.4084 10.352C20.2643 8.81535 20.1923 8.04704 19.8467 7.46616C19.5424 6.95458 19.0927 6.54511 18.555 6.28984C17.9444 6 17.1727 6 15.6293 6L8.37142 6C6.82806 6 6.05638 6 5.44579 6.28984C4.90803 6.54511 4.45838 6.95458 4.15403 7.46616C3.80846 8.04704 3.73643 8.81534 3.59237 10.352Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
                <button value="{{$images[0]->id}}" class="addToBag text-sm text-white font-medium">AÑADIR A LA BOLSA</button>
            </div>
            <button onclick="addToWishlist({{$images[0]->id}}, this)" class="w-2/12 rounded-xl bg-white border-2 border-black flex justify-center items-center tracking-widest">
                @if($images[0]->isLiked)
                    <svg xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[30px] h-[30px]">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                    </svg>
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[30px] h-[30px]">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                    </svg>
                @endif
            </button>
        </div>
        <div class="w-11/12 m-auto sm:w-full">
            <span>ENVIO, CAMBIOS Y DEVOLUCIONES</span>
        </div>
    </div>
    @if($totalReviews > 0)
<div>
    <div class="flex justify-start items-center mb-2 m-auto w-11/12">
        <span class="text-3xl font-bold">REVIEWS ({{$totalReviews}})</span>
    </div>
    <div class="w-11/12 m-auto flex justify-between items-center mb-2">
        <div class="text-[#4B4949] font-semibold text-lg">{{round($puntuation/$totalReviews, 1)}}/5</div>
        <span class="flex flex-row">
            @for($j = 0; $j < 5; $j++) 
                @if($j < round($puntuation/$totalReviews, 0))
                    <svg xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                    </svg>
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#D0CBA8" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                    </svg>
                @endif
            @endfor
        </span>
    </div>
    <div class="w-11/12 m-auto text-[#4B4949] flex flex-col mb-10">
        @for($i = 5; $i>0; $i--)
        <div class="w-full flex justify-between items-center">
            <span class="text-md font-medium mr-4">{{$i}}</span>
            <div class="w-full relative">
                <div class="w-full h-1 bg-[#C2C2C2] rounded-lg"></div>
                <div class="h-[6px] bg-black rounded-lg top-0 left-0 absolute" style="width: calc(100%*{{count($stars[$i])/$totalReviews}});"></div>
            </div>
        </div>
        @endfor
    </div>
    <div class="flex flex-col items-center justify-center w-full">
        @for($i = 0; $i < count($reviews); $i++) 
        <div class="w-11/12 mb-4 flex border-t-4 border-black h-40">
            <div class="w-2/12 h-[120px] flex items-center">
                <img src="{{$reviews[$i]->userReview[0]->profile_picture}}" class="w-[70px] h-[70px] sm:w-[100px] sm:h-[100px] rounded-full m-auto object-cover" alt="">
            </div>
            <div class="w-10/12 flex flex-wrap">
                <div class="w-full flex justify-around sm:justify-between items-center">
                    <div class="text-xl font-bold flex flex-col">
                        <span class="text-xs sm:text-base">{{$reviews[$i]->userReview[0]->first_name}}</span>
                        <span class="flex flex-row">
                        @for($j = 0; $j < 5; $j++) @if($j < $reviews[$i]->score)
                        <svg xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 sm:w-6 sm:h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                        </svg>
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#D0CBA8" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 sm:w-6 sm:h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                        </svg>

                        @endif
                        @endfor
                        </span>
                    </div>
                    <span class="text-xs sm:text-base">Valorado el {{$reviews[$i]->date}}</span>
                </div>
                <div class="w-11/12 m-auto sm:w-full">
                    <span class="text-gray-800 font-semibold text-justify text-xs sm:text-base">"{{$reviews[$i]->comment}}"</span>
                </div>
            </div>  
        </div>
    @endfor
</div>
</div>
@endif
</div>
@endsection