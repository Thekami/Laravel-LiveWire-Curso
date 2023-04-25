import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/eventos.js',
                'resources/js/empleados.js',
                'resources/js/productos.js',
            ],
            refresh: true,
        }),
    ],
});
