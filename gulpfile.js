process.env.DISABLE_NOTIFIER = true;

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
    mix.sass('app.scss');
});

/*
 |--------------------------------------------------------------------------
 | Vendor Assets
 |--------------------------------------------------------------------------
 |
 | Any `recipes` required for CSS/JS/fonts are located below:
 |
 */

// Any useful paths can be set here
var paths  = {
    bower: '../bower_components/'
};

// Vendor styles
elixir(function(mix) {
    mix.styles([
        paths.bower + 'bootstrap/dist/css/bootstrap.css',
        paths.bower + 'font-awesome/css/font-awesome.css',
        paths.bower + 'ionicons/css/ionicons.css',
        paths.bower + 'dragula.js/dist/dragula.css',
        paths.bower + 'AdminLTE/plugins/datatables/dataTables.bootstrap.css',
        paths.bower + 'AdminLTE/plugins/iCheck/flat/blue.css',
        paths.bower + 'AdminLTE/plugins/morris/morris.css',
        paths.bower + 'AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.css',
        paths.bower + 'AdminLTE/plugins/datepicker/datepicker3.css',
        paths.bower + 'AdminLTE/plugins/daterangepicker/daterangepicker-bs3.css',
        paths.bower + 'AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css',
        paths.bower + 'AdminLTE/dist/css/AdminLTE.css',
        paths.bower + 'AdminLTE/dist/css/skins/_all-skins.css',
    ], 'public/css/vendor.css');
});

// Vendor scripts
elixir(function(mix) {
    mix.scripts([
        paths.bower + 'jquery/dist/jquery.js',
        paths.bower + 'jquery-ui/jquery-ui.js',
        paths.bower + 'bootstrap/dist/js/bootstrap.js',
        paths.bower + 'raphael/raphael.js',
        paths.bower + 'moment/moment.js',
        paths.bower + 'dragula.js/dist/dragula.js',
        paths.bower + 'AdminLTE/plugins/datatables/jquery.dataTables.js',
        paths.bower + 'AdminLTE/plugins/datatables/dataTables.bootstrap.js',
        paths.bower + 'AdminLTE/plugins/morris/morris.js',
        paths.bower + 'AdminLTE/plugins/sparkline/jquery.sparkline.js',
        paths.bower + 'AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        paths.bower + 'AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        paths.bower + 'AdminLTE/plugins/knob/jquery.knob.js',
        paths.bower + 'AdminLTE/plugins/daterangepicker/daterangepicker.js',
        paths.bower + 'AdminLTE/plugins/datepicker/bootstrap-datepicker.js',
        paths.bower + 'AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js',
        paths.bower + 'AdminLTE/plugins/slimScroll/jquery.slimscroll.js',
        paths.bower + 'AdminLTE/plugins/chartjs/Chart.js',
        paths.bower + 'AdminLTE/plugins/fastclick/fastclick.js',
        paths.bower + 'AdminLTE/dist/js/app.js',
    ], 'public/js/vendor.js');
});

// Vendor fonts
elixir(function(mix) {
    mix.copy('resources/assets/bower_components/bootstrap/fonts',    'public/fonts');
    mix.copy('resources/assets/bower_components/font-awesome/fonts', 'public/fonts');
    mix.copy('resources/assets/bower_components/ionicons/fonts',     'public/fonts');
});
