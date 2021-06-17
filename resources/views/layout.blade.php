<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @yield('seo');

        <title>Architecturer - @yield('title', 'Marc Belderbos')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/lightbox/lightbox.css') }}" />
    </head>

    <body>
        <div class="body-box">
            <header>
                @yield('header')
            </header>
            <section>
                @yield('landing')
                @yield('admin')
                @yield('intentionsWebsite')
                @yield('intentionsProjects')
                @yield('architecture')
                @yield('words')
                @yield('words01')
                @yield('words02')
                @yield('words03')
                @yield('words04')
                @yield('words05')
                @yield('contact')
                @yield('project')
            </section>
        </div>
        <script src="{{ asset('js/lightbox/lightbox-plus-jquery.js') }}"></script>
        <script>
            lightbox.option({
                'resizeDuration': 200,
                'imageFadeDuration': 200,
                'fadeDuration' : 100,
                'wrapAround': true,
                
            })
        </script>
        <script>
            const slider = document.querySelector('.gallery');
            let isDown = false;
            let startX;
            let scrollLeft;

            slider.addEventListener('mousedown', (e) => {
                isDown = true;
                slider.classList.add('active');
                startX = e.pageX - slider.offsetLeft;
                scrollLeft = slider.scrollLeft;
            });
            slider.addEventListener('mouseleave', () => {
                isDown = false;
                slider.classList.remove('active');
            });
            slider.addEventListener('mouseup', () => {
                isDown = false;
                slider.classList.remove('active');
            });
            slider.addEventListener('mouseclick', () => {
                isDown = false;
                slider.classList.remove('active');
            });
            slider.addEventListener('mousemove', (e) => {
                if(!isDown) return;
                e.preventDefault();
                const x = e.pageX - slider.offsetLeft;
                const walk = (x - startX) * 3; //scroll-fast
                slider.scrollLeft = scrollLeft - walk;
                console.log(walk);
            });
        </script>
    </body>

</html>
