var gulp = require('gulp');
var notify = require('gulp-notify');
var stylus = require('gulp-stylus');

var include_paths = [
    'node_modules/@creativecommons/vocabulary/styl',
    './styl'
];

gulp.task('stylus', function() {
    return gulp.src('./styl/styles.styl')
        .pipe(stylus({
            'include css': true,
            compress: true,
            paths: include_paths
        }))
        .pipe(gulp.dest('../assets/css/'))
        .pipe(notify("Stylus was compiled correctly!"));
})
// gulp.task('stylus', gulp.series( stylus ) );

gulp.task('watch', function(done) { 
    gulp.watch('./styl/*.styl', gulp.parallel('stylus'));
});

gulp.task('default', gulp.parallel('watch') );