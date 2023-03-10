const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');
const dotenv = require('dotenv');
dotenv.config({path: '../../../../.env'});

mix.browserSync({
    proxy: {
        target: process.env.APP_URL
    },
    files: [
        'resources/**/*',
        'inc/**/*',
        'views/**/*',
        'assets/**/*',
        'config/**/*',
    ],
    // change localhost to env APP_URL
    host: process.env.APP_DOMAIN,
})

mix.disableNotifications();
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */
mix.setPublicPath('dist');

mix.js('assets/js/theme.js', 'js/theme.min.js')
    .js('assets/js/editor.js', 'js/editor.min.js')
    .sass('assets/sass/app.scss', 'css/app.css')
    .sass('assets/sass/editor.scss', 'css/editor.css')
    .copy('assets/img', 'dist/img')
    .options({
        postCss: [ tailwindcss('./tailwind.config.js') ],
        processCssUrls: false
    })
    .version();
