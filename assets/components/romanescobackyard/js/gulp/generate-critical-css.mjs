/*******************************
 *           Set-up
 *******************************/

import gulp from 'gulp';
import {generate} from 'critical';
import yargs from 'yargs';

const argv = yargs(process.argv.slice(2)).options({
    src: {
        type: 'string',
        describe: 'Source URL',
        demandOption: true
    },
    dest: {
        type: 'string',
        describe: 'Absolute path to destination file',
        demandOption: true
    },
    cssPaths: {
        type: 'array',
        describe: 'Relative path(s) to source CSS files',
        demandOption: true
    },
    devMode: {
        type: 'boolean',
        describe: 'Enable this to accept self-signed SSL certificates',
        default: false
    },
    user: { type: 'string', describe: 'Fill in username/password to access pages behind htpasswd', default: 'empty' }, // Needs to return non-empty
    pass: { type: 'string', describe: 'Fill in username/password to access pages behind htpasswd', default: 'empty' }
}).parse();

// set base paths
const basePath = '/var/www/romanesco/nursery'; //__dirname.split("assets").shift();
const basePathSemantic = basePath + 'assets/semantic/';

/*******************************
 *            Tasks
 *******************************/

// Generate & inline critical-path CSS
gulp.task('critical', function (done) {
    let src = argv.src;
    let dest = argv.dest;
    let cssPaths = argv.cssPaths;
    let user = argv.user;
    let pass = argv.pass;
    let devMode = argv.devMode;

    // Allow unauthorized requests (from self-signed SSL certificates) in dev mode
    let rejectUnauthorized = true;
    if (devMode === true) {
        rejectUnauthorized = false
    }

    generate({
        base: basePath,
        rebase: asset => {
            if (asset.url[0] !== '/' && asset.url.slice(0,5) !== 'data:') {
                return `${asset.absolutePath}`;
            }
        },
        src: src,
        target: dest,
        css: cssPaths,
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
        },
        user: user,
        pass: pass
    }, done);
});