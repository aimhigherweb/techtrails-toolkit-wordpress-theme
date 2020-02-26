import gulp from "gulp";
import browserify from "browserify";
import source from "vinyl-source-stream";
import buffer from "vinyl-buffer";
import gutil from "gulp-util";
import uglify from "gulp-uglify";
import paths from "./paths";
import { isProd } from "./utils";

const uglifyParams = {
	output: {
		comments: "some",
	},
};

export default function scripts() {
	const b = browserify({
		entries: paths.scripts.entry,
		basedir: paths.source,
		debug: !isProd(),
		transform: ["babelify"],
	});

	return b
		.bundle()
		.pipe(source(paths.scripts.entry))
		.pipe(buffer())
		.pipe(isProd() ? uglify(uglifyParams) : gutil.noop())
		.on("error", gutil.log)
		.pipe(gulp.dest(paths.scripts.dest));
}
