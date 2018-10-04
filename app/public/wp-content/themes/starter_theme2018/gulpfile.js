require('es6-promise').polyfill();

var gulp = require('gulp');

// default task
gulp.task('default');

require('es6-promise').polyfill();
var gulp          = require('gulp');
var sass          = require('gulp-sass');
var autoprefixer  = require('gulp-autoprefixer');

gulp.task('sass', function() {
  return gulp.src('./sass/**/*.scss')
  .pipe(sass())
  .pipe(autoprefixer())
  .pipe(gulp.dest('./'))
});

gulp.task('default', ['sass']);

var rtlcss       = require('gulp-rtlcss');
var rename       = require('gulp-rename');

gulp.task('sass', function() {
  return gulp.src('./sass/*.scss')
  .pipe(sass())
  .pipe(autoprefixer())
  .pipe(gulp.dest('./'))              // Output LTR stylesheets (style.css)

  .pipe(rtlcss())                     // Convert to RTL
  .pipe(rename({ basename: 'rtl' }))  // Rename to rtl.css
  .pipe(gulp.dest('./'));             // Output RTL stylesheets (rtl.css)
});

gulp.task('watch', function() {
  gulp.watch('./sass/**/*.scss', ['sass']);
});

gulp.task('default', ['sass', 'watch']);

// Plumber tasks

var plumber = require('gulp-plumber');
var gutil = require('gulp-util');

var onError = function (err) {
  console.log('An error occurred:', gutil.colors.magenta(err.message));
  gutil.beep();
  this.emit('end');
};

gulp.task('sass', function() {
  return gulp.src('./sass/*.scss')
  .pipe(plumber({ errorHandler: onError }))
  //
  //
});

var concat = require('gulp-concat');
var jshint = require('gulp-jshint');
var uglify = require('gulp-uglify');

gulp.task('js', function() {
  return gulp.src(['./js/*.js'])
    .pipe(jshint())
    .pipe(jshint.reporter('default'))
    .pipe(concat('app.js'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest('./js'))
});

//watch changes to any js file
gulp.task('watch', function() {
  gulp.watch('./sass/**/*.scss', ['sass']);
  gulp.watch('./js/*.js', ['js']);
});

gulp.task('default', ['sass', 'js', 'watch']);

var imagemin = require('gulp-imagemin');

gulp.task('images', function() {
  return gulp.src('./images/src/*')
    .pipe(plumber({errorHandler: onError}))
    .pipe(imagemin({optimizationLevel: 7, progressive: true}))
    .pipe(gulp.dest('./images/dist'));
});

var browserSync = require('browser-sync').create();
var reload = browserSync.reload;

gulp.task('watch', function() {
  browserSync.init({
    files: ['./**/*.php'],
    proxy: 'starter2018.local',
  });
  gulp.watch('./sass/**/*.scss', ['sass', reload]);
  gulp.watch('./js/*.js', ['js', reload]);
  gulp.watch('images/src/*', ['images', reload]);
});
