<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Importamos tailwind y js-->
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.11.1/dist/cdn.min.js"></script>
  <script>
    let isAuthenticated = {{ auth()->check() ? 'true' : 'false' }};
  </script>
  <title>@yield('title')</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  @yield('scripts')
  @vite('resources/css/app.css')
  @vite('resources/css/homePage.css')
  @vite('resources/js/clothesSearchBar.js')
  @vite('resources/js/bagSlider.js')
</head>

<body class="bg-white m-0">
  <header class="">
    <nav class="fixed z-10 w-full flex flex-wrap justify-between items-center bg-white border-b-[1px] border-b-gray-400">
      <div class="sm:hidden flex justify-evenly w-3/12">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
        </svg>
      </div>
      @if(auth()->user()?->admin)
      <a href="{{route('admin.all')}}" class="w-3/12 h-24 flex justify-center items-center">
        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" class="w-40" viewBox="0 0 1200.000000 900.000000" preserveAspectRatio="xMidYMid meet">
          <g transform="translate(0.000000,900.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
            <path d="M5795 6690 c-289 -33 -548 -120 -755 -255 -105 -68 -282 -249 -347
            -355 -29 -47 -55 -92 -58 -101 -4 -9 10 -33 35 -62 l41 -47 67 54 c175 139
            362 228 568 271 96 20 280 29 319 16 l30 -9 -30 -1 c-46 -1 -221 -46 -310 -79
            -490 -183 -910 -577 -1119 -1049 -79 -179 -127 -357 -151 -562 -15 -129 -19
            -352 -7 -384 4 -9 35 -30 69 -47 l62 -29 6 37 c42 253 99 417 201 574 57 88
            167 205 249 263 109 77 284 153 415 180 l35 7 -40 -33 c-232 -190 -411 -549
            -486 -974 -35 -205 -36 -523 -2 -697 6 -28 22 -36 111 -54 l32 -7 0 76 c0 92
            24 269 49 370 66 255 194 443 385 561 42 27 79 46 81 44 3 -3 -6 -36 -19 -74
            -94 -269 -84 -591 29 -931 36 -111 154 -361 180 -383 11 -9 18 -4 38 27 77
            121 271 223 473 249 l57 7 -8 -79 c-20 -221 -138 -406 -315 -494 -25 -12 -46
            -24 -48 -25 -2 -1 9 -28 25 -59 l27 -56 51 0 c84 0 232 29 316 61 147 57 244
            138 308 259 18 33 36 60 40 60 17 0 110 -109 137 -161 23 -44 28 -67 29 -124
            0 -82 -23 -137 -85 -208 -22 -25 -40 -48 -40 -52 0 -3 19 -30 43 -60 48 -62
            35 -61 222 -18 229 53 490 164 675 288 210 141 344 298 425 500 14 37 25 68
            23 70 -2 1 -21 12 -44 23 -65 33 -66 35 -68 209 -1 127 -5 169 -20 216 -11 31
            -23 57 -27 57 -3 0 -9 -14 -13 -32 -7 -34 -66 -161 -90 -193 -14 -19 -16 -17
            -46 48 -87 191 -78 392 26 600 43 85 118 198 176 262 l45 50 16 -71 c9 -39 19
            -97 23 -130 10 -88 16 -93 53 -42 97 132 90 354 -14 446 -55 48 -97 62 -210
            69 -99 6 -171 -4 -256 -36 -90 -34 -90 -34 -73 -121 29 -143 3 -312 -61 -396
            -33 -43 -45 -43 -45 -1 0 52 -29 228 -46 279 -8 25 -22 52 -31 60 -13 11 -22
            6 -58 -34 -84 -93 -167 -263 -201 -413 -26 -113 -24 -322 4 -427 41 -151 102
            -245 196 -298 74 -43 90 -40 119 23 13 28 30 70 37 91 l13 40 18 -23 c51 -62
            68 -254 35 -381 -34 -131 -94 -230 -180 -297 -49 -38 -62 -38 -108 0 l-28 22
            26 50 c50 98 14 184 -128 300 -47 38 -105 93 -128 120 -53 64 -115 191 -136
            280 -18 77 -23 235 -11 331 l8 62 -43 -40 c-105 -98 -182 -118 -343 -93 -194
            30 -320 18 -436 -41 -28 -14 -55 -22 -59 -17 -30 31 -38 255 -15 402 68 418
            315 628 672 572 93 -15 149 -38 218 -90 82 -62 113 -75 185 -75 72 0 115 18
            200 82 28 21 86 57 131 80 56 29 73 42 56 42 -41 0 -108 29 -161 69 -58 44
            -108 71 -131 71 -21 0 -7 27 41 80 82 91 209 115 329 64 125 -54 113 -52 139
            -19 21 26 29 29 77 28 88 -2 179 -55 216 -126 12 -23 17 -27 24 -16 27 44 -8
            190 -66 275 -54 79 -96 101 -238 129 -142 27 -227 57 -354 125 -110 60 -182
            80 -283 80 -129 -1 -230 -36 -308 -108 -54 -50 -54 -64 -2 -46 85 29 252 17
            355 -26 l40 -17 -43 -7 c-76 -12 -192 -81 -192 -114 0 -5 33 -12 73 -16 153
            -14 257 -29 257 -37 0 -5 -6 -9 -13 -9 -7 0 -76 -41 -152 -91 -174 -113 -221
            -137 -300 -154 -122 -25 -201 9 -280 120 -86 120 -112 234 -80 350 56 208 306
            396 525 395 140 -1 325 -75 480 -192 46 -35 91 -69 101 -76 14 -10 30 -11 78
            -2 65 12 155 1 218 -25 18 -8 33 -10 33 -6 0 5 -19 35 -43 67 -49 66 -150 161
            -215 202 -41 26 -44 30 -83 155 -88 279 -221 462 -451 618 -194 132 -396 187
            -718 194 -91 2 -201 0 -245 -5z" />
            <path d="M7182 4974 c-12 -8 -22 -23 -22 -34 0 -39 105 -98 207 -115 85 -14
            213 49 213 104 0 28 -22 27 -57 -3 -71 -59 -119 -62 -189 -11 -43 31 -118 75
            -126 75 -2 0 -14 -7 -26 -16z" />
          </g>
        </svg>
      </a>
      @else
      <svg version="1.0" xmlns="http://www.w3.org/2000/svg" class="w-3/12 h-24 scale-150" viewBox="0 0 1200.000000 900.000000" preserveAspectRatio="xMidYMid meet">
          <g transform="translate(0.000000,900.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
            <path d="M5795 6690 c-289 -33 -548 -120 -755 -255 -105 -68 -282 -249 -347
            -355 -29 -47 -55 -92 -58 -101 -4 -9 10 -33 35 -62 l41 -47 67 54 c175 139
            362 228 568 271 96 20 280 29 319 16 l30 -9 -30 -1 c-46 -1 -221 -46 -310 -79
            -490 -183 -910 -577 -1119 -1049 -79 -179 -127 -357 -151 -562 -15 -129 -19
            -352 -7 -384 4 -9 35 -30 69 -47 l62 -29 6 37 c42 253 99 417 201 574 57 88
            167 205 249 263 109 77 284 153 415 180 l35 7 -40 -33 c-232 -190 -411 -549
            -486 -974 -35 -205 -36 -523 -2 -697 6 -28 22 -36 111 -54 l32 -7 0 76 c0 92
            24 269 49 370 66 255 194 443 385 561 42 27 79 46 81 44 3 -3 -6 -36 -19 -74
            -94 -269 -84 -591 29 -931 36 -111 154 -361 180 -383 11 -9 18 -4 38 27 77
            121 271 223 473 249 l57 7 -8 -79 c-20 -221 -138 -406 -315 -494 -25 -12 -46
            -24 -48 -25 -2 -1 9 -28 25 -59 l27 -56 51 0 c84 0 232 29 316 61 147 57 244
            138 308 259 18 33 36 60 40 60 17 0 110 -109 137 -161 23 -44 28 -67 29 -124
            0 -82 -23 -137 -85 -208 -22 -25 -40 -48 -40 -52 0 -3 19 -30 43 -60 48 -62
            35 -61 222 -18 229 53 490 164 675 288 210 141 344 298 425 500 14 37 25 68
            23 70 -2 1 -21 12 -44 23 -65 33 -66 35 -68 209 -1 127 -5 169 -20 216 -11 31
            -23 57 -27 57 -3 0 -9 -14 -13 -32 -7 -34 -66 -161 -90 -193 -14 -19 -16 -17
            -46 48 -87 191 -78 392 26 600 43 85 118 198 176 262 l45 50 16 -71 c9 -39 19
            -97 23 -130 10 -88 16 -93 53 -42 97 132 90 354 -14 446 -55 48 -97 62 -210
            69 -99 6 -171 -4 -256 -36 -90 -34 -90 -34 -73 -121 29 -143 3 -312 -61 -396
            -33 -43 -45 -43 -45 -1 0 52 -29 228 -46 279 -8 25 -22 52 -31 60 -13 11 -22
            6 -58 -34 -84 -93 -167 -263 -201 -413 -26 -113 -24 -322 4 -427 41 -151 102
            -245 196 -298 74 -43 90 -40 119 23 13 28 30 70 37 91 l13 40 18 -23 c51 -62
            68 -254 35 -381 -34 -131 -94 -230 -180 -297 -49 -38 -62 -38 -108 0 l-28 22
            26 50 c50 98 14 184 -128 300 -47 38 -105 93 -128 120 -53 64 -115 191 -136
            280 -18 77 -23 235 -11 331 l8 62 -43 -40 c-105 -98 -182 -118 -343 -93 -194
            30 -320 18 -436 -41 -28 -14 -55 -22 -59 -17 -30 31 -38 255 -15 402 68 418
            315 628 672 572 93 -15 149 -38 218 -90 82 -62 113 -75 185 -75 72 0 115 18
            200 82 28 21 86 57 131 80 56 29 73 42 56 42 -41 0 -108 29 -161 69 -58 44
            -108 71 -131 71 -21 0 -7 27 41 80 82 91 209 115 329 64 125 -54 113 -52 139
            -19 21 26 29 29 77 28 88 -2 179 -55 216 -126 12 -23 17 -27 24 -16 27 44 -8
            190 -66 275 -54 79 -96 101 -238 129 -142 27 -227 57 -354 125 -110 60 -182
            80 -283 80 -129 -1 -230 -36 -308 -108 -54 -50 -54 -64 -2 -46 85 29 252 17
            355 -26 l40 -17 -43 -7 c-76 -12 -192 -81 -192 -114 0 -5 33 -12 73 -16 153
            -14 257 -29 257 -37 0 -5 -6 -9 -13 -9 -7 0 -76 -41 -152 -91 -174 -113 -221
            -137 -300 -154 -122 -25 -201 9 -280 120 -86 120 -112 234 -80 350 56 208 306
            396 525 395 140 -1 325 -75 480 -192 46 -35 91 -69 101 -76 14 -10 30 -11 78
            -2 65 12 155 1 218 -25 18 -8 33 -10 33 -6 0 5 -19 35 -43 67 -49 66 -150 161
            -215 202 -41 26 -44 30 -83 155 -88 279 -221 462 -451 618 -194 132 -396 187
            -718 194 -91 2 -201 0 -245 -5z" />
            <path d="M7182 4974 c-12 -8 -22 -23 -22 -34 0 -39 105 -98 207 -115 85 -14
            213 49 213 104 0 28 -22 27 -57 -3 -71 -59 -119 -62 -189 -11 -43 31 -118 75
            -126 75 -2 0 -14 -7 -26 -16z" />
          </g>
        </svg>
      @endif
      <div class="w-3/12 sm:flex justify-center hidden">
        <a href="{{route('clothes.index', ['gender' => 'H'])}}" class="font-semibold text-sm mr-4 cursor-pointer hover:text-red-500">HOMBRE</a>
        <a href="{{route('clothes.index', ['gender' => 'M'])}}" class="font-semibold text-sm mr-4 cursor-pointer hover:text-red-500">MUJER</a>
      </div>
      <div class="w-3/12 flex justify-center">
        <div class="w-6/12 flex flex-wrap justify-evenly">
          <svg id="searchBar" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="cursor-pointer hover:stroke-red-500 lg:w-[25px] lg:h-[25px] w-5 h-5 sm:block hidden">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
          </svg>
        <a href="{{auth()->user()? route('wishlist.index', ['idUse' => auth()->user()?->id]) : route('login')}}" class="hover:fill-red-700">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="lg:w-[25px] lg:h-[25px] w-5 h-5 hover:stroke-red-700">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
            </svg>
          </a>
          <a href="{{ route('profile.edit') }}" class="sm:flex hidden">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="lg:w-[25px] lg:h-[25px] w-5 h-5 hover:stroke-red-700">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
          </a>
          @if(auth()->user())
          <button id="bag">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:stroke-red-700">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
            </svg>
          </button>
          @else
          <a href="{{route('login')}}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:stroke-red-700">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
            </svg>
          </a>
          @endif
        </div>
      </div>
    </nav>
  </header>
  <div>
    <main class="pt-28">
      <div id="backgroundBlur" class="w-screen h-screen bg-black/90 backdrop-blur-sm fixed top-0 z-40 hidden"></div>
      <div id="bagDiv" class="fixed z-50 h-screen max-h-screen w-1/4 bg-white top-0 -right-2/4 overflow-auto scrollbar-x-hidden">
        <div class="w-11/12 flex flex-row-reverse justify-between items-center h-[50px] m-auto">
          <div class="w-3/4 flex justify-end">
            <svg id="closeBagBtn" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </div>
          <span class="font-semibold text-lg w-full flex justify-end">TU BOLSA</span>
        </div>
        @if(isset($purchases))
        <div class="w-11/12 mt-4 mx-auto bg-gray-100 p-2">
          <h1 class="w-full text-center font-semibold text-xl my-3">TOTAL</h1>
          <div class="w-11/12 mx-auto bg-gray-200 h-[2px]"></div>
          <div class="w-11/12 m-auto flex justify-between my-4">
            <span class="text-gray-700 font-light">{{count($purchases[0]->purchase)}} productos</span>
            <span class="text-gray-700 font-light">{{round($total, 2)}}</span>
          </div>
          <div class="w-11/12 m-auto flex justify-between my-4">
            <span class="font-semibold">SUBTOTAL</span>
            <span class="font-semibold">{{round($total, 2)}}</span>
          </div>
        </div>
          
          @foreach($purchases as $purchase)
          @foreach($purchase->purchase as $bag)
          @if($bag->images->first()?->url)
          <div class="clothesBag w-11/12 m-auto flex justify-start gap-2 my-4">
            <img src="{{$bag->images->first()?->url}}" class="w-32 h-40 object-cover" alt="">
            <div class="flex flex-col w-full gap-1">
              <span class="text-lg text-gray-700">{{$bag->name}}</span>
              <span class="text-sm text-gray-500">{{$bag->type_product}}</span>
              <span class="text-lg font-bold mr-2">{{$bag->price}}€</span>
              <div class="h-full flex items-end w-full justify-end">
                <div class="w-[40px] h-[40px] rounded-full bg-gray-100 flex justify-center items-center">
                  <button class="deleteFromBag" value="{{$bag->id}}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer hover:animate-pulse">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
          </div>
          @endif
          @endforeach
          @endforeach
        @endif
      </div>
      @yield('content')
    </main>
  </div>
</body>

</html>