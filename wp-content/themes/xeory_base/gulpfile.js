'use strivt'

// ディレクトリ
var path = {
  'sassPath': 'assets/styles',
  'jsPath': 'assets/script',
  'imgPath': 'assets/image',
  'cssBuildPath': 'dist/css',
  'jsBuildPath': 'dist/js',
  'imgBuildPath': 'dist/img',
}

// 使用パッケージ
var gulp = require('gulp');
var browserify = require('browserify');
var babelify   = require('babelify');
var source = require('vinyl-source-stream');
var sass = require('gulp-sass'); // Sassコンパイル
var postcss = require('gulp-postcss');
var cssnext = require('postcss-cssnext');//ベンダープレフィックス
var webserver = require('gulp-webserver'); // ローカルサーバ起動
var imagemin = require('gulp-imagemin'); // 画像圧縮
var pngquant = require('imagemin-pngquant'); // 画像圧縮
var plumber = require('gulp-plumber'); // コンパイルエラーが出てもwatchを止めない
var eslint = require('gulp-eslint'); //eslint処理


// jsをコンパイル
gulp.task('js', function(){
  browserify({
    entries: [path.jsPath + '/app.js']
  })
  .transform(babelify, {presets: ['es2015']})
  .bundle()
  .pipe(source('main.js'))
  .pipe(gulp.dest(path.jsBuildPath + '/'));
});

gulp.task('eslint', function(){
  return gulp.src([path.jsPath + '/**/*.js'])
    .pipe(eslint())
    .pipe(eslint.format())
    .pipe(eslint.failAfterError());
});

// Sassをコンパイルし、ベンダープレフィックスを付与
gulp.task('scss', function() {
  var processors = [
      cssnext()
  ];
  return gulp.src(path.sassPath + '/*.scss')
    .pipe(sass())
    .pipe(postcss(processors))
    .pipe(gulp.dest(path.cssBuildPath + '/'))
});

// 画像圧縮
gulp.task('imagemin', function(){
  gulp.src(path.imgPath + '/*')
    .pipe(plumber())
    .pipe(imagemin({
        progressive: true,
        svgoPlugins: [{removeViewBox: false}],
        use: [pngquant()]
    }))
    .pipe(gulp.dest(path.imgBuildPath));
});

// ファイル変更監視
gulp.task('watch', function() {
  gulp.watch(path.sassPath + '/**/*.scss', ['scss']);
  gulp.watch(path.jsPath + '/**/*.js',['js']);
});

// タスク実行
gulp.task('default', ['js','imagemin','scss','eslint','watch']); // デフォルト実行
