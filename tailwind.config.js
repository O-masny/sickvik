import defaultTheme from 'tailwindcss/defaultTheme';
import preset from './vendor/filament/support/tailwind.config.preset'
const Unfonts = require("unplugin-fonts");

/** @type {import('tailwindcss').Config} */
export default {
    presets: [preset],
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        screens: {
            sm: '480px',
            md: '768px',
            lg: '976px',
            xl: '1440px',
        },
        colors: {
            'blue': '#1fb6ff',
            'pink': '#ff49db',
            'orange': '#ff7849',
            'green': '#13ce66',
            'gray-dark': '#273444',
            'gray': '#8492a6',
            'gray-light': '#d3dce6',
        },
        fontFamily: {
            sans: ['Graphik', 'sans-serif'],
            serif: ['Merriweather', 'serif'],
        },
        extend: {
            spacing: {
                '128': '32rem',
                '144': '36rem',
            },
            borderRadius: {
                '4xl': '2rem',
            }
        }
    },
    plugins: [
        require("@tailwindcss/typography"),
        Unfonts.default.vite({
            custom: {
                families: [
                    {
                        name: "Hey-August",
                        local: "Hey-August",
                        src: "./public/fonts/Hey-August.ttf",
                    },
                    {
                        name: "Share-TechMono",
                        local: "Share-TechMono",
                        src: "./public/fonts/Share-TechMono.ttf",
                    },
                    {
                        name: "Share-Regular",
                        local: "Share-Regular",
                        src: "./public/fonts/Share-Regular.ttf",
                    },
                ],
            },
        }),
    ],
};
