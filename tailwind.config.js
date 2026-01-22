const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Instrument Sans', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                accent: '#D6A800',
                accentText: '#C8CDFC',
                textMain: '#F5F7FF',
                bgMain: '#484D85',
                box: '#363965',
            }
        },
    },
    plugins: [],
}
