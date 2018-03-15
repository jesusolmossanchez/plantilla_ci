var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var cleanCSS = require('gulp-clean-css');
var jsonToSass = require('gulp-json-to-sass');
var jeditor = require("gulp-json-editor");
var sourcemaps = require('gulp-sourcemaps');


function minimiza_css() {
    gulp.src('assets/app/scss/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(cleanCSS())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./assets/app/css/'));
}

//Tarea que minimiza CSSs sin esperar a que se actualice la versión
gulp.task('styles', function() {
    minimiza_css();
});

//Tarea que minimiza CSSs esperando que se actualice versión y se pase a sass
gulp.task('styles-deploy', ['json-to-sass'], function() {
    minimiza_css();
});

gulp.task('deploy-js', ['json-to-sass'], function () {
	gulp.src(['assets/app/js/vendor/jquery-1.12.0.min.js', 'assets/app/css/vendor/bootstrap/js/bootstrap.min.js', 'assets/app/js/vendor/slick.min.js', 'assets/app/js/vendor/isotope.pkgd.min.js', 'assets/app/js/vendor/imagesloaded.pkgd.min.js', 'assets/app/js/vendor/jquery.swipebox.min.js', 'assets/app/js/plugins.js', 'assets/app/js/main.js'])
	  .pipe(concat('scripts-bottom-build.min.js'))
	  .pipe(uglify())
	  .pipe(gulp.dest('assets/app/dist-js/'));
});

 
gulp.task('update-version', function(cb) {
    return gulp.src('assets/app/json/config.json')
        .pipe(jeditor({
		    'version': Date.now()
		}))     
		.pipe(gulp.dest("assets/app/json/"));   
});
 
gulp.task('json-to-sass', ['update-version'], function(cb) {
    return gulp.src('assets/app/scss/**/*.scss')
    .pipe(jsonToSass({
        jsonPath: 'assets/app/json/config.json',
    	scssPath: 'assets/app/scss/_variables.scss'
    }));
});

//Watch task
gulp.task('default',function() {
    gulp.watch('assets/app/scss/**/*.scss',['styles']);
});



gulp.task('deploy', ['update-version', 'json-to-sass', 'styles-deploy', 'deploy-js']);
