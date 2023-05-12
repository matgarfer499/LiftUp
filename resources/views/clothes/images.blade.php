@extends('layouts.plantilla')

@section('title', '' .$images[0]->name)

@section('content')
<div class="w-full flex flex-wrap">
    <div class="w-6/12">
        <div class="w-2/5 absolute h-[90vh] top-20 snap-y snap-mandatory overflow-scroll scrollbar-x-hidden">
            @for($i = 0; $i< count($images[0]->images); $i++)
            <div class="imgContainer snap-start flex w-[96%] h-[90vh]">
                <img src="{{$images[0]->images[$i]->url}}" class="object-cover">
            </div>
            @endfor
        </div>
        <div class="cursor-pointer w-12/12 flex flex-wrap justify-start flex-col items-end m-auto">
            @for($i = 0; $i< count($images[0]->images); $i++)
            <button class="imgSelector w-2/12" data-index="{{$i}}">
                <img src="{{$images[0]->images[$i]->url}}" class="w-6/12 my-1 hover:border-2 hover:border-black">
            </button>
                @endfor
        </div>
    </div>
    <div class="w-5/12">
        <div class="w-full flex justify-between items-center">
            <span class="text-3xl font-semibold uppercase">{{$images[0]->name}}</span>
            @if($images[0]->discount == 1)
            <span class="text-red-600 text-xl float-right mt-[12px]">-{{$images[0]->discount_rate}}% | {{round($images[0]->price - ($images[0]->price * $images[0]->discount_rate/100),2)}} EUR</span>
            @else
            <span class="text-xl font-semibold float-right leading-10 mt-[5px]">{{$images[0]->price}} EUR</span>
            @endif
        </div>
        <br>
        <p class="text-[#4B4949] w-full text-justify">{{$images[0]->description}}</p>
        <details class="w-full border-y-2 border-x-0 border-[#acaaaa] my-4 py-2">
            <summary class="flex justify-between" id="materialsDisplay">
                <span class="p-1 font-bold text-xl">
                    COMPOSIÓN Y MATERIALES
                </span> 
                <span class="font-bold text-2xl" id="moreLess">+</span>
            </summary>
            <p class="text-[#4B4949] text-justify w-11/12 p-2">{{$images[0]->material}}</p>
        </details>
        <div class="w-full flex flex-wrap justify-evenly mt-4">
            @for($i = 0; $i < count($colores[0]->clothingColor); $i++)
                <div class="w-[25px] h-[25px] mr-2 cursor-pointer border-2 border-[#acaaaa] hover:border-4 focus:border-2 active:border-white" style="background-color:#{{$colores[0]->clothingColor[$i]->color}}">
                </div>
            @endfor
        </div>
        <div class="w-full border-y-2 border-x-0 border-black flex flex-col justify-center mt-4">
            @for($i = 0; $i < count($tallas[0]->clothingSize); $i++)
                <div class="h-[35px] w-full cursor-pointer hover:bg-[#e0e0e0] text-sm flex items-center justify-between">
                    <span>{{$tallas[0]->clothingSize[$i]->size}}</span>
                    <span class="text-[#4B4949]">
                        @if($tallas[0]->clothingSize[$i]->pivot->stock < 10)
                            Quedan pocas unidades
                        @endif
                    </span>
                </div>
                @endfor
        </div>
        <div class="w-full flex justify-between">
            <span class="font-normal text-sm">ENCUENTRA TU TALLA</span>
            <span class="font-normal hover:underline text-sm">GUIA DE TALLAS</span>
        </div>
        <div class="w-full flex justify-between mt-10">
            <div class="w-9/12 rounded-xl bg-black flex justify-center items-center p-4 tracking-widest">
                <span>
                    <svg class="w-[15px] h-[15px] mr-2" viewBox="0 0 24 24" fill="" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.0004 9V6C16.0004 3.79086 14.2095 2 12.0004 2C9.79123 2 8.00037 3.79086 8.00037 6V9M3.59237 10.352L2.99237 16.752C2.82178 18.5717 2.73648 19.4815 3.03842 20.1843C3.30367 20.8016 3.76849 21.3121 4.35839 21.6338C5.0299 22 5.94374 22 7.77142 22H16.2293C18.057 22 18.9708 22 19.6423 21.6338C20.2322 21.3121 20.6971 20.8016 20.9623 20.1843C21.2643 19.4815 21.179 18.5717 21.0084 16.752L20.4084 10.352C20.2643 8.81535 20.1923 8.04704 19.8467 7.46616C19.5424 6.95458 19.0927 6.54511 18.555 6.28984C17.9444 6 17.1727 6 15.6293 6L8.37142 6C6.82806 6 6.05638 6 5.44579 6.28984C4.90803 6.54511 4.45838 6.95458 4.15403 7.46616C3.80846 8.04704 3.73643 8.81534 3.59237 10.352Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
                <span class="text-sm text-white font-medium">AÑADIR A LA BOLSA</span>
            </div>
            <div class="w-2/12 rounded-xl bg-white border-2 border-black flex justify-center items-center tracking-widest">
                    <svg class="w-[30px] h-[30px]" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.78125 4C4.53699 4 2 6.81981 2 10.1559C2 11.8911 2.27768 13.32 3.31283 14.8234C4.3005 16.258 5.9429 17.7056 8.49134 19.6155L12 22L15.5084 19.6158C18.057 17.7058 19.6995 16.258 20.6872 14.8234C21.7223 13.32 22 11.8911 22 10.1559C22 6.81982 19.463 4 16.2188 4C14.5909 4 13.1818 4.66321 12 5.86323C10.8182 4.66321 9.40906 4 7.78125 4ZM7.78125 6C5.77551 6 4 7.7855 4 10.1559C4 10.7049 4.03107 11.1875 4.10853 11.6325C4.23826 12.378 4.49814 13.0182 4.96014 13.6893C5.74532 14.8297 7.14861 16.11 9.69156 18.0157L12 19.7494L14.3084 18.0157C16.8514 16.11 18.2547 14.8297 19.0399 13.6893C19.7777 12.6176 20 11.6245 20 10.1559C20 7.7855 18.2245 6 16.2188 6C14.9831 6 13.8501 6.58627 12.8033 7.99831C12.6147 8.25274 12.3167 8.40277 12 8.40277C11.6833 8.40277 11.3853 8.25274 11.1967 7.99831C10.1499 6.58627 9.01689 6 7.78125 6Z" fill="#0F1729" />
                    </svg>
            </div>
        </div>
        <div class="w-full">
            <span>ENVIO, CAMBIOS Y DEVOLUCIONES</span>
        </div>
    </div>
</div>
<div class="flex justify-start items-center mt-40 w-full">
    <span class="text-4xl font-bold ml-24">REVIEWS</span>
</div>
<div class="flex flex-col items-center justify-center w-full">
    @for($i = 0; $i < count($reviews); $i++) <div class="w-11/12 flex flex-col bg-gray-200 rounded-lg mb-8">
        <div class="w-full flex justify-between p-4 mb-2">
            <span class="text-xl font-bold">{{$reviews[$i]->userReview[0]->first_name}}</span>
            <span class="text-xl font-bold flex flex-wrap">
                @for($j = 0; $j < 5; $j++) 
                    @if($j < $reviews[$i]->score)
                        <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                        </svg>

                    @endif
                    @endfor
                </>
        </div>
        <div class="w-full flex justify-start p-4">
            <span class="text-gray-800 font-semibold">"{{$reviews[$i]->comment}}"</span>
        </div>
</div>
@endfor
</div>
@endsection