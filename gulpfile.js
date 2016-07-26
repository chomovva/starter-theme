'use strict';

var gulp = require('gulp'),
    compass = require('gulp-compass'),
    autoprefixer = require('gulp-autoprefixer'),
    jade = require('gulp-jade'),
    plumber = require('gulp-plumber');



gulp.task('compass', function() {
  gulp.src('./sass/*.scss')
    .pipe(plumber({
      errorHandler: function (error) {
        console.log(error.message);
        this.emit('end');
    }}))
    .pipe(compass({
      config_file: './config.rb',
      css: 'css',
      sass: 'sass'
    }));
});

gulp.task('autoprefixer', function () {
  return gulp.src('css/*.css')
    .pipe(autoprefixer({
        browsers: [
          'Chrome >= 35',
          'Firefox >= 8',
          'Edge >= 12',
          'Explorer >= 8',
          'iOS >= 8',
          'Safari >= 8',
          'Android 2.3',
          'Android >= 4',
          'Opera >= 12'
        ],
        cascade: false
    }))
    .pipe(gulp.dest('css'));
});

gulp.task('jade', function (callback) {
  gulp.src('jade/*.jade')
      .pipe(plumber())
      .pipe(jade({
        pretty: true,
      }))
      .pipe(gulp.dest('.'));
  callback();
});

gulp.task('watch', function () {
  gulp.watch('sass/**/*.*', ['compass']);
  gulp.watch('jade/**/*.*', ['jade']);
  gulp.watch('css/*.css', ['autoprefixer']);
});

gulp.task('default', ['jade', 'compass', 'autoprefixer', 'watch']);