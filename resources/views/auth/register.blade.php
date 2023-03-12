@extends('layouts.logins')

@section('title', 'Iniciar sesion')

@section('content')
<div class="w-screen h-screen flex justify-center items-center fixed z-10">
    <div class="w-4/12 border-gray-400 border-2 p-4 rounded-md bg-white/90">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="first_name" :value="__('Nombre')" />
                <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus />
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="last_name" :value="__('Apellido')" />
                <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus />
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>

            <div class="w-full flex flex-wrap justify-start mt-4">
                <x-input-label class="mx-2" for="gender" :value="__('Hombre')" />
                <x-text-input id="gender" class="block mt-1" type="radio" name="gender" value="H" required autofocus />
                <x-input-label class="mx-2" for="gender" :value="__('Mujer')" />
                <x-text-input id="gender" class="block mt-1" type="radio" name="gender" value="M" required autofocus />
                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Contraseña')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    ¿Ya estas registrado? Inicia sesión
                </a>

                <x-primary-button class="ml-4">
                    Registrarse
                </x-primary-button>
                <a href="/" class="ml-3 p-2 bg-red-600 text-sm font-semibold text-white rounded-md uppercase">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection