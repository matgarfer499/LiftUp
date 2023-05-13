<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Importamos tailwind y js-->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.11.1/dist/cdn.min.js"></script>
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/loginRegister.js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="w-screen h-screen flex">
        <div class="w-1/2 h-screen">
            <img src="https://media.gq-magazine.co.uk/photos/611cde62ca361ca29931f2b8/16:9/pass/18082021_GYM_HP.jpg" class="object-cover h-full w-full" alt="">
        </div>
        <div class="w-1/2 h-screen flex flex-col items-center">
            <a class="h-1/4 w-full flex justify-center items-center" href="/">
                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="w-full" height="h-1/2" viewBox="0 0 1200.000000 900.000000" preserveAspectRatio="xMidYMid meet">
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
            <div class="w-7/12 flex justify-between">
                <button class="w-1/2 font-bold text-md" id="loginBtn">
                    INICIAR SESIÓN
                </button>
                <button class="w-1/2 font-bold opacity-30 text-md" id="registerBtn">
                    REGISTRARSE
                </button>
            </div>
            <div class="w-7/12 h-[2px] my-2 bg-gray-200 rounded-full" id="scrollForm">
                <div class="w-1/2 bg-black rounded-full h-[4px] relative" id="scrollMove"></div>
            </div>
            <div class="w-7/12 mt-4" id="loginForm">
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="grid gap-2">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Correo electrónico')" />
                        <x-text-input id="email" placeholder="Introduce tu correo electrónico" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Contraseña')" />

                        <x-text-input id="password" placeholder="introduce tu contraseña" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Recuerdame</span>
                        </label>
                    </div>

                    <div class="w-full">
                        <button class="w-full my-2 p-2 flex justify-center items-center bg-black text-white text-xl font-semibold rounded-full">
                            {{ __('INICIAR SESIÓN') }}
                        </button>
                    </div>
                    <div class="w-full flex flex-col justify-center items-center">
                        @if (Route::has('password.request'))
                        <a class="hover:underline text-sm" href="{{ route('password.request') }}">
                            Olvide mi contraseña
                        </a>
                        @endif
                        <a href="{{ route('register') }}" class="text-sm hover:underline cursor-pointer">¿No tienes cuenta? Registrate.</a>
                    </div>
                </form>
            </div>
            <div class="w-7/12 mt-4 hidden" id="registerForm">
                <form method="POST" action="{{ route('register') }}" class="grid gap-3">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="first_name" :value="__('Nombre')" />
                        <x-text-input id="first_name" placeholder="Introduce tu nombre" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus />
                        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="last_name" :value="__('Apellido')" />
                        <x-text-input id="last_name" placeholder="Introduce tus apellidos" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus />
                        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Correo electrónico')" />
                        <x-text-input id="email" placeholder="Introduce tu correo electrónico" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Contraseña')" />

                        <x-text-input id="password" placeholder="Introduce tu contraseña" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />

                        <x-text-input id="password_confirmation" placeholder="Vuelve a introducir tu contraseña" class="block mt-1 w-full" type="password" name="password_confirmation" required />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                    <div class="w-full my-6">
                        <button class="w-full p-1 flex justify-center items-center bg-black text-white text-xl font-semibold rounded-full">
                            {{ __('REGISTRARSE') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

</body>

</html>