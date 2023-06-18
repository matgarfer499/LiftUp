import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/admin.css',
                'resources/css/slider.css',
                'resources/css/style.css',
                'resources/js/app.js',
                'resources/js/anime.js',
                'resources/js/bagSlider.js',
                'resources/js/clothesSearchBar.js',
                'resources/js/displayMobile.js',
                'resources/js/filterSort.js',
                'resources/js/horizontalScrollbar.js',
                'resources/js/loginRegister.js',
                'resources/js/search.js',
                'resources/js/slider.js',
            ],
            refresh: true,
        }),
    ],
});
