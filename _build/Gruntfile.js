module.exports = function(grunt) {

    grunt.initConfig({
        "merge-json": {
            "default": {
                src: ['src/*.json','src/*/*.json','src/*/*/*.json'],
                dest: 'config.json'
            }
        },
        jsonlint: {
            all: {
                src: ['config.json'],
                options: {
                    format: true,
                    indent: 2
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-merge-json');
    grunt.loadNpmTasks('grunt-jsonlint');
    grunt.registerTask('default', ['merge-json', 'jsonlint']);
};
