import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/restaurant.js',
                'resources/css/style.css',
                'resources/js/bootstrap.js',
                'resources/js/dashboard_graph.js',
                'resources/js/mapForDetail.js',
                'resources/js/ranking.js',
                'resources/js/restaurantmap.js',
                'resources/js/review_StarGraph.js',
                'resources/js/textlimit.js',
                'public/css/style.css',
            ],
            refresh: true,
        }),
    ],
});
