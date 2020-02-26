import gulp from "gulp";
import gutil from "gulp-util";
import styles from "./gulp_tasks/style";
import scripts from "./gulp_tasks/scripts";
import paths from "./gulp_tasks/paths";
import env from "./gulp_tasks/env";

// Default to development
gutil.env.NODE_ENV = gutil.env.NODE_ENV || "development";

export function watch() {
	gulp.watch(paths.styles.src, styles);
	gulp.watch(paths.scripts.src, scripts);
}

export const build = gulp.series(env, styles, scripts);

export { styles, scripts };

export default watch;
