const gulp = require('gulp');

const rename = require('gulp-rename');
const less = require('gulp-less');
const notify = require('gulp-notify');
const csso = require('gulp-csso');
const uglify = require('gulp-uglify');
const concat = require('gulp-concat');

const argv = require('yargs').argv;
const LessPluginAutoPrefix = require('less-plugin-autoprefix');

const autoprefix = new LessPluginAutoPrefix({
  browsers: ['last 2 versions']
});

const lessPatch = 'resources/assets/less';
const cssDest = 'public/css';

const jsDest = 'public/js';

gulp.task('css', function(){
   let src = '';

   if(argv.app){
        src = lessPatch + '/app/app.less'
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
      'node_modules/admin-lte/dist/js/app.js',
      'node_modules/bootstrap/dist/js/bootstrap.js',
    ])
    .pipe(concat('libs.js'))
    .pipe(gulp.dest(jsDest))
    .pipe(rename('libs.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest(jsDest))
    .pipe(notify('Libs finalizado!'));
});