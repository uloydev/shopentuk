const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

require('laravel-mix-serve');

mix.js('resources/assets/js/native.js', 'public/js/all-client.js')
    .js('resources/assets/js/page/dashboard-admin.js', 'public/js')
    .sass('resources/assets/sass/native.scss', 'public/css')
    .sass('resources/assets/sass/admin-dashboard.scss', 'public/css')
    .options({
        processCssUrls: false,
        postCss: [tailwindcss('./tailwind.config.js')],
    })
    .copyDirectory('resources/img', 'public/img/static')
    .copyDirectory('resources/assets/template/assets/images', 'public/img/template')
    .styles([
        'resources/assets/template/assets/extra-libs/c3/c3.min.css',
        'resources/assets/template/assets/libs/chartist/chartist.min.css',
        'resources/assets/template/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css',
        'resources/assets/plugin/datatables.net/css/datatables.min.css',
        'resources/assets/template/dist/css/style.css',
    ], 'public/css/dashboard.css')
    .scripts([
        'resources/assets/js/addons/jquery.min.js',
        'resources/assets/js/addons/popper.min.js',
        'resources/assets/js/addons/bootstrap.min.js',
        'resources/assets/plugin/datatables.net/js/datatables.min.js',
        'resources/assets/template/dist/js/app-style-switcher.min.js',
        'resources/assets/template/dist/js/feather.min.js',
        'resources/assets/js/addons/perfect-scrollbar.jquery.min.js',
        'resources/assets/template/assets/extra-libs/sparkline/sparkline.js',
        'resources/assets/template/dist/js/sidebarmenu.min.js',
        'resources/assets/template/dist/js/custom.min.js',
        'resources/assets/template/assets/extra-libs/prism/prism.js',
        'resources/assets/template/assets/extra-libs/c3/d3.min.js',
        'resources/assets/template/assets/extra-libs/c3/c3.min.js',
        'resources/assets/template/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js',
        'resources/assets/template/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js',
        'public/js/dashboard-admin.js'
    ], 'public/js/all-admin.js')
    .setPublicPath('public');

mix.serve();

mix.browserSync({
    proxy: 'http://localhost:8000'
});