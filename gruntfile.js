module.exports = function(grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        sass: {
            dev: {
                options: {
                    quiet: true,
                    style: 'expanded'
                },
                files: {
                    'cap-overlay-style.css':'scss/cap-overlay.scss',
                }
            }
        }

    });

    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.registerTask('default', ['sass:dev']);
}
