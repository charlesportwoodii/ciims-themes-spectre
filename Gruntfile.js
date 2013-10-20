module.exports = function(grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        paths: {
            css : 'assets/css',
            ccss : 'assets/css/src'
        },
        concat: {
            css: {
                src: [
                    'assets/css/src/*'
                ],
                dest: '<%= paths.css %>/spectre.css'
            }
        },
        cssmin : {
            css:{
                src: '<%= paths.css %>/spectre.css',
                dest: '<%= paths.css %>/spectre.min.css'
            }
        },
        uglify: {
            js: {
                files: {
                    'assets/js/spectre.min.js' : ['assets/js/spectre.js']
                }
            }
        },
        watch: {
          files: ['<%= paths.ccss %>/*', 'assets/js/spectre.js'],
          tasks: ['concat', 'cssmin']
        },
    });

    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
     grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.registerTask('default', [ 'concat:css', 'cssmin:css', 'uglify:js' ]);
};
