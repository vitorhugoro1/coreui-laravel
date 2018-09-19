let mix = require('laravel-mix');

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

mix .js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/championship/app.js', 'public/js/championship')
    .js('resources/assets/js/academies/app.js', 'public/js/academies')
    .js('resources/assets/js/users/app.js', 'public/js/users')
    .js('resources/assets/js/core-ui.js', 'public/js/core')
    .copy('node_modules/select2/dist/js/select2.min.js', 'public/js/vendor/select2/select2.min.js')
    .sass('resources/assets/sass/custom.scss', 'public/css');
