<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @yield('seo');

        <title>Architecturer - @yield('title', 'Marc Belderbos')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/lightbox/lightbox.css') }}" />
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
            @yield('flash')
        </div>
        <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
        <script>
            tinymce.init({
                selector:'textarea.description',
                width: 700,
                height: 300
            });
        </script>
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
