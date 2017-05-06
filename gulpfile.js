var gulp = require('gulp') ;
var sass = require('gulp-sass') ;
var watch = require('gulp-watch') ;
var sourcemaps = require('gulp-sourcemaps') ;
var browserSync = require('browser-sync');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');
var combiner = require('stream-combiner2');


gulp.task('watch', function () {
        gulp.watch('./src/sass/child-styles/**.scss', ['childStyles']);
        gulp.watch('./src/sass/britanny.scss', ['defaultStyles']);
        gulp.watch('./src/js/**.js', ['scripts']);
});

gulp.task( 'defaultStyles', function() {

        return gulp.src('./src/sass/parent.scss')
                .pipe(sourcemaps.init())
                .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
                .pipe(sourcemaps.write('./maps'))
                .pipe(gulp.dest('./css'))
                .pipe(browserSync.stream()) ;
}) ;

gulp.task( 'childStyles', function() {

        return gulp.src('./src/sass/child-styles/**.scss')
                .pipe(sourcemaps.init())
                .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
                .pipe(sourcemaps.write('./maps'))
                .pipe(gulp.dest('./css'))
                .pipe(browserSync.stream()) ;

}) ;


gulp.task('scripts', function() {
        return gulp.src(['./src/js/modernizr-custom.js', './src/js/jquery.matchHeight.js', './src/js/main.js' ])
                .pipe(concat('lmlmusic.js'))
                .pipe(gulp.dest('./js'))
                .pipe(uglify())
                .pipe(rename('lmlmusic.min.js'))
                .pipe(gulp.dest('./js')) ;
});

gulp.task('serve', function() {
        browserSync({
                proxy : 'http://lmlmusic2.dev',
                open:   false
        });

        gulp.watch("./js/**").on('change', browserSync.reload);

});

gulp.task('default', ['defaultStyles','childStyles', 'scripts','watch', 'serve']) ;
