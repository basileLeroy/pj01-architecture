@extends("layout")

@section('seo')
    belderbos, marc, architecturer, projects, intentions
@endsection

@section('title')
    Login
@endsection

@section('content')
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" class="w-96 p-12 bg-red-50 shadow-lg " action="{{ route("auth.login.store") }}">
        @csrf
        
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 pl-2 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 pl-2 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="mr-3">
                {{ __('Log in') }}
            </x-primary-button>

            <br>

            @if (Route::has('auth.password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('auth.password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

        </div>
    </form>
@endsection