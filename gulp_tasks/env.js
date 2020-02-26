import gutil from "gulp-util";

export default function env(done) {
	gutil.env.NODE_ENV = "production";
	done();
}
