let mix = require('laravel-mix');

mix
  .js('resources/js/app.js', 'public/js')
  .vue({ version: 2 })
  .postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('@tailwindcss/postcss'),  // ← updated here
    require('autoprefixer'),
  ]);
