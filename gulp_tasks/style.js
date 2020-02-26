import gulp from "gulp";
import sourcemaps from "gulp-sourcemaps";
import sass from "gulp-sass";
import gutil from "gulp-util";
import postcss from "gulp-postcss";
import autoprefixer from "autoprefixer";
import nano from "gulp-cssnano";
import { isProd } from "./utils";
import paths from "./paths";

export default function styles(done) {
	return gulp
		.src(paths.styles.src)
		.pipe(isProd() ? gutil.noop() : sourcemaps.init())
		.pipe(sass({ precision: 6, includePaths: paths.styles.includes }))
		.on("error", err => {
			gutil.log(gutil.colors.red(err.name), err.message);
			done();
			return;
		})
		.pipe(postcss([autoprefixer()]))
		.pipe(isProd() ? nano() : sourcemaps.write())
		.pipe(gulp.dest(paths.styles.dest));
}
