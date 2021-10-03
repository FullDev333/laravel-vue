const { mix } = require('laravel-mix');
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


/*
 * 前台
 */
 mix.styles([
    'node_modules/font-awesome/css/font-awesome.min.css'
], 'public/css/frontend/vendor.css');

mix.sass('resources/assets/sass/frontend/app.scss', 'public/css/frontend/app.css');
mix.js('resources/assets/js/frontend/app.js', 'public/js/frontend');


/*
 * 后台
 */
 mix.styles([
    'node_modules/font-awesome/css/font-awesome.min.css'
], 'public/css/backend/vendor.css');

mix.sass('resources/assets/sass/backend/app.scss', 'public/css/backend/app.css');
mix.js('resources/assets/js/backend/app.js', 'public/js/backend');