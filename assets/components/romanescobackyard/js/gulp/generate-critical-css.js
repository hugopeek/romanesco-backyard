/*******************************
 *           Set-up
 *******************************/

const
    gulp = require('gulp'),
    critical = require('critical'),

    // load yargs for reading command line arguments
    argv = require('yargs')
        .alias('s', 'src')
        .alias('d', 'dist')
        .describe('s', 'Source URL')
        .describe('d', 'Path to context dist folder')
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


// Generate & inline critical-path CSS
gulp.task('critical', function (done) {
    let src = argv.src;
    let dist = argv.dist;

    critical.generate({
        base: basePath,
        rebase: asset => {
            if (asset.url[0] !== '/') {
                return `${asset.absolutePath}`;
            }
        },
        src: src,
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
        css: [
            'assets/semantic/dist/semantic.css',
            'assets/css/site.css'
        ],
        target: dist,
        minify: true,
        ignore: {
            atrule: ['@inline']
        },
        penthouse: {
            forceInclude: ['.ui.popup']
        },
        request: {
            https: {
                rejectUnauthorized: false
            }
        }
    });

    done();
});