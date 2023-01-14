<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="@yield('seo', 'marc belderbos, architecturer, architecture')" />

        <title>Architecturer - @yield('title', 'Marc Belderbos')</title>

        @include("components.head.links")
        @include("components.head.scripts")
        @include("components.head.tinymce-config")
        @include("components.head.lightbox-config")
    </head>
    <body>
        <header>
            @yield('header')
        </header>

        {{-- Admin logout button --}}
        @auth
            @include('Admin.logout')
        @endauth

        <main>
            @yield('admin')
            @yield('content')
            @yield('confirmation')
        </main>

        {{-- Payment flash message --}}
        {{-- @if (session('PaymentMessage')) --}}
        {{-- @yield('payment-flash-message') --}}
        {{-- @endif --}}

    </body>

</html>
