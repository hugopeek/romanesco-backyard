var
    realFavicon     = require ('gulp-real-favicon'),

    gulp            = require('gulp'),
    fs              = require('fs'),
    argv            = require('yargs').argv,

    // Set variables
    projectName     = argv.name ? argv.name             : 'Romanesco',
    projectRoot     = argv.root ? argv.root             : __dirname.split("assets").shift(),
    relativePath    = argv.rel ? argv.rel               : 'assets/favicons/',
    distPath        = argv.dist ? argv.dist             : projectRoot + relativePath,
    masterPicture   = argv.img ? argv.img               : projectRoot + 'assets/img/badge.svg',
    backgroundColor = argv.bg ? argv.bg                 : 'ffffff',
    primaryColor    = argv.primary? argv.primary        : '698f73',
    secondaryColor  = argv.secondary ? argv.secondary   : '5f7ebe',

    // File where the result is stored
    FAVICON_DATA_FILE = distPath + 'favicons.json'
;

// Generate the icons. This task takes a few seconds to complete.
// You should run it at least once to create the icons. Then,
// you should run it whenever RealFaviconGenerator updates its
// package (see the check-for-favicon-update task below).
gulp.task('generate-favicon', function(done) {
    realFavicon.generateFavicon({
        masterPicture: masterPicture,
        dest: distPath,
        iconsPath: relativePath,
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
        done();
    });
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

