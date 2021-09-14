var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    //javascript
    mix.scripts([
        'resources/assets/js/bootstrap.js'],'public/js/app.js')       
        //jquery         
       .copy('node_modules/jquery/dist/jquery.js', 'public/js/jquery.js')   
       //datepicker
       .copy('node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.js', 'public/js/bootstrap.js')
       //glyphicons
       .copy('node_modules/glyphicons/glyphicons.js', 'public/js/app.js')
       //multiselect
       .copy('node_modules/@nobleclem/jquery-multiselect/jquery.multiselect.js', 'public/js/multiple-select.js')    
       //niceselect
       .copy('node_modules/jquery-nice-select/js/jquery.nice-select.min.js', 'public/js/select.js')
       //datatable
       .copy('node_modules/datatables/media/js/jquery.dataTables.js', 'public/js/datatable.js')
       //modal
       .copy('node_modules/jbox/dist/jBox.all.min.js', 'public/js/modal.js')   
       //boostraap select
       .copy('node_modules/bootstrap-select-v4/dist/js/bootstrap-select.min.js', 'public/js/bootstrap-select.js')
       //select2
       .copy('node_modules/select2/dist/js/select2.js', 'public/css/select2.js')
       //css      
       //boostraap select     
       .copy('node_modules/bootstrap-select-v4/dist/css/bootstrap-select.min.css', 'public/css/bootstrap-select.css') 
       //select2
       .copy('node_modules/select2/dist/css/select2.css', 'public/css/select2.css')
       //multiselect
       .copy('node_modules/@nobleclem/jquery-multiselect/jquery.multiselect.css', 'public/css/multiple-select.css')
       //niceselect 
       .copy('node_modules/jquery-nice-select/css/nice-select.css', 'public/css/select.css')
       //modal
       .copy('node_modules/jbox/dist/jBox.all.min.css', 'public/css/modal.css')    
       //datatables
       .copy('node_modules/datatables/media/css/jquery.dataTables.css', 'public/css/datatable.css')      
       //datepicker
       .copy('node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.css', 'public/css/bootstrap.css')
       //styles general
       .styles('resources/assets/css/style.css','public/css/app.css')
       //public
       .version(['public/css/app.css', 'public/js/app.js','public/css/bootstrap.css','public/js/bootstrap.js'
        ,'public/js/select2.js','public/css/select2.css','public/css/select.css','public/js/select.js','public/js/multiple-select.js','public/css/multiple-select.css'
        ,'public/js/datatable.js','public/css/datatable.css','public/js/jquery.js','public/js/modal.js','public/css/modal.css'
    ]);
});

