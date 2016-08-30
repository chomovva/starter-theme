'use strict';

var gulp = require('gulp'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    autoprefixer = require('gulp-autoprefixer'),
    jade = require('gulp-jade'),
    plumber = require('gulp-plumber'),
    spritesmith = require('gulp.spritesmith'),      //сборка спрайтов
    rigger = require('gulp-rigger'),                //склеивает файлы с помощью //- filename
    uglify = require('gulp-uglify'),                //минифицырует js
    imagemin = require('gulp-imagemin'),            //оптимизация изображений
    cssmin = require('gulp-cssmin'),                //минификация css
    rename = require('gulp-rename');                         //переименование / добавление префикса min


//jade
gulp.task('jade', function (callback) {
  gulp.src('./src/jade/*.jade')
      .pipe(plumber())
      .pipe(jade({
        pretty: true,
      }))
      .pipe(gulp.dest('./build/'));
  callback();
});


//gulp-rigger - сборка и минификация js файлов
gulp.task('js', function (callback) {
    gulp.src('./src/scripts/main.js')
        .pipe(plumber())
        .pipe(rigger())
        .pipe(uglify())
        .pipe(gulp.dest('./build/scripts/'));
    callback();
});


//sass и autoprefixer
gulp.task('sass', function (callback) {
  return gulp.src('./src/sass/*.scss')
    .pipe(plumber())
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer({
      browsers: [
        'Chrome >= 35',
        'Firefox >= 8',
        'Edge >= 12',
        'Explorer >= 8',
        'iOS >= 8',
        'Safari >= 5',
        'Android 2.3',
        'Android >= 4',
        'Opera >= 12'
      ],
      cascade: true
    }))
    .pipe(sourcemaps.write('.', {
      includeContent: false,
      sourceRoot: 'source'
    }))
    .pipe(gulp.dest('./build/css'));
  callback();
});


//минификация css
gulp.task('cssmin', function(callback) {
    return gulp.src('./build/css/*.css')
        .pipe(cssmin())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('./build/css'));
});


//сборка спрайтов
gulp.task('icon', function(callback) {
    var spriteData = 
        gulp.src('./src/sprite/*.*')
            .pipe(plumber())
            .pipe(spritesmith({
                imgName: '../images/icon.png',
                cssName: '_icon.scss',
            }));
    spriteData.img.pipe(gulp.dest('./build/images/'));
    spriteData.css.pipe(gulp.dest('./src/sass/components/'));
    callback();
});


//оптимизация изображений
gulp.task('imagemin', function(callback) {
    gulp.src('./src/images/*')
        .pipe(plumber())
        .pipe(imagemin())
        .pipe(gulp.dest('./build/images'));
    callback();
});



gulp.task('watch', function () {
  gulp.watch('./src/sass/**/*.*', ['sass', 'cssmin']);
  gulp.watch('./src/jade/**/*.*', ['jade']);
  gulp.watch('./src/sprite/**/*.*', ['icon']);
  gulp.watch('./src/scripts/**/*.*', ['js']);
});

gulp.task('default', ['sass', 'jade', 'imagemin', 'watch']);
gulp.task('start-all', ['jade', 'sass', 'icon', 'js', 'imagemin', 'watch']);