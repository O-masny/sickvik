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
            screens: {
                sm: '480px',
                md: '768px',
                lg: '976px',
                xl: '1440px',
            },
            colors: {
                primary: {
                    DEFAULT: '#1C1C1E',
                    light: '#2C2C2E',
                    dark: '#000000',
                    contrast: '#FFFFFF',
                },
                secondary: {
                    DEFAULT: '#FF3D00',
                    light: '#FF6333',
                    dark: '#B22A00',
                    contrast: '#FFFFFF',
                },
                tertiary: {
                    DEFAULT: '#F5F5F7',
                    light: '#FFFFFF',
                    dark: '#D1D1D6',
                    contrast: '#1C1C1E',
                },
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
                'xs': '0.75rem',
                'sm': '0.875rem',
                'base': '1rem',
                'lg': '1.125rem',
                'xl': '1.25rem',
                '2xl': '1.5rem',
                '3xl': '1.875rem',
                '4xl': '2.25rem',
                '5xl': '3rem',
                '6xl': '3.75rem',
                '7xl': '4.5rem',
                '8xl': '6rem',
                '9xl': '8rem',
            }
        }
    },
    plugins: [
    ],
};
