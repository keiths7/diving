'use strict';
 
var gulp = require('gulp');
var sass = require('gulp-sass');
var cssmin = require('gulp-cssmin');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');
// var livereload = require('gulp-livereload');
var htmlmin = require('gulp-htmlmin');
var minify = require('gulp-minify');// https://www.npmjs.com/package/gulp-minify
var connect = require('gulp-connect'); //https://www.npmjs.com/package/gulp-connect
// var jshint = require('gulp-jshint');
// var browserSync = require('browser-sync');   //http://www.browsersync.cn/docs/gulp/
 
gulp.task('sass', function () {
  return gulp.src('./src/sass/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(cssmin())
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('./build/css'))
    .pipe(connect.reload());
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
    .pipe(connect.reload())
});
gulp.task('htmlmin',function(){
  return gulp.src(['./src/demo.html','./src/demo2.html'])
    .pipe(htmlmin({collapseWhitespace: true}))
    .pipe(gulp.dest('./dest/'))
    .pipe(connect.reload());
})

// gulp.task('browser-sync', function () { 
//     var files = [
//     './*html',
//     './src/**/*.html', 
//     './src/sass/**/*.css', 
//     './src/images/**/*.+(png|jpg)', 
//     './src/js/**/*.js'
//     ];
//     browserSync.init(
//       files,
//       { server: 
//         { baseDir: '.' }
//       });
// });


//创建服务器并实现自动刷新有很多插件，比如gulp-livereload，browser-sync，gulp-connect

gulp.task('connect',function(){
  connect.server({
    name:'DEMO APP',
    root:['.'],
    port:8000,
    livereload:true
  })
})
gulp.task('watch',['sass','htmlmin'], function () {
  // livereload.listen(); //使用gulp-livereload时候才用
  gulp.watch('./src/sass/**/*.scss', ['sass']);
  var htmlWatcher = gulp.watch('./src/*.html',['htmlmin']);
  htmlWatcher.on('change',function(e){
      console.log('eventType:',e.type,';eventPath:',e.path);
  })
});

gulp.task('default',['connect','watch']);

gulp.task('build',['sass','jsmin','htmlmin']); 
