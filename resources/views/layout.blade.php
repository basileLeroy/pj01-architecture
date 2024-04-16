<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="@yield('seo', 'marc belderbos, architecturer, architecture')" />

        <title>Architecturer - @yield('title', 'Marc Belderbos')</title>

        @include("components.includes.scripts")
        @include("components.includes.links")
        {{-- @include("components.includes.tinymce-config") --}}
    </head>
    <body>
        
        {{-- Check if the current route is named within the admin namespace --}}
        @if(Route::currentRouteNamed('admin.*'))
            @include("layouts.admin")
        @elseif (Route::currentRouteNamed('auth.*'))
            @include("layouts.auth")
        @else
            @include("layouts.guest")
        @endif

        {{-- Payment flash message --}}
        {{-- @if (session('PaymentMessage')) --}}
        {{-- @yield('payment-flash-message') --}}
        {{-- @endif --}}

    </body>

</html>

{{-- "We must be better simply because the option exists." by Ren --}}

{{-- Developped by Basile Leroy --}}