@extends('layouts.plantilla')

@section('title', '' .$images[0]->name)

@section('content')
<div class="w-full flex flex-wrap">
    <div class="w-8/12">
        <div class="w-4/5 flex items-center justify-center m-auto">
            <img src="{{$images[0]->images[0]->url}}" class="w-full h-[800px]">
        </div>
        <div class="w-4/5 flex flex-wrap justify-center items-center mt-4 m-auto">
            @for($i = 1; $i< count($images[0]->images); $i++)
                <img src="{{$images[0]->images[$i]->url}}" class="w-2/6 border-4 border-white">
                @endfor
        </div>
    </div>
    <div class="w-4/12" relative>
        <div class="w-3/4 flex justify-between">
            <span class="text-4xl font-bold uppercase">{{$images[0]->name}}</span>
            @if($images[0]->discount == 1)
            <span class="text-red-600 text-xl float-right mt-[12px]">-{{$images[0]->discount_rate}}% | {{round($images[0]->price - ($images[0]->price * $images[0]->discount_rate/100),2)}} EUR</span>
            @else
            <span class="text-xl font-semibold float-right leading-10 mt-[5px]">{{$images[0]->price}} EUR</span>
            @endif
        </div>
        <br>
        <span class="text-sm text-gray-500">{{$images[0]->type_product}}, </span>


        @if($images[0]->gender === 'M')
        <span class="text-sm text-gray-500">Mujer</span>
        @else
        <span class="text-sm text-gray-500">Hombre</span>
        @endif
        <h1 class="text-lg mt-4 font-medium">Colores disponibles:</h1>
        <div class="w-3/4 flex flex-wrap justify-start mt-4">

            @for($i = 0; $i < count($colores[0]->clothingColor); $i++)
                <div class="w-[30px] h-[30px] mr-2 cursor-pointer border-2 border-black rounded-full hover:border-4 hover:border-gray-800 focus:border-4 active:border-white" style="background-color:#{{$colores[0]->clothingColor[$i]->color}}">
                </div>
                @endfor
        </div>
        <h1 class="text-lg mt-4 font-medium">Selecciona talla:</h1>
        <div class="w-3/4 flex flex-wrap justify-start mt-4">
            @for($i = 0; $i < count($tallas[0]->clothingSize); $i++)
                <div class="w-[60px] h-[60px] border-2 border-black flex justify-center items-center mr-2 mb-2 cursor-pointer hover:bg-black hover:text-white">
                    {{$tallas[0]->clothingSize[$i]->size}}
                </div>
                @endfor
        </div>

        <div class="w-3/4 rounded-full mt-[100px] bg-black flex justify-center items-center p-4 tracking-widest">
            <span>
                <svg class="w-[15px] h-[15px] mr-2" viewBox="0 0 24 24" fill="" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16.0004 9V6C16.0004 3.79086 14.2095 2 12.0004 2C9.79123 2 8.00037 3.79086 8.00037 6V9M3.59237 10.352L2.99237 16.752C2.82178 18.5717 2.73648 19.4815 3.03842 20.1843C3.30367 20.8016 3.76849 21.3121 4.35839 21.6338C5.0299 22 5.94374 22 7.77142 22H16.2293C18.057 22 18.9708 22 19.6423 21.6338C20.2322 21.3121 20.6971 20.8016 20.9623 20.1843C21.2643 19.4815 21.179 18.5717 21.0084 16.752L20.4084 10.352C20.2643 8.81535 20.1923 8.04704 19.8467 7.46616C19.5424 6.95458 19.0927 6.54511 18.555 6.28984C17.9444 6 17.1727 6 15.6293 6L8.37142 6C6.82806 6 6.05638 6 5.44579 6.28984C4.90803 6.54511 4.45838 6.95458 4.15403 7.46616C3.80846 8.04704 3.73643 8.81534 3.59237 10.352Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>
            <span class="text-sm text-white font-medium">AÑADIR A LA BOLSA</span>
        </div>
        <div class="w-3/4 rounded-full mt-4 bg-gray-200 flex justify-center items-center p-4 tracking-widest">
            <span>
                <svg class="w-[15px] h-[15px] mr-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.78125 4C4.53699 4 2 6.81981 2 10.1559C2 11.8911 2.27768 13.32 3.31283 14.8234C4.3005 16.258 5.9429 17.7056 8.49134 19.6155L12 22L15.5084 19.6158C18.057 17.7058 19.6995 16.258 20.6872 14.8234C21.7223 13.32 22 11.8911 22 10.1559C22 6.81982 19.463 4 16.2188 4C14.5909 4 13.1818 4.66321 12 5.86323C10.8182 4.66321 9.40906 4 7.78125 4ZM7.78125 6C5.77551 6 4 7.7855 4 10.1559C4 10.7049 4.03107 11.1875 4.10853 11.6325C4.23826 12.378 4.49814 13.0182 4.96014 13.6893C5.74532 14.8297 7.14861 16.11 9.69156 18.0157L12 19.7494L14.3084 18.0157C16.8514 16.11 18.2547 14.8297 19.0399 13.6893C19.7777 12.6176 20 11.6245 20 10.1559C20 7.7855 18.2245 6 16.2188 6C14.9831 6 13.8501 6.58627 12.8033 7.99831C12.6147 8.25274 12.3167 8.40277 12 8.40277C11.6833 8.40277 11.3853 8.25274 11.1967 7.99831C10.1499 6.58627 9.01689 6 7.78125 6Z" fill="#0F1729" />
                </svg>
            </span>
            <span class="text-sm font-medium">AÑADIR A LA LISTA DE DESEO</span>
        </div>
        <div class=" w-3/4 flex justify-start mt-10 p-4 rounded-t-lg">
            <span class="w-full font-bold text-2xl uppercase">Descripción</span>
        </div>
        <div class="w-3/4 flex justify-start p-4 rounded-b-lg">
            <span class="w-full text-lg text-gray-800 mt-2 break-words">{{$images[0]->description}}</span>
        </div>
    </div>
</div>
<div class="flex justify-start items-center mt-20 w-full">
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