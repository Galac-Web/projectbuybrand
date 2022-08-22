const fs  = require('fs');
const mix = require('laravel-mix');

// Web
const web = {
   path: 'public/',
};
// Dashboard
const dashboard = {
   mix: true,
   path: 'public/assets/dashboard/',
};
// CKEditor
const ckeditor = {
   mix: true,
   path: 'public/assets/ckeditor/',
   languages: ['ru', 'en'],
};

// Dashboard
if (dashboard.mix) {
   mix.js('resources/js/dashboard/app.js', dashboard.path + 'js')
      .sass('resources/sass/dashboard/app.scss', dashboard.path + 'css')
      .sass('resources/sass/dashboard/sb-admin-2/sb-admin-2.scss', dashboard.path + 'css');
}

// Web
mix.js('resources/js/app.js', web.path + 'scripts');

// mix.sass('resources/sass/app.scss', web.path + 'styles')
//    .options({
//       processCssUrls: false
//    });

mix.vue({ version: 3 });

// CKEditor
if (ckeditor.mix && !fs.existsSync(ckeditor.path)) {
   mix.copy([
      'node_modules/ckeditor4/config.js',
      'node_modules/ckeditor4/styles.js',
      'node_modules/ckeditor4/contents.css',
   ], ckeditor.path);

   ckeditor.languages.forEach(lang => {
      mix.copy([
         `node_modules/ckeditor4/lang/${ lang }.js`,
      ], ckeditor.path + 'lang');
   });

   mix.copyDirectory('node_modules/ckeditor4/skins', ckeditor.path + 'skins')
      .copyDirectory('node_modules/ckeditor4/plugins', ckeditor.path + 'plugins');
}

if (mix.inProduction()) {
   mix.minify([
      web.path + 'scripts/app.js',
      web.path + 'styles/app.css'
   ]);
   mix.options({
      terser: {
         extractComments: false,
      },
   });
} else {
   mix.sourceMaps();
}

mix.version();
mix.disableNotifications();