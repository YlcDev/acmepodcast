var Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    .addEntry('js/app', './assets/js/entrypoint.js')
    .addStyleEntry('css/app', './assets/sass/entrypoint.scss')
    .enableSassLoader();

module.exports = Encore.getWebpackConfig();