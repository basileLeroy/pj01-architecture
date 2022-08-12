<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="@yield('seo', 'marc belderbos, architecturer, architecture')" />

        <title>Architecturer - @yield('title', 'Marc Belderbos')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/lightbox/lightbox.css') }}" />

        @extends("components.head.tinymce-config")
        @extends("components.head.lightbox-config")
    </head>

    <body>
        <div class="body-box">
            @auth
                <div class="admin-logged-in">
                    <p>You are logged in as administrator</p>

                    <li>
                        <a href="{{ route('logout', ['locale' => app()->getLocale()] ) }}">Log out</a>
                    </li>
                </div>
            @endauth
            <header>
                @yield('header')
            </header>
            <section>

                @yield('admin')
                @yield('content')
                @yield('confirmation')

                @if (session('PaymentMessage'))
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" class="flashMessage">
                    <p>{{ session('PaymentMessage') }}</p>
                </div>
                @endif
            </section>
        </div>

    </body>

</html>
