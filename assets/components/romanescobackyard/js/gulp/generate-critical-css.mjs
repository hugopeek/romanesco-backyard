/*******************************
 *           Set-up
 *******************************/

import gulp from 'gulp';
import {generate} from 'critical';
import yargs from 'yargs';

const argv = yargs(process.argv.slice(2)).options({
    src: { type: 'string', describe: 'Source URL', demandOption: true },
    dest: { type: 'string', describe: 'Absolute path to destination file', demandOption: true },
    basePath: { type: 'string', describe: 'Project root path', demandOption: true },
    cssPaths: { type: 'array', describe: 'Relative path(s) to source CSS files', demandOption: true },
    devMode: { type: 'boolean', describe: 'Enable this to accept self-signed SSL certificates', default: false },
    user: { type: 'string', describe: 'Fill in username/password to access pages behind htpasswd', default: 'empty' }, // Needs to return non-empty
    pass: { type: 'string', describe: 'Fill in username/password to access pages behind htpasswd', default: 'empty' },
}).parse();

/*******************************
 *            Tasks
 *******************************/

// Generate & inline critical-path CSS
gulp.task('critical', function (cb) {
    const src = argv.src;
    const dest = argv.dest;
    const basePath = argv.basePath;
    const cssPaths = argv.cssPaths;
    const user = argv.user;
    const pass = argv.pass;
    const devMode = argv.devMode;

    // Allow unauthorized requests (from self-signed SSL certificates) in dev mode
    let rejectUnauthorized = true;
    if (devMode === true) {
        rejectUnauthorized = false
    }

    // Make sure we're in the root folder
    process.chdir(basePath);

    generate({
        base: basePath,
        src: src,
        target: dest,
        css: cssPaths,
        ignore: {
            atrule: ['@inline']
        },
        rebase: asset => {
            if (asset.url[0] !== '/' && asset.url.slice(0,5) !== 'data:') {
                return `${asset.absolutePath}`;
            }
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
                width: 1920,
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
    }, cb);
});