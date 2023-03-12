@extends('layouts.plantilla')

@section('title', 'Opciones')

@section('content')
<div class="fixed h-screen w-2/12 border-r-2 border-gray-400 top-0 z-0 flex flex-col flex-wrap justify-end">
    <div class="w-full ml-4 mb-80">
        <span class="w-3/4 text-center font-semibold text-sm">MIS DATOS</span>
        <br>
        <span class="w-3/4 font-medium text-md text-gray-600">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</span>
        <br>
        <span class="w-3/4 font-medium text-md text-gray-600">{{auth()->user()->email}}</span>
    </div>
    <div class="w-full flex items-center justify-center border-t-2 border-gray-400 hover:bg-black hover:stroke-white hover:text-white">
        <div class="w-3/4 h-[60px] flex flex-wrap items-center justify-start">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
            </svg>
            <span class="font-bold text-lg ml-2">Devolver pedido</span>
        </div>
    </div>
    <a href="{{route('profile.edit')}}" class="w-full flex items-center justify-center border-t-2 border-gray-400 hover:bg-black hover:stroke-white hover:text-white">
        <div class="w-3/4 h-[60px] flex flex-wrap items-center justify-start">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span class="font-bold text-xl ml-2">Configuración</span>
        </div>
    </a>
    <form method="POST" action="{{ route('logout') }}" class="w-full flex items-center justify-center border-t-2 border-gray-400 hover:bg-black hover:stroke-white hover:text-white">
        @csrf
        <button type="submit" class="w-3/4 h-[60px] flex flex-wrap items-center justify-start">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
            </svg>
            <span class="font-bold text-2xl ml-2">Logout</span>
        </button>
    </form>
</div>
<div class="w-full flex justify-end">
    <div class="w-9/12">
        <div>
            <h1 class="font-semibold text-start text-3xl">HISTORIAL DE PEDIDOS</h1>
            <p class="mt-4 text-md text-gray-700">No has realizado ningún pedido aún</p>
        </div>

    </div>
</div>
@endsection