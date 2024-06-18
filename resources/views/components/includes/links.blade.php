
{{-- Favicon --}}
<link rel="shortcut icon" href="{{asset("favicon.ico")}}" type="image/x-icon">
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
{{-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Vite -->

@if(Route::currentRouteNamed('admin.*') || Route::currentRouteNamed('auth.*'))
    @vite([
        'resources/js/app-tailwind.js',
        'resources/js/tinymce/tinymce.js'
    ])
@else
    @vite([
        'resources/js/app.js',
    ])
@endif
