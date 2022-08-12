const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/css/app.scss', 'public/css', [
        //
    ]);

mix.copyDirectory('vendor/tinymce/tinymce', 'public/js/tinymce');
mix.copy('node_modules/tinymce/jquery.tinymce.blade.php', 'public/node_modules/tinymce/jquery.tinymce.blade.php');
mix.copy('node_modules/tinymce/jquery.tinymce.min.js', 'public/node_modules/tinymce/jquery.tinymce.min.js');
mix.copy('node_modules/tinymce/tinymce.blade.php', 'public/node_modules/tinymce/tinymce.blade.php');
mix.copy('node_modules/tinymce/tinymce.min.js', 'public/node_modules/tinymce/tinymce.min.js');
