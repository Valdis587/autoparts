import gulp from "gulp";

import { path } from "./gulp/config/path.js";
import { plugins } from "./gulp/config/plugins.js";

global.app = {
   isBuild: process.argv.includes('--build'),
   isDev: !process.argv.includes('--build'),
   path: path,
   gulp: gulp,
   plugins: plugins
}

import { copy } from "./gulp/tasks/copy.js";
import { reset } from "./gulp/tasks/reset.js";
import { html } from "./gulp/tasks/html.js";
import { js } from "./gulp/tasks/js.js";
import { server } from "./gulp/tasks/server.js";
import { scss } from "./gulp/tasks/scss.js";
import { images } from "./gulp/tasks/images.js";
import { otfToTtf, ttfToWoff, fontsStyle } from "./gulp/tasks/fonts.js";
import { svgSprive } from "./gulp/tasks/svgSprive.js";
import { mainCss } from "./gulp/tasks/css.js";

function watcher() {
   gulp.watch(path.watch.files, copy);
   gulp.watch(path.watch.html, html);
   gulp.watch(path.watch.scss, scss);
   gulp.watch(path.watch.js, js);
   gulp.watch(path.watch.images, images);
   gulp.watch(path.watch.mainCss, mainCss);
}

export { svgSprive }

const fonts = gulp.series(otfToTtf, ttfToWoff, fontsStyle);

const mainTasks = gulp.series(fonts, gulp.parallel(copy, html, mainCss, js, scss, images));

const dev = gulp.series(reset, mainTasks, gulp.parallel(watcher, server));

const build = gulp.series(reset, mainTasks);

export { dev }
export { build }

gulp.task('default', dev);