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

mix.scripts([
  'node_modules/jquery/dist/jquery.min.js',
  'node_modules/popper.js/dist/umd/popper.min.js',
  'node_modules/bootstrap/dist/js/bootstrap.min.js',
  'node_modules/pace-progress/pace.min.js',
  'node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js',
  'node_modules/@coreui/coreui/dist/js/coreui.min.js',
  'node_modules/@coreui/coreui-plugin-chartjs-custom-tooltips/dist/js/custom-tooltips.min.js',
], 'public/js/vendors.js');

mix.sass('resources/assets/sass/app.scss', 'public/css')
   .js('resources/assets/js/app.js', 'public/js')
   .js('resources/assets/js/backend/app_backend.js', 'public/js')
