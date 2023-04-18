const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Open Sans', ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            'pizzared': '#ff2b06',
            'pizzaname': '#f4dba5',
            'lime-500': 'rgb(132 204 22)',
            'red-600': 'rgb(220 38 38)',
            'gray-300': 'rgb(209 213 219)',
            'transparent': 'transparent'
        }
    },

    plugins: [require('@tailwindcss/forms')],
};
