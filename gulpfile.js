const gulp         = require('gulp');
const sass         = require('gulp-sass');
const sourcemaps   = require('gulp-sourcemaps');
const autoprefixer = require('gulp-autoprefixer');
const notify       = require('gulp-notify');
const rename       = require('gulp-rename');
const cleanCSS     = require('gulp-clean-css');
const plumber      = require('gulp-plumber');
const babel        = require('gulp-babel');
const uglify       = require('gulp-uglify');

// sass
const pathSCSS = './themes/hurvitz/assets/css/';
const pathJS   = './themes/hurvitz/assets/js/';

gulp.task('scss', function () {
	return gulp.src(pathSCSS + 'main.scss')
		.pipe(sourcemaps.init())
		.pipe(plumber())
		.pipe(sass({
			outputStyle: 'expanded',
			includePaths: ['node_modules'],
		})
			.on('error', function (err) {
				this.emit('end');
				return notify().write(err);
			}))
		.pipe(autoprefixer({
			browsers: ['> 5%', 'last 10 versions'],
			cascade: true,
		}))
		.pipe(cleanCSS({compatibility: 'ie8'}))
		.pipe(sourcemaps.write('.'))
		.pipe(gulp.dest(pathSCSS))
});

// uglify js
gulp.task('minify-js', function () {
	return gulp.src(pathJS + 'script.js')
		.pipe(sourcemaps.init())
		.pipe(babel({
			presets: ['@babel/env']
		}))
		.pipe(uglify())
		.pipe(rename({suffix: '.min'}))
		.pipe(sourcemaps.write('maps'))
		.pipe(gulp.dest(pathJS));
});

gulp.task('watch', function () {
	gulp.watch([pathSCSS + '*.scss', pathSCSS + '**/*.scss'], ['scss']);
	gulp.watch(pathJS + 'script.js', ['minify-js']);
});

gulp.task('default', ['watch']);
