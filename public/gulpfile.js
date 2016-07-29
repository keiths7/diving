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
var jshint = require('gulp-jshint');
var babel = require('gulp-babel');
var imagemin = require('gulp-imagemin');
var pngquant = require('imagemin-pngquant');
var cache = require('gulp-cache');
// var browserSync = require('browser-sync');   //http://www.browsersync.cn/docs/gulp/
var md5 = require('gulp-md5-plus'),
    os = require('os'),
    gutil = require('gulp-util'),
    fileinclude = require('gulp-file-include'),
    gulpOpen = require('gulp-open'),
    clean = require('gulp-clean'),
    spriter = require('gulp-css-spriter'),
    base64 = require('gulp-css-base64');
    // webpack = require('webpack'),
    // webpackConfig = require('./webpack.config.js');
var options = require('gulp-options');

var host = {  
    name:'localhost',
    path: '.',
    port: 3000,
    html: 'demo.html'
};
//mac chrome: "Google chrome", 
var browser = os.platform() === 'linux' ? 'Google chrome' : (
  os.platform() === 'darwin' ? 'Google chrome' : (
  os.platform() === 'win32' ? 'chrome' : 'firefox'));

var watchJS = function(path){
    gulp.src(path)
        .pipe(babel())
        .pipe(gulp.dest('dist/js'))
        .pipe(connect.reload());
}

var buildEND = options.has('prd')?'md5:css':'copy:images';
var prdTasks = options.has('prd')&&options.has('open')?['connect','htmlmin','md5:css','md5:js','open']:['htmlmin','md5:css','md5:js']


//以下为dev环境下的任务
gulp.task('copy:css', function () {
    return gulp.src('src/sass/**/*.scss')
                .pipe(sass().on('error', sass.logError))
                .pipe(gulp.dest('dist/css'))
                // .pipe(gulp.dest('./build/css'))
                .pipe(connect.reload());
});
gulp.task('copy:js', function (done) {
    
    return gulp.src(['src/js/*.js'])
                .pipe(babel())
                .pipe(gulp.dest('dist/js'))
                // .pipe(gulp.dest('./build/js'))
                // .pipe(connect.reload())
});
gulp.task('jshint',function(){
        gulp.src(['src/js/*.js','!src/js/*.min.js','!src/js/iScroll.js','!src/js/datePick.js'])
            .pipe(jshint())
            .pipe(jshint.reporter('default'))
})
gulp.task('copy:html', function (done) {
    
    return gulp.src(['./src/demo.html','./src/demo2.html'])
                // .pipe(fileinclude({ //用于在html文件中直接include文件
                //       prefix: '@@',
                //       basepath: '@file'
                // }))
                .pipe(gulp.dest('./dist/'))
                // .pipe(gulp.dest('./build/'))
                .pipe(connect.reload());
});
//以下为公共任务
gulp.task('copy:images', function (done) {
   return gulp.src('src/images/**/*.{png,jpg,gif,ico}')
                .pipe(cache(imagemin({  //加入缓存，只压缩有更改的
                    optimizationLevel: 5,
                    progressive:true,
                    use: [pngquant()] //使用pngquant深度压缩png图片的imagemin插件
                })))
                .pipe(gulp.dest('dist/images'))
                // .pipe(gulp.dest('build/images'))
});
gulp.task('clean', function (done) {
   return  gulp.src('dist')
                .pipe(clean());
});

//以下为prd环境用到的任务
gulp.task('sassmin',['clean'], function () {
    return gulp.src('src/sass/**/*.scss')
                .pipe(sass().on('error', sass.logError))
                .pipe(cssmin()) 
                .pipe(gulp.dest('dist/css'))
                // .pipe(gulp.dest('./build/css'))
});
//雪碧图操作，应该先拷贝图片并压缩合并css
gulp.task('sprite', ['copy:images', 'sassmin'], function (done) {
    var timestamp = +new Date();
    return  gulp.src('dist/css/demo.css')
                .pipe(spriter({
                    spriteSheet: 'dist/images/spritesheet' + timestamp + '.png',
                    pathToSpriteSheetFromCSS: '../images/spritesheet' + timestamp + '.png',
                    spritesmithOptions: {
                        padding: 10
                    }
                }))
                .pipe(base64())
                // .pipe(cssmin())
                .pipe(gulp.dest('dist/css'))
});
//将css加上10位md5，并修改html中的引用路径，该动作依赖sprite
gulp.task('md5:css', ['sprite'], function (done) {
    gulp.src('dist/css/*.css')
        .pipe(md5(10, 'dist/*.html'))
        .pipe(gulp.dest('dist/css'))
        .on('end', done);
});
gulp.task('jsmin',['clean'],function(){
    return gulp.src(['src/js/*.js'])
            .pipe(jshint())
            .pipe(jshint.reporter('default'))
            .pipe(minify({
                ext:{
                    src:'.js',
                    min:'.js'
                },
                // ignoreFiles: ['-min.js'],
                noSource:true
            }))
            // .pipe(gulp.dest('build/js'))
            .pipe(gulp.dest('dist/js'))

});
//将js加上10位md5,并修改html中的引用路径，该动作依赖build-js
gulp.task('md5:js', ['jsmin'], function (done) {
    gulp.src('dist/js/*.js')
        .pipe(md5(10, 'dist/*.html'))
        .pipe(gulp.dest('dist/js'))
        .on('end', done);
});

gulp.task('htmlmin',['clean'],function(){
  return gulp.src(['./src/demo.html','./src/demo2.html'])
    // .pipe(fileinclude({ //用于在html文件中直接include文件
    //       prefix: '@@',
    //       basepath: '@file'
    // }))
    .pipe(htmlmin({collapseWhitespace: true}))
    .pipe(gulp.dest('./dist/'))
})

//创建服务器并实现自动刷新有很多插件，比如gulp-livereload，browser-sync，gulp-connect
gulp.task('connect',function(){
  connect.server({
    name:'DEMO APP',
    root:host.path,
    port:host.port,
    livereload:true
  })
})

gulp.task('open',[buildEND],function (done) {
    gulp.src('')
        .pipe(gulpOpen({
            app: browser,
            uri: 'http://'+host.name+':'+host.port
        }))
        .on('end', done);
});

gulp.task('watch', function () {
  gulp.watch('./src/sass/**/*.scss', ['copy:css']);
  gulp.watch('./src/js/**/*.js',function(event){
        watchJS(event.path);
  });
  gulp.watch('./src/*.html',['copy:html']);
});

gulp.task('dev',['connect','copy:images','copy:html','copy:css','copy:js','watch','open'])

//gulp --prd  直接编译线上环境
//gulp --prd --open  编译线上环境并打开浏览器预览
gulp.task('default',prdTasks)

/* 使用webpack编译js文件*/
// var myDevConfig = Object.create(webpackConfig);
// var devCompiler = webpack(myDevConfig);
// //引用webpack对js进行操作
// gulp.task("build-js", ['fileinclude'], function(callback) {
//     devCompiler.run(function(err, stats) {
//         if(err) throw new gutil.PluginError("webpack:build-js", err);
//         gutil.log("[webpack:build-js]", stats.toString({
//             colors: true
//         }));
//         callback();
//     });
// });