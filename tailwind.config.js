import preset from './vendor/filament/support/tailwind.config.preset'

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class', // This is our star player for the dark mode!
    presets: [preset],
    important: true, // Vynutí Tailwind třídy před ostatními styly
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/**/*.blade.php',
        './resources/**/*.js',
    ],
    theme: {

        extend: {
            animation: {
                'fade-in': 'fadeIn 1s ease-out forwards',
                'bg-fade-in': 'fadeIn 2s ease-out forwards',
            },
            keyframes: {
                fadeIn: {
                    '0%': { opacity: 0 },
                    '100%': { opacity: 1 },
                },
            },
            perspective: {
                '1000': '1000px',
            },
            transform: ['hover', 'focus'],
            transformStyle: ['responsive'],
            screens: {
                sm: '480px',
                md: '768px',
                lg: '976px',
                xl: '1440px',
            },

            fontFamily: {
                'share-regular': ['Share-Regular', 'sans-serif'],
                'share-mono': ['Share-TechMono', ''],
                'august': ['Hey-august', 'serif'],

            },
            spacing: {
                '128': '32rem',
                '144': '36rem',
            },
            borderRadius: {
                '4xl': '2rem',
            },
            fontSize: {
                'xs': '0.75rem',  // Výchozí, ale můžete změnit
                'sm': '0.875rem',
                'base': '1rem',    // Základní velikost textu
                'lg': '1.125rem',
                'xl': '1.25rem',
                '2xl': '1.5rem',
                '3xl': '1.875rem',
                '4xl': '2.25rem',
                '5xl': '3rem',
                '6xl': '3.75rem',
                '7xl': '4.5rem',
            }
        }
    },
    plugins: [
    ],
};
