var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {
    mix.sass("app.scss", 'public/assets/css/app.css')
        .sass("home.scss", 'public/assets/css/home.css')
        .sass("admin.scss", 'public/assets/css/admin.css')
        .copy('resources/assets/css/', 'public/assets/css/')
        .copy('resources/assets/fonts/', 'public/assets/fonts/')
        .copy('resources/assets/img/', 'public/assets/img/')
        .copy('resources/assets/plugins', 'public/assets/plugins')
        .scripts('resources/assets/js/admin/categorias_index.js', 'public/assets/js/admin/categorias_index.js')
        .scripts('resources/assets/js/admin/categorias_create.js', 'public/assets/js/admin/categorias_create.js')
        .scripts('resources/assets/js/admin/categorias_show.js', 'public/assets/js/admin/categorias_show.js');
});
