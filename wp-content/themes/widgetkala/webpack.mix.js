const mix = require('laravel-mix');

mix.js('resources/js/app.js','assets/js');
mix.postCss('resources/css/print.css','assets/css').options({
	processCssUrls: false
});
mix.postCss('resources/css/theme.css', 'assets/css', [
	require('tailwindcss'),
	require('postcss-nested')
])
    .options({
	processCssUrls: false
});