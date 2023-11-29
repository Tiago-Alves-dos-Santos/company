/** @type {import('tailwindcss').Config} */
module.exports =  {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/tw-elements/dist/js/**/*.js"

    ],
    theme: {
        extend: {},
    },
    plugins: [require("tw-elements/dist/plugin.cjs")],
}

