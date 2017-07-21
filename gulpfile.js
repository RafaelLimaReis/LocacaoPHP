const gulp = require('gulp');

const rename = require('gulp-rename');
const less = require('gulp-less');
const notify = require('gulp-notify');
const csso = require('gulp-csso');
const uglify = require('gulp-uglify');
const concat = require('gulp-concat');
const copy = require('gulp-copy');
const shell = require('gulp-shell');
const bro = require('gulp-bro');
const aliasify = require('aliasify');
const aliases = require('./aliases');
const eslintify = require('eslintify');
const babelify = require('babelify');
const stringify = require('stringify');
const plumber = require('gulp-plumber');
const sourcemaps = require('gulp-sourcemaps');

const argv = require('yargs').argv;
const LessPluginAutoPrefix = require('less-plugin-autoprefix');

const autoprefix = new LessPluginAutoPrefix({
  browsers: ['last 2 versions']
});

const lessPath = 'resources/assets/less';
const cssDest = 'public/css';

const jsPath = 'resources/assets/js/src';
const jsDest = 'public/js';

gulp.task('browserify', function() {
  let fileName = '';

  if (argv.app) {
    fileName = '/app.js';
  } else if(argv.admin) {
    fileName = '/admin.js';
  } else {
    console.log('Rotina front-end não encontrada!\n');
    return;
  }

  gulp.src(jsPath + fileName, {
    read: false
  })
    .pipe(shell('php artisan laroute:generate'))
    .pipe(bro({
      transform: [
        [eslintify, {'quiet-ignored': true}], babelify, stringify(['.html']), [aliasify, aliases]
      ],
      error: notify.onError('Error: <%= error.message %>')
    }))
    .pipe(plumber({
      errorHandler: notify.onError('Error: <%= error.message %>')
    }))
    .pipe(gulp.dest(jsDest))
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(sourcemaps.init({
      identityMap: true,
      loadMaps: true,
      debug: true
    }))
    .pipe(uglify())
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(jsDest))
    .pipe(notify('Build de javascript finalizada'));
});

gulp.task('css', function(){
   let src = '';

   if(argv.app){
      src = lessPath + '/app/app.less'
   }else if(argv.admin){
      src = lessPath + '/admin/admin.less'
   }else{
        console.log('LESS não encontrado.');
        return;
   }
   gulp.src(src)
        .pipe(less({
            plugins:[autoprefix]
        }))
        .pipe(gulp.dest(cssDest))
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(csso())
        .pipe(gulp.dest(cssDest))
        .pipe(notify('CSS finalizado com sucesso.'));
});

gulp.task('libs', function(){
  gulp.src([
      'node_modules/jquery/dist/jquery.js',
      'resources/assets/js/nifty.min.js',
      'node_modules/bootstrap/dist/js/bootstrap.js',
      'node_modules/selectize/dist/js/standalone/selectize.js'
    ])
    .pipe(concat('libs.js'))
    .pipe(gulp.dest(jsDest))
    .pipe(rename('libs.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest(jsDest))
    .pipe(notify('Libs finalizado!'));
});

gulp.task('watch', ['browserify', 'css', 'libs'], function() {
  gulp.watch(jsPath + '/**/*.js', ['browserify']);
  gulp.watch(lessPath + '/**/*.less', ['css']);
  gulp.watch(jsPath + '/libs.js', ['libs']);
});

gulp.task('copy', function() {
  gulp.src([
    'node_modules/bootstrap/fonts/*',
    'node_modules/font-awesome/fonts/*'
  ])
  .pipe(copy('public/assets/fonts', {
    prefix: 3
  }))
});
