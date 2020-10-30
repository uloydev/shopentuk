const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/native.js', 'public/js')
    .sass('resources/sass/native.scss', 'public/css')
    .options({
        processCssUrls: false,
        postCss: [tailwindcss('./tailwind.config.js')],
    })
    .copyDirectory('resources/img', 'public/img/static')
    .styles([
        'public/template/assets/extra-libs/c3/c3.min.css',
        'public/template/assets/libs/chartist/chartist.min.css',
        'public/template/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css',
        'public/template/dist/css/style.min.css',
        'resources/css/custom-dashboard.css'
    ], 'public/css/dashboard.css')
    .scripts([
        'public/js/addons/jquery.min.js',
        'public/js/addons/popper.min.js',
        'public/js/addons/bootstrap.min.js',
        'public/template/dist/js/app-style-switcher.min.js',
        'public/template/dist/js/feather.min.js',
        'public/js/addons/perfect-scrollbar.jquery.min.js',
        'public/template/dist/js/sidebarmenu.min.js',
        'public/template/dist/js/custom.min.js',
        'public/template/assets/extra-libs/c3/d3.min.js',
        'public/template/assets/extra-libs/c3/c3.min.js',
        'public/template/assets/libs/chartist/chartist.min.js',
        'public/template/assets/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js',
        'public/template/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js',
        'public/template/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js',
        'public/template/dist/js/dashboard1.min.js',
        'public/js/custom-dashboard.js'
    ], 'public/js/dashboard.js')
    .setPublicPath('public');

if (mix.inProduction()) { mix.version() }