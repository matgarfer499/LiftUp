@extends('layouts.logins')

@section('title', 'Iniciar sesion')

@section('content')
<!-- Session Status -->
<div class="w-screen h-screen flex justify-center items-center fixed z-10">
    <div class="w-4/12 border-gray-400 border-2 p-4 rounded-md bg-white/90">
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Recuerdame</span>
                </label>
            </div>

            <div class="w-full flex justify-start">
                <a href="{{ route('register') }}" class="text-gray-600 text-sm hover:underline hover:underline-offset-1 cursor-pointer">¿No tienes cuenta? Registrate.</a>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    Olvide mi contraseña
                </a>
                @endif

                <x-primary-button class="ml-3">
                    {{ __('Log in') }}
                </x-primary-button>

                <a href="/" class="ml-3 p-2 bg-red-600 text-sm font-semibold text-white rounded-md uppercase">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection