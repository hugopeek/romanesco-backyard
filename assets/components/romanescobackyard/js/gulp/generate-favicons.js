const
    realFavicon     = require ('@realfavicongenerator/gulp-real-favicon'),
    gulp            = require('gulp'),
    fs         = require('fs'),
    argv            = require('yargs').argv
;
let
    projectName     = argv.name ? argv.name             : 'Romanesco',
    projectRoot     = argv.root ? argv.root             : __dirname.split("assets").shift(),
    relativePath    = argv.rel ? argv.rel               : 'assets/favicons/',
    distPath        = argv.dist ? argv.dist             : projectRoot + relativePath,
    masterPicture   = argv.img ? argv.img               : projectRoot + 'assets/img/badge.svg',
    backgroundColor = argv.bg ? argv.bg                 : 'ffffff',
    primaryColor    = argv.primary? argv.primary        : '698f73',
    secondaryColor  = argv.secondary ? argv.secondary   : '5f7ebe'
;

// Ensure destination path has trailing /
distPath += distPath.endsWith("/") ? "" : "/";

// File where the result is stored
const FaviconDataFile = distPath + 'favicons.json';

// Generate the icons. This task takes a few seconds to complete.
// You should run it at least once to create the icons. Then,
//  you should run it whenever RealFaviconGenerator updates its
//  package (see the check-for-favicon-update task below).
gulp.task('generate-favicon', function(done) {
    realFavicon.generateFavicon({
        masterPicture: masterPicture,
        dest: distPath,
        iconsPath: relativePath,
        design: {
            "desktop": {
                "darkIconTransformation": {
                    "type": "none",
                    "backgroundColor": backgroundColor,
                    "backgroundRadius": 0.7,
                    "imageScale": 0.7,
                    "brightness": 1
                },
                "darkIconType": "none",
                "regularIconTransformation": {
                    "type": "none",
                    "backgroundColor": backgroundColor,
                    "backgroundRadius": 0.7,
                    "imageScale": 0.7,
                    "brightness": 1
                }
            },
            "touch": {
                "transformation": {
                    "type": "background",
                    "backgroundColor": backgroundColor,
                    "backgroundRadius": 0,
                    "imageScale": 0.7,
                    "brightness": 1
                },
                "appTitle": projectName,
            },
            "webAppManifest": {
                "transformation": {
                    "type": "background",
                    "backgroundColor": backgroundColor,
                    "backgroundRadius": 0,
                    "imageScale": 0.7,
                    "brightness": 1
                },
                "name": projectName,
                "shortName": projectName,
                "backgroundColor": backgroundColor,
                "themeColor": primaryColor
            }
        },
        markupFile: FaviconDataFile
    }, function() {
        done();
    });
});

// Inject the favicon markups in your HTML pages. You should run
// this task whenever you modify a page. You can keep this task
// as is or refactor your existing HTML pipeline.
gulp.task('inject-favicon-markups', function() {
    return gulp.src([ 'TODO: List of the HTML files where to inject favicon markups' ])
        .pipe(realFavicon.injectFaviconMarkups(JSON.parse(fs.readFileSync(FaviconDataFile)).favicon.html_code))
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

