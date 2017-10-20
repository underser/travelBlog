var gulp         = require('gulp'),
		sass         = require('gulp-sass'),
		autoprefixer = require('gulp-autoprefixer'),
		concat       = require('gulp-concat'),
		uglify       = require('gulp-uglifyjs');


//Compile sass
gulp.task("sass", function() {
	return gulp.src("src/sass/*.sass")
	.pipe(sass({errLogToConsole: true, outputStyle: 'expanded'}))
	.pipe(autoprefixer({browsers: ['last 2 versions'], cascade: false}))
	.pipe(gulp.dest("public/css"));
});


gulp.task("lib", function() {
	return gulp.src([
			'./bower_components/jquery/dist/jquery.min.js',
		])
		.pipe(concat("libs.min.js"))
		.pipe(uglify()) //Minify libs.js
		.pipe(gulp.dest("public/js/"));
});

gulp.task("sass:watch", function () {
	gulp.watch("src/sass/**/*.sass", ["sass"]);
});

gulp.task("default", ["sass:watch"]);