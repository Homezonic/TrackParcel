const mix = require("laravel-mix");
const webpack = require('webpack');


/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js(
    "resources/js/app.js", "public/assets/js/soft-ui-dashboard.js",
    "resources/js/script.js", "public/js",
);
mix.js("resources/js/app.js", "public/js")
    .postCss("resources/css/app.css", "public/css", [
        require("tailwindcss"),
    ]);

mix.sass(
    "resources/scss/soft-ui-dashboard.scss",
    "public/assets/css/soft-ui-dashboard.css"
);

mix.webpackConfig({
    plugins: [
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery',
            'window.jQuery': 'jquery',
        }),
    ],
});
