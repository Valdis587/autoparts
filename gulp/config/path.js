import * as nodePath from 'path';
const rootFolder = nodePath.basename(nodePath.resolve());

const buldFolder = `./assets`;
const srcFolder = `./src`;

export const path = {
   build: {
      css: `${buldFolder}/css/`,
      js: `${buldFolder}/js/`,
      html: `${buldFolder}/`,
      files: `${buldFolder}/js/`,
      images: `${buldFolder}/images/`,
      fonts: `${buldFolder}/fonts/`,
      mainCss: `${buldFolder}/css/`,
   },
   src: {
      scss: `${srcFolder}/scss/style.scss`,
      js: `${srcFolder}/js/*.js`,
      mainCss: `${srcFolder}/css/*.css`,
      html: `${srcFolder}/*.html`,
      files: `${srcFolder}/files/**/*.*`,
      images: `${srcFolder}/images/**/*.*`,
      svg: `${srcFolder}/img/**/*.svg`,
      svgicons: `${srcFolder}/svgicons/*.svg`,
   },
   watch: {
      scss: `${srcFolder}/scss/**/*.scss`,
      js: `${srcFolder}/js/*.js`,
      html: `${srcFolder}/**/*.html`,
      files: `${srcFolder}/files/**/*.*`,
      images: `${srcFolder}/images/**/*.{jpg, jpeg, png, gif, webp, svg}`,
      mainCss: `${srcFolder}/css/*.css`,
   },
   clean: buldFolder,
   buldFolder: buldFolder,
   srcFolder: srcFolder,
   rootFolder: rootFolder
}
