<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Architecturer - @yield('title', 'Marc Belderbos')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />
    </head>

    <body>
        <div class="body-box">
            <header>
                @yield('header')
            </header>
            <section>
                @yield('landing')
                @yield('intentionsWebsite')
                @yield('intentionsProjects')
            </section>
        </div>
    </body>

</html>
