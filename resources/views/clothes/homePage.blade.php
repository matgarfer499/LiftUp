<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LiftUp</title>
    @vite(['resources/css/style.css'])
    @vite(['resources/js/horizontalScrollbar.js'])
    @vite(['resources/js/anime.js'])
</head>

<body>
    <audio id="sound" autoplay>
        <source src="{{ asset('videos/gorilla.mp3') }}" type="audio/mpeg">
    </audio>
    <div id="sections">
        <nav>
            <div class="navObject">
                <svg id="logo" version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200.000000 900.000000" preserveAspectRatio="xMidYMid meet">
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
            </div>
            <div class="navObject">
                <a href="{{ route('profile.edit') }}">
                    <svg id="login" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </a>
            </div>
        </nav>
        <div class="section home">
            <div id="imagesBox">
                <video class="videos" preload autoplay muted loop>
                    <source src="{{ asset('videos/men.mp4') }}" />
                </video>
                <video class="videos" preload autoplay muted loop>
                    <source src="{{ asset('videos/center.mp4') }}" />
                </video>
                <video class="videos" preload autoplay muted loop>
                    <source src="{{ asset('videos/woman.mp4') }}" />
                </video>
            </div>
            <h1 id="title">FUERZA Y ESTILO</h1>
        </div>
        <div class="section collection">
            <div id="collection">
                <h2>Lo último en hombre</h2>
                <div id="menClothes">
                    <a id="menLink" href="{{route('clothes.index', ['gender' => 'H'])}}">Ver colección <svg id="arrow" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                </div>
                <div id="clothesCollection">
                    @foreach($menClothes as $men) 
                    @if($men->images->first()?->url)
                    <div id="clothesDiv">
                        <a href="{{route('images.see', ['id' => $men->id])}}">
                            <img src="{{$men->images->first()?->url}}"></img>
                        </a>
                        <div class="clothesInfo">
                            <span class="clothesName">{{$men->name}}</span>
                            <span class="clothesPrice">{{$men->price}}€</span>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    <div class="section theBest">
        <div class="photo">
            <img src="https://cdn.shopify.com/s/files/1/0156/6146/files/view_all_adapt_1900x.jpg?v=1675882090"></img>
        </div>
        <div id="photoContainer">
            <canvas id="photoCanvas"></canvas>
        </div>
        <div id="bestInfo">
            <h3>SOLO LO MEJOR</h3>
            <span>SON LO MAS COMPRADO POR UNA RAZON</span>
            <a id="womenLink" href="{{route('clothes.index', ['gender' => 'M'])}}">IR A COMPRAR</a>
        </div>
    </div>
    <div class="section foot">
        <div>
            <h1 id="quoteTitle">NO ES SOLO TU ENTRENAMIENTO</h1>
            <p class="quote">La comunidad LiftUp se dedica a liberar el potencial a través del acondicionamiento y las cosas que hacemos hoy para prepararnos para mañana.
                Cuando se trata de rendir al máximo, no debería haber obstáculos, y menos aún tu ropa de entrenamiento. Por eso, todo lo relacionado con la ropa de
                gimnasio y los accesorios que diseñamos para ti tiene en mente tu progreso y los mejores resultados. Queremos que tengas las sudaderas con capucha
                más cómodas, los leggings más cómodos y sin costuras, y las camisetas de entrenamiento con los diseños más innovadores para que te muevas cuando
                más lo necesitas.
            </p>
            <p class="quote">
                Ropa de entrenamiento, ropa de running y ropa de estar por casa que cambian las reglas del juego. No se trata sólo de los diseños, sino de las personas
                que los llevan.
            </p>
        </div>
        <footer>
            <ul>Conocenos
                <li>Trabajar con nosotros</li>
                <li>Sobre LiftUp</li>
            </ul>
            <ul>Metodos de pago
                <li>Métodos de pago</li>
                <li>Cheque regalo</li>
            </ul>
            <ul>Redes sociales
                <li>Instagram</li>
                <li>Youtube</li>
                <li>Tiktok</li>
            </ul>
            <ul>Ayuda
                <li>FAQ</li>
                <li>Información envio</li>
                <li>Política de devoluciones</li>
                <li>Hacer una devolución</li>
            </ul>
            </footer>
        </div>
    </div>
</body>

</html>