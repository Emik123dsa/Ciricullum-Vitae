const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
//import 'file-loader';

//mix.browserSync('127.0.0.1');
mix.js('resources/js/app.js', 'public/js')
   .extract(['vue'])
   //.sass('resources/sass/app.css', 'public/css')
   

 