export const server = (done) => {
   app.plugins.browsersync.init({
      proxy: 'http://auto',
      host: 'auto',
      open: 'external'
   });
}