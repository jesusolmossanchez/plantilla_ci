var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var cleanCSS = require('gulp-clean-css');
var sourcemaps = require('gulp-sourcemaps');

function minimiza_css_pro() {
    gulp.src('assets/app/scss/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(cleanCSS())
        .pipe(gulp.dest('./assets/app/css/'));
}

function minimiza_css_dev() {
    gulp.src('assets/app/scss/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(sourcemaps.write())
        .pipe(concat('styles_dev.css'))
        .pipe(gulp.dest('./assets/app/css/'));
}

//Tarea que minimiza CSSs sin esperar a que se actualice la versión
gulp.task('styles', function () {
    minimiza_css_dev();
});

//Tarea que minimiza CSSs esperando que se actualice versión y se pase a sass
gulp.task('styles-deploy', function () {
    minimiza_css_pro();
    minimiza_css_dev();
});


gulp.task('deploy-js', function () {
	gulp.src(['assets/app/js/vendor/jquery-1.12.0.min.js', 'assets/app/css/vendor/bootstrap/js/bootstrap.min.js', 'assets/app/js/vendor/slick.min.js', 'assets/app/js/vendor/isotope.pkgd.min.js', 'assets/app/js/vendor/imagesloaded.pkgd.min.js', 'assets/app/js/vendor/jquery.swipebox.min.js', 'assets/app/js/plugins.js', 'assets/app/js/main.js'])
	  .pipe(concat('scripts-bottom-build.min.js'))
	  .pipe(uglify())
	  .pipe(gulp.dest('assets/app/dist-js/'));
});

 
//Watch task
gulp.task('default',function() {
    gulp.watch('assets/app/scss/**/*.scss',['styles']);
});


gulp.task('deploy', ['styles-deploy', 'deploy-js']);
