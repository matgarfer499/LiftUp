<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Importamos tailwind y js-->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.11.1/dist/cdn.min.js"></script>
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    @vite('resources/css/admin.css')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite('resources/js/search.js')
</head>

<body class="m-0">
    <div class="fixed h-screen w-2/12 border-r-2 border-white bg-[#F1F3F4]">
        <a href="{{route('clothes.index', ['gender' => 'H'])}}" class="flex flex-wrap justify-start items-center border-b-2 border-[#B4C3C9] bg-[#F1F3F4] pb-4 ">
            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" class="w-3/12 h-18 scale-150" viewBox="0 0 1200.000000 900.000000" preserveAspectRatio="xMidYMid meet">
                <g transform="translate(0.000000,900.000000) scale(0.100000,-0.100000)" fill="black" stroke="none">
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

            <span class="ml-2 text-3xl font-semibold text-[#081226]">LiftUP</span>
        </a>

        <div class="w-full flex flex-wrap justify-center items-center">
            <span class="w-3/4 text-xs text-[#898B96] font-semibold py-4">DATOS DE LA ROPA</span>
            <a href="{{route('admin.all')}}" class="links w-3/4 flex justify-start items-center py-2 rounded-md hover:bg-[#081226] {{ request()->is('admin/datos*') ? 'bg-[#081226]' : '' }}" >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 w-6 h-6 stroke-[#081226] pointer-events-none {{ request()->is('admin/datos*') ? 'stroke-white' : '' }}">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                <span class="font-semibold text-[#081226] pl-2 pointer-events-none {{ request()->is('admin/datos*') ? 'text-white' : '' }}">General</span>
            </a>

            <a href="{{route('admin.images')}}" class="links w-3/4 flex justify-start items-center py-2 rounded-md hover:bg-[#081226] {{ request()->is('admin/imagenes*') ? 'bg-[#081226]' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 w-6 h-6 stroke-[#081226] pointer-events-none {{ request()->is('admin/imagenes*') ? 'stroke-white' : '' }}">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                </svg>

                <span class="font-semibold text-[#081226] pl-2 pointer-events-none {{ request()->is('admin/imagenes*') ? 'text-white' : '' }}">Imagenes</span>
            </a>
            <a href="{{route('admin.sizesColors')}}" class="links w-3/4 flex justify-start items-center py-2 rounded-md hover:bg-[#081226] {{ request()->is('admin/sizesColors*') ? 'bg-[#081226]' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 w-6 h-6 stroke-[#081226] pointer-events-none {{ request()->is('admin/sizesColors*') ? 'stroke-white' : '' }}">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.53 16.122a3 3 0 00-5.78 1.128 2.25 2.25 0 01-2.4 2.245 4.5 4.5 0 008.4-2.245c0-.399-.078-.78-.22-1.128zm0 0a15.998 15.998 0 003.388-1.62m-5.043-.025a15.994 15.994 0 011.622-3.395m3.42 3.42a15.995 15.995 0 004.764-4.648l3.876-5.814a1.151 1.151 0 00-1.597-1.597L14.146 6.32a15.996 15.996 0 00-4.649 4.763m3.42 3.42a6.776 6.776 0 00-3.42-3.42" />
                </svg>

                <span class="font-semibold text-[#081226] pl-2 pointer-events-none {{ request()->is('admin/sizesColors*') ? 'text-white' : '' }}">Talla y colores</span>
            </a>
        </div>
        <div class="w-full flex flex-wrap justify-center items-center">
            <span class="w-3/4 text-xs text-[#898B96] font-semibold py-4">PERFIL</span>
            <a href="{{route('profile.edit')}}" class="links w-3/4 flex justify-start items-center py-2 rounded-md hover:bg-[#081226] hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 w-6 h-6 stroke-[#081226] pointer-events-none">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>

                <span class="font-bold text-[#081226] pl-2 group-hover:text-white text-sm">Configuración</span>
            </a>

            <form method="POST" action="{{route('logout')}}" class="links w-3/4 py-2 rounded-md hover:bg-[#081226] hover:text-white">
                @csrf
                <button type="submit" class="flex justify-start items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 w-6 h-6 stroke-[#081226] pointer-events-none">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                    </svg>
                    <span class="font-bold text-[#081226] pl-2 group-hover:text-white text-sm">Cerrar sesión</span>
                </button>

            </form>
        </div>
    </div>
    <div class="w-full h-screen flex justify-end">
        @yield('content')
    </div>
</body>

</html>