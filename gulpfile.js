'use strict';

var gulp           = require( 'gulp' ),
    sass           = require( 'gulp-sass' ),             // sass / scss
    sourcemaps     = require( 'gulp-sourcemaps' ),       // мапы ( из какого исходника правило )
    autoprefixer   = require( 'gulp-autoprefixer' ),     // префиксы для старых браузеров
    pug            = require( 'gulp-pug' ),              // препроцессор html
    plumber        = require( 'gulp-plumber' ),          // выводит ошбку не прерывая работу gulp
    spritesmith    = require( 'gulp.spritesmith' ),      // сборка спрайтов
    rigger         = require( 'gulp-rigger' ),           // склеивает файлы с помощью //- filename
    uglify         = require( 'gulp-uglify' ),           // минифицырует js
    imagemin       = require( 'gulp-imagemin' ),         // оптимизация изображений
    cssmin         = require( 'gulp-cssmin' ),           // минификация css
    rename         = require( 'gulp-rename' );           // переименование / добавление префикса min


//pug - сборка html
gulp.task( 'pug', function( callback ) {
  gulp.src( './src/pug/*.pug' )
      .pipe( plumber() )
      .pipe( pug( {
        pretty: true,
      } ) )
      .pipe( gulp.dest( './build/' ) );
  callback();
});


//gulp-rigger - сборка и минификация js файлов
gulp.task( 'js', function (callback) {
    gulp.src('./src/scripts/main.js')
        .pipe( plumber() )
        .pipe( rigger() )
        .pipe( uglify() )
        .pipe( gulp.dest('./build/scripts/')) ;
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
    .pipe( gulp.dest('./build/css') );
  callback();
});


//минификация css
gulp.task( 'cssmin', function( callback ) {
    return gulp.src('./build/css/*.css')
        .pipe( cssmin() )
        .pipe( rename({suffix: '.min'}) )
        .pipe( gulp.dest('./build/css') );
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



gulp.task( 'watch', function () {
  gulp.watch( './src/sass/**/*.*', ['sass', 'cssmin'] );
  gulp.watch( './src/pug/**/*.*', ['pug'] );
  gulp.watch( './src/sprite/**/*.*', ['icon'] );
  gulp.watch( './src/scripts/**/*.*', ['js'] );
});

gulp.task('default', ['sass', 'pug', 'imagemin', 'watch']);