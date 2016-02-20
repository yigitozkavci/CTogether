var gulp = require('gulp');
var rename = require('gulp-rename');
var sass = require('gulp-sass');
var notify = require('gulp-notify');
var autoprefix = require('gulp-autoprefixer');
var coffee = require('gulp-coffee');

gulp.task('sass', function() {
  return gulp.src('resources/assets/sass/*.scss')
    .pipe(sass())
    .pipe(autoprefix())
    .pipe(gulp.dest('public/assets/css'))
    .pipe(notify("Hello!"));
});

gulp.task('coffee', function() {
  gulp.src('resources/assets/coffee/*.coffee')
    .pipe(coffee({bare: true}))
    .pipe(gulp.dest('public/js'));
});

gulp.task('default', ['coffee', 'sass'])
gulp.task('watch', function() {
  gulp.watch('resources/assets/coffee/*.coffee', ['coffee<']);
  gulp.watch('resources/assets/sass/*.scss', ['sass']);
});
