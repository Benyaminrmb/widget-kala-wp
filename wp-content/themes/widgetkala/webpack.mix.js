const mix = require('laravel-mix');

mix.js('resources/js/app.js','assets/js');

mix.postCss('resources/css/theme.css', 'assets/css', [
	require('tailwindcss'),
	require('postcss-nested')
])
    .options({
	processCssUrls: false
});