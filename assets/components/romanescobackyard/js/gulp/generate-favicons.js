var
    realFavicon     = require ('gulp-real-favicon'),

    gulp            = require('gulp'),
    fs              = require('fs'),
    argv            = require('yargs').argv,

    // Set default variables
    projectName     = 'Romanesco',
    projectRoot     = __dirname.split("assets").shift(),
    masterPicture   = projectRoot + 'assets/img/badge.svg',
    backgroundColor = 'ffffff',
    primaryColor    = '698f73',
    secondaryColor  = '5f7ebe',

    // File where the favicon markups are stored
    FAVICON_DATA_FILE = projectRoot + 'assets/favicons/favicons.json'
;

// Fetch variables from command line input
if (argv.name) {
    var projectName = argv.name;
}
if (argv.root) {
    var projectRoot = argv.root;
}
if (argv.img) {
    var masterPicture = argv.img;
}
if (argv.bg) {
    var backgroundColor = argv.bg;
}
if (argv.primary) {
    var primaryColor = argv.primary;
}
if (argv.secondary) {
    var secondaryColor = argv.secondary;
}

// Generate the icons. This task takes a few seconds to complete.
// You should run it at least once to create the icons. Then,
// you should run it whenever RealFaviconGenerator updates its
// package (see the check-for-favicon-update task below).
gulp.task('generate-favicon', function(done) {
    realFavicon.generateFavicon({
        masterPicture: masterPicture,
        dest: projectRoot + 'assets/favicons',
        iconsPath: 'assets/favicons/',
        design: {
            ios: {
                pictureAspect: 'backgroundAndMargin',
                backgroundColor: '#' + backgroundColor,
                margin: '14%',
                assets: {
                    ios6AndPriorIcons: false,
                    ios7AndLaterIcons: false,
                    precomposedIcons: false,
                    declareOnlyDefaultIcon: true
                },
                appName: projectName
            },
            desktopBrowser: {},
            windows: {
                pictureAspect: 'whiteSilhouette',
                backgroundColor: '#' + primaryColor,
                onConflict: 'override',
                assets: {
                    windows80Ie10Tile: false,
                    windows10Ie11EdgeTiles: {
                        small: false,
                        medium: true,
                        big: false,
                        rectangle: false
                    }
                },
                appName: projectName
            },
            androidChrome: {
                pictureAspect: 'noChange',
                themeColor: '#' + backgroundColor,
                manifest: {
                    name: projectName,
                    display: 'standalone',
                    orientation: 'notSet',
                    onConflict: 'override',
                    declared: true
                },
                assets: {
                    legacyIcon: false,
                    lowResolutionIcons: false
                }
            },
            safariPinnedTab: {
                pictureAspect: 'silhouette',
                themeColor: '#' + secondaryColor
            }
        },
        settings: {
            compression: 1,
            scalingAlgorithm: 'Mitchell',
            errorOnImageTooSmall: false
        },
        markupFile: FAVICON_DATA_FILE
    }, function() {
        //done();
    });
    done();
});

// Inject the favicon markups in your HTML pages. You should run
// this task whenever you modify a page. You can keep this task
// as is or refactor your existing HTML pipeline.
gulp.task('inject-favicon-markups', function() {
    return gulp.src([ 'TODO: List of the HTML files where to inject favicon markups' ])
        .pipe(realFavicon.injectFaviconMarkups(JSON.parse(fs.readFileSync(FAVICON_DATA_FILE)).favicon.html_code))
        .pipe(gulp.dest('TODO: Path to the directory where to store the HTML files'));
});

// Check for updates on RealFaviconGenerator (think: Apple has just
// released a new Touch icon along with the latest version of iOS).
// Run this task from time to time. Ideally, make it part of your
// continuous integration system.
gulp.task('check-for-favicon-update', function(done) {
    var currentVersion = JSON.parse(fs.readFileSync(FAVICON_DATA_FILE)).version;
    realFavicon.checkForUpdates(currentVersion, function(err) {
        if (err) {
            throw err;
        }
    });
});

