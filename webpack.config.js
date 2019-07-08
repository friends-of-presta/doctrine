var Encore = require('@symfony/webpack-encore');

Encore
  .setOutputPath('public/build/')
  .setPublicPath('/build')
  .addEntry('admin/demo/index', './assets/js/admin/demo/index.js')
  .cleanupOutputBeforeBuild()
  .enableSourceMaps(!Encore.isProduction())
;

module.exports = Encore.getWebpackConfig();
