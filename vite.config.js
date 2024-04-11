import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/js/tinymce/tinymce.min.js',
                'resources/js/lightbox/fslightbox.js',
            ],
            refresh: true,
        }),
    ],
});
