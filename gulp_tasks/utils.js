import gutil from "gulp-util";

const isProd = () => gutil.env.NODE_ENV === "production";

export { isProd };
