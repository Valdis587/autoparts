export const mainCss = () => {
   return app.gulp.src(app.path.src.mainCss)
      .pipe(app.gulp.dest(app.path.build.mainCss))
      .pipe(app.plugins.browsersync.stream());
}