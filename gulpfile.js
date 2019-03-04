const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

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

/*
*
*
* require('../../../node_modules/jquery/dist/jquery.js');
    require('./tree.jquery.js');
    require('./main.js');

//require('../../../node_modules/bootstrap/dist/js/bootstrap.js');
.webpack('app.js');
* */

elixir(mix => {

    mix.sass('app.scss')
        // .copy('node_modules/bootstrap-treeview/dist/bootstrap-treeview.min.js', 'resources/assets/js')
        .copy('node_modules/jqtree/build/tree.jquery.js', 'resources/assets/js')
        .copy('node_modules/jquery/dist/jquery.js', 'resources/assets/js')
        // .copy('node_modules/bootstrap-treeview/dist/bootstrap-treeview.min.css', 'resources/assets/css')
        .copy('node_modules/jqtree/jqtree.css', 'resources/assets/css')
        .copy('node_modules/bootstrap/dist/css/bootstrap.css', 'resources/assets/css')
        .copy('node_modules/bootstrap-sass/assets/fonts', 'public/fonts')
        .styles([
            'bootstrap.css',
            'jqtree.css'
            //'bootstrap-treeview.min.css'
        ])
        .scripts([
            'main.js',
            'jquery.js',
            // 'bootstrap-treeview.min.js'
            'tree.jquery.js'
        ], 'public/js/myScripts.js')
        .webpack('app.js');

});
