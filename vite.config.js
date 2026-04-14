import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/toggleLocale.js',

                // ------ Admin Panel ------
                'resources/css/dashasset/style.css',
                'resources/js/dashasset/main.js',
                'resources/css/dashasset/dashstyle.css',


                // ------ Frontend ------
                'resources/css/assets/style.css',
                'resources/js/assets/main.js',
                // Register User
                'resources/js/assets/register-user.js',
                'resources/js/assets/login.js',
            ],
            refresh: true,
        }),
    ],
});
