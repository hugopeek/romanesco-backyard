/*******************************
 *           Set-up
 *******************************/

const
    gulp = require('gulp'),

    // load yargs for reading command line arguments
    argv = require('yargs')
        .alias('p', 'path')
        .describe('p', 'Path to CSS folder (relative to site root, or absolute).')
        .default('p','assets/css/')
        .help('help')
        .argv,

    // set base paths
    basePath = __dirname.split("assets").shift(),
    basePathSemantic = basePath + 'assets/semantic/'
;


/*******************************
 *            Tasks
 *******************************/

// Default build tasks
require(basePathSemantic + 'tasks/collections/build')(gulp);


// Minify CSS in specific folder
gulp.task('minify-css', function (done) {
    const minify = require('gulp-clean-css');
    const rename = require('gulp-rename');
    const cssPath = argv.p;

    // Set working directory to project root
    process.chdir(basePath);

    gulp.src(['*.css','!*.min.css'],{cwd: cssPath})
        .pipe(minify({inline: ['local', 'remote', '!fonts.googleapis.com']}))
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(cssPath))
    ;
    done();
});
