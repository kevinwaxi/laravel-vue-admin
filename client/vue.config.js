module.exports = {
  runtimeCompiler: true,
  productionSourceMap: false,

  publicPath: process.env.NODE_ENV === 'production'
      ? './dist'
      : '/',

  outputDir: '../server/public/dist',
  indexPath: '../../resources/views/welcome.blade.php',
};