'use strict';
 
var gulp = require('gulp');
var sass = require('gulp-sass');
var cssmin = require('gulp-cssmin');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');
var livereload = require('gulp-livereload');
var htmlmin = require('gulp-htmlmin');
var minify = require('gulp-minify');// https://www.npmjs.com/package/gulp-minify
var connect = require('gulp-connect');
// var jshint = require('gulp-jshint');
 
gulp.task('sass', function () {
  return gulp.src('./src/sass/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(cssmin())
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('./build/css'))
    .pipe(livereload());
});
gulp.task('jsmin',function(){
  gulp.src(['./src/js/*.js'])
    // .pipe(jshint())
    // .pipe(jshint.reporter('default'))
    .pipe(minify({
        ext:{
            src:'.js',
            min:'.js'
        },
        // ignoreFiles: ['-min.js'],
        noSource:true
    }))
    .pipe(gulp.dest('build/js'))
});
gulp.task('htmlmin',function(){
  return gulp.src('./src/*.html')
    .pipe(htmlmin({collapseWhitespace: true}))
    .pipe(gulp.dest('.'))
    .pipe(livereload());
})
gulp.task('watch', function () {
  livereload.listen();
  gulp.watch('./sass/**/*.scss', ['sass','htmlmin']);
});
// gulp.task('server',function(){ 
//   connect.server({ 
//     //服务器的根目录 
//     root:'.', 
//     //启用实时刷新的功能 
//     livereload: true 
//   }); 
// });
gulp.task('browser-sync', function () { 
    var files = [ './src/**/*.html', 
    './src/sass/**/*.css', 
    './src/images/**/*.+(png|jpg)', 
    './src/js/**/*.js'
    ];
    browserSync.init(
      files,
      { server: 
        { baseDir: '.' }
      });
  });

gulp.task('build',['sass','jsmin','htmlmin']); 