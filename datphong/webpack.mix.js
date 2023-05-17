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

/* Backend */
mix.sass('resources/sass/backend/myStyle.scss', 'public/backend/css').options({processCssUrls: false});
mix.js('resources/js/backend/myScript.js', 'public/backend/js');

/* Frontend */
mix.sass('resources/sass/frontend/myStyle.scss', 'public/frontend/css').options({processCssUrls: false});
mix.js('resources/js/frontend/myScript.js', 'public/frontend/js');

/* Combine css*/
mix.combine([
    'public/frontend/fontawesome/css/font-awesome.min.css',
    'public/frontend/css/lib/font-hilltericon.css',
    'public/frontend/css/lib/bootstrap-utilities.css',
    'public/frontend/css/lib/bootstrap.min.css',
    'public/frontend/css/lib/owl.carousel.css',
    'public/frontend/css/lib/owl.theme.css',
    'public/frontend/css/lib/jquery-ui.min.css',
    'public/frontend/css/lib/magnific-popup.css',
    'public/frontend/css/lib/settings.css',
    'public/frontend/css/lib/bootstrap-select.min.css',
    'public/frontend/css/lib/star-rating.min.css',
    'public/frontend/css/lib/star-rating-theme/krajee-fa/theme.min.css',
    'public/frontend/assets/bootstrap-datepicker/css/bootstrap-datepicker3.standalone.min.css',
    // 'public/frontend/css/lib/star-rating-theme/theme.min.css',
    'public/frontend/css/style.css'
], 'public/frontend/css/combine-all-assets.min.css');

/* Combine javascript*/
mix.combine([
    'public/frontend/js/lib/jquery-1.11.0.min.js',
    'public/frontend/js/lib/jquery-ui.min.js',
    'public/frontend/js/lib/bootstrap.min.js',
    'public/frontend/js/lib/bootstrap-select.js',
    'public/frontend/js/lib/isotope.pkgd.min.js',
    // 'public/frontend/js/lib/jquery.themepunch.revolution.min.js',
    // 'public/frontend/js/lib/jquery.themepunch.tools.min.js',
    'public/frontend/js/lib/jquery.appear.min.js',
    // 'public/frontend/js/lib/jquery.countTo.js',
    // 'public/frontend/js/lib/jquery.countdown.min.js',
    'public/frontend/js/lib/jquery.parallax-1.1.3.js',
    'public/frontend/js/lib/jquery.magnific-popup.min.js',
    'public/frontend/js/lib/SmoothScroll.js',
    'public/frontend/js/lib/star-rating.min.js',
    'public/frontend/css/lib/star-rating-theme/krajee-fa/theme.min.js',
    // 'public/frontend/js/lib/star-rating-theme/theme.min.js',
    // 'public/frontend/js/lib/jquery.form.min.js',
    // 'public/frontend/js/lib/jquery.validate.min.js',
    'public/frontend/js/lib/owl.carousel.js',
    'public/frontend/assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
    'public/frontend/js/scripts.js',
], 'public/frontend/js/combine-all-assets.min.js');

mix.disableNotifications();