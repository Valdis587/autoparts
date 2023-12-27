import imagesmin from "gulp-imagemin";

export const images = () => {
   return app.gulp.src(app.path.src.images, { sourcemaps: app.isDev })
      .pipe(
         app.plugins.if(app.isBuild, imagesmin())      
   )
      .pipe(app.gulp.dest(app.path.build.images))
      .pipe(app.plugins.browsersync.stream());
}