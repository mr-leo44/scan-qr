import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.vue",
        "./resources/**/*.js",
        "./node_modules/flowbite/**/*.js"

    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree','raleway', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "footer": "#02213d",
                "telecharger": "#0079fe",
                "reclamer": "#007afe",
                "left": "#3473b3",
                "right": "#3693f4",
                "two": "#f8f9fb",
            }
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin')
    ],
};
