resources/css/fonts.css
@font-face {
    font-family: 'Tanker';
    src: url('/fonts/tanker.woff2') format('woff2'),
         url('/fonts/tanker.woff') format('woff');
    font-weight: normal;
    font-style: normal;
}

@font-face {
    font-family: 'GeneralSans';
    src: url('/fonts/generalSans.woff2') format('woff2'),
         url('/fonts/generalSans.woff') format('woff');
    font-weight: normal;
    font-style: normal;
}

@font-face {
    font-family: 'Gambetta';
    src: url('/fonts/gambetta.woff2') format('woff2'),
         url('/fonts/gambetta.woff') format('woff');
    font-weight: normal;
    font-style: normal;
}
 resources/css/app.css 
@import './fonts.css';
Otevři tailwind.config.js a přidej fonty do extend.theme:

js
Zkopírovat
Upravit
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                tanker: ['Tanker', 'sans-serif'],
                generalSans: ['GeneralSans', 'sans-serif'],
                gambetta: ['Gambetta', 'serif'],
            },
        },
    },
    plugins: [],
};

<h1 class="font-tanker">Nadpis s Tanker fontem</h1>
<p class="font-generalSans">Text s GeneralSans fontem</p>
<p class="font-gambetta">Text s Gambetta fontem</p>