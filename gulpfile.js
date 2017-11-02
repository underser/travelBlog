var gulp         = require('gulp'),
		sass         = require('gulp-sass'),
		autoprefixer = require('gulp-autoprefixer'),
		concat       = require('gulp-concat'),
		uglify       = require('gulp-uglifyjs'),
        babel        = require('gulp-babel');


//Compile sass
gulp.task("sass", function() {
	return gulp.src("src/sass/*.sass")
	.pipe(sass({errLogToConsole: true, outputStyle: 'expanded'}))
	.pipe(autoprefixer({browsers: ['last 2 versions'], cascade: false}))
	.pipe(gulp.dest("public/css"));
});

// Transpile JS
gulp.task('js', function () {
    gulp.src('src/js/*.js')
        .pipe(babel({ presets: ['env'] }))
        .pipe(gulp.dest('public/js'))
});

gulp.task("lib", function() {
	return gulp.src([
			'node_modules/jquery/dist/jquery.js',
		])
		.pipe(concat("libs.min.js"))
		.pipe(uglify()) //Minify libs.js
		.pipe(gulp.dest("public/js"));
});

gulp.task("watch", function () {
	gulp.watch("src/sass/**/*.sass", ["sass"]);
	gulp.watch("src/js/**/*.js", ['js']);
});

gulp.task("default", ["watch"]);