import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import colors from "tailwindcss/colors.js";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: false,
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.tsx',
    ],

    theme: {
        colors:{
            ...colors,
            'primary': {
                DEFAULT: "#6658dd",
            },
            'success': {
                DEFAULT: "#1abc9c",
            },
            'info': {
                DEFAULT: "#4fc6e1",
            },
            'warning': {
                DEFAULT: "#f7b84b",
            },
            'danger': {
                DEFAULT: "#f1556c",
            },
            'first' : {
                DEFAULT: "#09344D",
            },
            'second' : {
                DEFAULT: "#ec7625",
            }
        },
        fontFamily: {
            PlayfairDisplay: ['IranSans'],
        },
        extend: {
            fontFamily: {
                sans: ['IranSans', ...defaultTheme.fontFamily.sans],
            },
            widths:{
                '8xl': '90rem',
            },
            maxWidth:{
                '8xl': '90rem',
            }
        },
    },

    plugins: [forms],
};
