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
        .pipe(gulp.dest('build/js'))
        .pipe(connect.reload());
}

var jsList=['src/js/*.js','!src/js/*.min.js','!src/js/iScroll.js','!src/js/datePick.js'];
var buildJsList=['build/js/*.js','!build/js/*.min.js'];

var buildEND = options.has('prd')?'md5:css':'imagemin';
var prdTasks = options.has('prd')&&options.has('open')?['connect','md5:css','md5:js','open']:['md5:css','md5:js']


//以下为dev环境下的任务
gulp.task('sass:dev',function () {
    return gulp.src('src/css/sass/*.scss')
                .pipe(sass().on('error', sass.logError))
                .pipe(gulp.dest('src/css'))
                // .pipe(gulp.dest('./build/css'))
                .pipe(connect.reload());
});
gulp.task('js:dev', function (done) {   
    return gulp.src(jsList)
                .pipe(babel())
                .pipe(gulp.dest('./build/js'))
});
gulp.task('jshint:dev',function(){
        gulp.src(jsList)
            .pipe(jshint())
            .pipe(jshint.reporter('default'))
})
gulp.task('html:dev', function (done) {
    
    return gulp.src(['./src/*.html'])
                // .pipe(fileinclude({ //用于在html文件中直接include文件
                //       prefix: '@@',
                //       basepath: '@file'
                // }))
                .pipe(gulp.dest('./src'))
                // .pipe(gulp.dest('./build/'))
                .pipe(connect.reload());
});
//公共任务
gulp.task('imagemin',['clean'], function (done) {
   return gulp.src('src/images/**/*.{png,jpg,gif,ico}')
                .pipe(cache(imagemin({  //加入缓存，只压缩有更改的
                    optimizationLevel: 5,
                    progressive:true,
                    use: [pngquant()] //使用pngquant深度压缩png图片的imagemin插件
                })))
                .pipe(gulp.dest('build/images'))
                // .pipe(gulp.dest('build/images'))
});
gulp.task('clean', function (done) {
   return  gulp.src(['build'])
                .pipe(clean());
});

/*
**  生产环境任务
*/
gulp.task('copy:css',['clean'],function(){
    return gulp.src('src/css/**/*')
                .pipe(gulp.dest('build/css/'));
})
gulp.task('sass',['copy:css'],function () {
    return gulp.src('build/css/sass/*.scss')
                .pipe(sass().on('error', sass.logError))
                .pipe(gulp.dest('build/css'))
});
//雪碧图操作，应该先拷贝图片并压缩合并css
gulp.task('sprite', ['imagemin','sass'], function (done) {
    var timestamp = +new Date();
    return  gulp.src(['build/css/**/*.css','!build/css/**/*.min.css'])
                .pipe(spriter({
                    spriteSheet: 'build/images/spritesheet' + timestamp + '.png',
                    pathToSpriteSheetFromCSS: '../images/spritesheet' + timestamp + '.png',
                    spritesmithOptions: {
                        padding: 10
                    }
                }))
                .pipe(base64())
                .pipe(cssmin())
                .pipe(gulp.dest('build/css'))
});
//将css加上10位md5，并修改html中的引用路径，该动作依赖sprite
gulp.task('md5:css', ['sprite','htmlmin'], function (done) {
    gulp.src('build/css/*.css')
        .pipe(md5(10, 'build/*.html'))
        .pipe(gulp.dest('build/css'))
        .on('end', done);
});
gulp.task('copy:js',['clean'],function(){
    return gulp.src('src/js/*')
                .pipe(gulp.dest('build/js'));
})  
gulp.task('jsmin',['copy:js'],function(){
    return gulp.src(buildJsList)
                .pipe(jshint())
                .pipe(jshint.reporter('default'))
                .pipe(babel())
                .pipe(uglify())
                .pipe(gulp.dest('build/js'))
});
//将js加上10位md5,并修改html中的引用路径，该动作依赖build-js
gulp.task('md5:js', ['jsmin','htmlmin'], function (done) {
    gulp.src('build/js/*.js')
        .pipe(md5(10, 'build/*.html'))
        .pipe(gulp.dest('build/js'))
        .on('end', done);
});

gulp.task('htmlmin',['clean'],function(){
  return gulp.src(['./src/*.html'])
    // .pipe(fileinclude({ //用于在html文件中直接include文件
    //       prefix: '@@',
    //       basepath: '@file'
    // }))
    // .pipe(htmlmin({collapseWhitespace: true}))
    .pipe(gulp.dest('build'))
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
  gulp.watch('./src/*.html',connect.reload);
});

gulp.task('dev',['connect','imagemin','html:dev','sass:dev','js:dev','watch','open'])

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