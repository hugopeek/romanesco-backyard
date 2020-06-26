/*******************************
 *           Set-up
 *******************************/

const
    gulp = require('gulp'),

    // load yargs for reading command line arguments
    argv = require('yargs')
        .alias('c', 'key')
        .alias('t', 'task')
        .alias('d', 'dist')
        .describe('c', 'Provide the context_key of the context you want to build.')
        .describe('t', 'Choose which task to run. You can add separate flags for multiple tasks.')
        .describe('d', 'Path to context dist folder.')
        .choices('t', ['css', 'javascript', 'assets', 'custom', 'all'])
        .default('t','css','css')
        .default('d','','assets/semantic/dist/CONTEXT_KEY')
        .help('help')
        .argv,

    // set base paths
    basePath = __dirname.split("assets").shift(),
    basePathSemantic = basePath + 'assets/semantic/',

    // read user config to know what task to load
    config = require(basePathSemantic + 'tasks/config/user')
;


/*******************************
 *            Tasks
 *******************************/

// Default build tasks
require(basePathSemantic + 'tasks/collections/build')(gulp);


// Build theme for specific context
gulp.task('build-context', function (done) {
    let context = argv.key;
    let dist = argv.d;
    let task = argv.t;
    let tasks = [];

    // Set default path if needed
    if (!dist) dist = basePathSemantic + 'dist/' + context;

    // Ensure destination path has trailing /
    dist += dist.endsWith("/") ? "" : "/";

    // Set custom output paths
    config.paths.output.packaged = dist;
    config.paths.output.uncompressed = dist + 'components/';
    config.paths.output.compressed = dist + 'components/';
    config.paths.output.themes = dist + 'themes/';
    config.paths.output.clean = dist;

    // Create the correct build commands
    if (Array.isArray(task)) {
        task.forEach(function(item) {
            tasks.push('build-' + item);
        })
    } else if (task === 'all') {
        tasks.push('build');
    }
    else {
        tasks.push('build-' + task);
    }

    // Tasks for switching config files
    gulp.task('switch-config', function (switchDone) {
        gulp.src(basePathSemantic + 'src/theme.config').pipe(gulp.dest(basePathSemantic + 'src/tmp'));
        gulp.src(basePathSemantic + 'src/contexts/' + context + '/theme.config').pipe(gulp.dest(basePathSemantic + 'src/'));
        switchDone();
    })
    gulp.task('revert-switch', function (revertDone) {
        const clean = require('gulp-clean');
        gulp.src(basePathSemantic + 'src/tmp/theme.config').pipe(gulp.dest(basePathSemantic + 'src/'));
        gulp.src(basePathSemantic + 'src/tmp', {read: false}).pipe(clean({force: true}));
        revertDone();
    })

    // Exit on error
    if (!context) {
        console.error('Context not defined!');
        return false;
    }
    if (!tasks) {
        console.error('Task(s) not defined!');
        return false;
    }

    // Run in sequence
    console.info('Building Semantic');
    gulp.series('switch-config',tasks.join(','),'revert-switch')(done);
});
