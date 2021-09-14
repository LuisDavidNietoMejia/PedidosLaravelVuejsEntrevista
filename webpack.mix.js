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

mix.js('resources/assets/js/app.js', 'public/js/app.js')
   //javascript normal
   .copy('node_modules/jquery/dist/jquery.js', 'public/js/jquery.js')
   //glyphicons
   .copy('node_modules/glyphicons/glyphicons.js', 'public/js/glyphicons.js')
   //multiselect
   .copy('node_modules/@nobleclem/jquery-multiselect/jquery.multiselect.js', 'public/js/multiple-select.js')
   //niceselect
   .copy('node_modules/jquery-nice-select/js/jquery.nice-select.min.js', 'public/js/select.js')
    //toastr
   .copy('node_modules/toastr/build/toastr.min.js', 'public/js/toastr.js')
   // vue-multiselect
   .copy('node_modules/vue-multiselect/dist/vue-multiselect.min.js', 'public/js/vue-multiselect.js')
   //custom-box
   // .copy('node_modules/custombox/dist/custombox.min.js', 'public/js/custombox.min.js')
   // .copy('node_modules/custombox/dist/custombox.legacy.min.js', 'public/js/custombox.min.js')

   .copy('node_modules/ladda/dist/ladda.min.js', 'public/js/ladda.js')
   .copy('node_modules/ladda/dist/ladda.jquery.min.js', 'public/js/ladda.min.js')

   //css

   .sass('resources/assets/sass/app.scss', 'public/css');

   mix.styles([
      'node_modules/toastr/build/toastr.min.css',
   ], 'public/css/toastr.css');

   mix.styles([
      'node_modules/@nobleclem/jquery-multiselect/jquery.multiselect.css',
   ], 'public/css/multiple-select.css');

   mix.styles([
      'node_modules/jquery-nice-select/css/nice-select.css',
   ], 'public/css/select.css');

   mix.styles([
      'node_modules/vue-multiselect/dist/vue-multiselect.min.css',
   ], 'public/css/vue-multiselect.css');

   mix.styles([
      'node_modules/custombox/dist/custombox.min.css',
   ], 'public/css/custombox.css');

   mix.styles([
      'node_modules/ladda/dist/ladda.min.css',
   ], 'public/css/ladda.css');

   mix.autoload({
      'jquery': ['$', 'window.jQuery', 'jQuery'],
      'vue': ['Vue','window.Vue'],
      'moment': ['moment','window.moment'],
    })
