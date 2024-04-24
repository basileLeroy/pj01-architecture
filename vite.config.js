import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/js/app-tailwind.js',
                'resources/js/admin.js',
                'vendor/tinymce/tinymce',
                'resources/js/lightbox/fslightbox.js',
            ],
            refresh: true,
        }),
    ],
});
