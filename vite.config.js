import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/main.js',
                'resources/js/app.js',
                'resources/js/eventos.js',
            ],
            refresh: true,
        }),
    ],
});
