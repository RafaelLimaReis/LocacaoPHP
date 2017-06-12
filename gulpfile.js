const gulp = require('gulp');
const notify = require('gulp-notify');
const less = require('gulp-less');
const rename = require('gulp-rename');
const argv = require('yargs').argv;
const csso = require('gulp-csso');
const LessPluginAutoPrefix = require('less-plugin-autoprefix');


const lessPatch = 'resources/assets/less/';
const cssDest = 'public/css/';

const autoprefix = new LessPluginAutoPrefix({
  browsers: ['last 2 versions']
});

gulp.task('css', function(){
    let src = '';
    if(argv.app){
        src = lessPatch + 'app/app.less';
    } else if(argv.admin){
        src = lessPatch + 'admin/admin.less';
    }else{
        console.log('Front NÃO encontrado!');
        return;
    }

    gulp.src(src)
        .pipe(less({
            plugins: [autoprefix]
        }))
        .pipe(gulp.dest(cssDest))
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(csso())
        .pipe(gulp.dest(cssDest))
        .pipe(notify('Build de CSS finalizada!'));
});