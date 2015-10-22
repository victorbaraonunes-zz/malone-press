var gulp = require('gulp')
	, stylus = require('gulp-stylus')
	, koutoSwiss = require('kouto-swiss')
	, prefixer = require('autoprefixer-stylus')
	, jeet = require('jeet')
	, rupture = require('rupture')
	, imagemin = require('gulp-imagemin')
	, concat = require('gulp-concat')
	, uglify = require('gulp-uglify')
	, sourcemaps = require('gulp-sourcemaps');

var src = './src'
	, dist = './assets';

var scripts = [
	src + '/js/gmaps.js'
	, src + '/js/scripts.js'
	, src + '/vendors/jquery/dist/jquery.min.js'
	, src + '/vendors/jquery-cycle2/build/jquery.cycle2.min.js'
];

// compile all .styl file and generate main.css

gulp.task('css', function() {
	return gulp.src(src + '/css/main.styl')
		.pipe(sourcemaps.init())
		.pipe(stylus({
			use: [koutoSwiss(), prefixer(), jeet(), rupture()]
			, compress: true
			, 'include css': true
		}))
		.pipe(sourcemaps.write('.'))
		.pipe(gulp.dest(dist + '/css'));
});

// concat all .js files into main.js

gulp.task('js', function() {
	return gulp.src(scripts)
		.pipe(concat('main.js'))
		.pipe(uglify())
		.pipe(gulp.dest(dist + '/js'));
});

// minify theme images

gulp.task('imagemin', function() {
	return gulp.src(src + '/img/**/*.{jpg,png,gif}')
		.pipe(imagemin({
			optimizationLevel: 3
			, progressive: true
			, interlaced: true
		}))
		.pipe(gulp.dest(dist + '/img'));
});

gulp.task('default', ['css', 'js', 'imagemin'], function() {
	gulp.watch(src + '/css/**/*.styl', ['css']);
	gulp.watch(src + '/js/**/*.js', ['js']);
	gulp.watch(src + '/img/**/*.{jpg,png,gif}', ['imagemin']);

	console.log('I\'m watching you!');
});
