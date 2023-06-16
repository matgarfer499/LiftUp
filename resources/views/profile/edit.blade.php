@extends('layouts.plantilla')

@section('title', 'Perfil')

@section('scripts')
@parent
@endsection

@section('content')
<div class="w-11/12 m-auto mb-4 flex flex-col">
    <h2 class="text-2xl font-semibold text-start">CONFIGURACIÓN DE PERFIL</h2>
    <h4 class="text-lg font-semibold text-gray-500">Bienvenido {{auth()->user()->first_name}} {{auth()->user()->last_name}}</h4>
</div>
<div class="w-11/12 m-auto flex justify-start gap-2 relative">
    <div class="w-2/12 relative p-4 border-2 border-gray-300 rounded-md shadow-sm shadow-gray-500">
        <h4 class="font-semibold text-md text-gray-500 mb-2 text-center">Foto de perfil</h4>
        <div class="group flex items-center justify-center">
            <img src="{{auth()->user()->profile_picture}}" class="w-[120px] h-[120px] object-cover rounded-full" alt=""></img>
            <button class="absolute px-4 py-1 border-black border-[1px] top-32 left-15 text-white bg-black group-hover:opacity-90 opacity-0 duration-500 ease-in-out rounded-md">Editar</button>
        </div>
    </div>
    <form method="post" action="{{ route('profile.update') }}" class="border-2 border-gray-300 rounded-md w-full p-4 flex justify-between flex-wrap shadow-sm shadow-gray-500">
        @csrf
        @method('patch')
        <div class="w-full flex flex-col">
            <h2 class="text-xl font-semibold">Información básica del perfil</h2>
        </div>
        <div class="w-6/12">
            <div class="flex flex-col gap-1">
                <label class="text-gray-500 text-sm font-semibold" for="first_name">Nombre</label>
                <input type="text" id="first_name" name="first_name" class="rounded-md border-gray-500 border-2" value="{{auth()->user()->first_name}}">
                @error('first_name') <span class="text-red-500">{{ $message }}</span> @enderror
                <label class="text-gray-500 text-sm font-semibold" for="last_name">Apellido</label>
                <input type="text" id="last_name" name="last_name" class="rounded-md border-gray-500 border-2" value="{{auth()->user()->last_name}}">
                @error('last_name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="w-5/12">
            <div class="flex flex-col gap-1">
                <label class="text-gray-500 text-sm font-semibold" for="email">Email</label>
                <input type="text" id="email" name="email" class="rounded-md border-gray-500 border-2" value="{{auth()->user()->email}}">
                @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
                <label for="" class="opacity-0">boton de guardar</label>
                <button type="submit" class="w-full rounded-md bg-black text-white font-medium py-2">Guardar</button>
            </div>
        </div>
    </form>
</div>
<div class="w-11/12 m-auto mt-4 flex justify-between gap-2 mb-4">
    <form method="post" action="{{ route('password.update') }}" class="w-4/5 p-4 border-2 border-gray-300 rounded-md shadow-sm shadow-gray-500">
        @csrf
        @method('put')
        <h2 class="text-xl font-semibold text-center">Actualizar contraseña</h2>
        <div class="flex flex-col gap-4">
            <label for="current_password" class="text-gray-500 text-sm font-semibold" for="">Contraseña actual</label>
            <input id="current_password" name="current_password" type="password" class="rounded-md border-gray-500 border-2">
            @error('current_password') <span class="text-red-500">{{ $message }}</span> @enderror
            <label for="password" class="text-gray-500 text-sm font-semibold" for="">Nueva contraseña</label>
            <input id="password" name="password" type="password" class="rounded-md border-gray-500 border-2">
            <label for="password_confirmation" class="text-gray-500 text-sm font-semibold" for="">Repita su nueva contraseña</label>
            <input id="password_confirmation" name="password_confirmation" type="password" class="rounded-md border-gray-500 border-2">
            <button type="submit" class="py-2 bg-black text-white rounded-md w-1/4 m-auto">guardar</button>
        </div>
    </form>
    <div class="w-1/5 border-2 border-gray-300 rounded-md shadow-sm shadow-gray-500 h-36 p-4">
        <div class="flex flex-col gap-4">
            <form method="POST" action="{{ route('logout') }}" class="m-auto w-3/4">
                @csrf
                <button type="submit" class="py-2 bg-black text-white rounded-md w-full m-auto">Cerrar sesión</button>
            </form>
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection