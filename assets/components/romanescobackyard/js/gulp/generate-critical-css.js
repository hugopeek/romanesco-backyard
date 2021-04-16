/*******************************
 *           Set-up
 *******************************/

const
    gulp = require('gulp'),
    critical = require('critical'),

    // load yargs for reading command line arguments
    argv = require('yargs')
        .option('src', {
            demandOption: true,
            describe: 'Source URL',
            type: 'string'
        })
        .option('dest', {
            demandOption: true,
            describe: 'Absolute path to destination file',
            type: 'string'
        })
        .option('cssPaths', {
            demandOption: true,
            describe: 'Relative path(s) to source CSS files',
            type: 'array'
        })
        .option('devMode', {
            describe: 'Enable this to accept self-signed SSL certificates',
            type: 'boolean'
        })
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


// Generate & inline critical-path CSS
gulp.task('critical', function (done) {
    let src = argv.src;
    let dest = argv.dest;
    let cssPaths = argv.cssPaths;
    let devMode = argv.devMode;

    // Allow unauthorized requests (from self-signed SSL certificates) in dev mode
    let rejectUnauthorized = true;
    if (devMode === true) {
        rejectUnauthorized = false
    }

    critical.generate({
        base: basePath,
        rebase: asset => {
            if (asset.url[0] !== '/' && asset.url.slice(0,5) !== 'data:') {
                return `${asset.absolutePath}`;
            }
        },
        src: src,
        target: dest,
        css: cssPaths,
        minify: true,
        ignore: {
            atrule: ['@inline']
        },
        penthouse: {
            forceInclude: ['.ui.popup']
        },
        dimensions: [
            {
                width: 320,
                height: 640
            },{
                width: 800,
                height: 600
            },{
                width: 1600,
                height: 1200
            }
        ],
        request: {
            https: {
                rejectUnauthorized: rejectUnauthorized
            }
        }
    }, done);
});