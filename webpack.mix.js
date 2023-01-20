// webpack.mix.js

let mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/backapp.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss','public/css');
