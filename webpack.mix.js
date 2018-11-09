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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

mix.styles([
	'public/dist/css/style.min.css'
], 'public/assets/css/rddb.css');
	
mix.scripts([
    'public/assets/node_modules/jquery/jquery-3.2.1.min.js',
    'public/assets/node_modules/popper/popper.min.js',
    'public/assets/node_modules/bootstrap/dist/js/bootstrap.min.js',
    'public/dist/js/perfect-scrollbar.jquery.min.js',
    'public/dist/js/waves.js',
    'public/dist/js/sidebarmenu.js',
    'public/dist/js/custom.min.js'
	], 'public/assets/js/rddb.js');

mix.version('public/assets/css/rddb.css');
mix.version('public/assets/js/rddb.js');
