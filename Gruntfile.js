module.exports = function(grunt) {

    // Register the NPM tasks we want
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-bower-task');

    // Register the tasks we want to run
    grunt.registerTask('default', [
        'bower:install',
        'copy:fontawesome',
        'concat:css',
        'concat:js',
        'cssmin:css'
    ]);

    grunt.registerTask('build', function() {
        grunt.task.run('default');
        grunt.task.run('uglify:js');
    });

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        paths: {
            assets: 'assets',
            bower: 'bower_components',
            lib: '<%= paths.assets %>/lib',
            css : '<%= paths.assets %>/css',
            js: '<%= paths.assets %>/js',
            dist: '<%= paths.assets %>/dist',
        },

        bower: {
          install: {
            options: {
              targetDir: "assets/lib"
            }
          }
        },

        copy: {
            fontawesome: {
                expand: true,
                flatten: true,
                src: "<%= paths.assets %>/lib/fontawesome/fonts/**",
                dest: "<%= paths.assets %>/fonts/"
            }
        },

        concat: {
            css: {
                src: [
                    '<%= paths.css %>/*',
                    '<%= paths.lib %>/fontawesome/css/font-awesome.min.css',
                    '<%= paths.lib %>/highlight.js/default.css',
                    '<%= paths.lib %>/*/*.css'
                ],
                dest: '<%= paths.dist %>/theme.css'
            },
            js : {
                src: [
                    '<%= paths.lib %>/pace/pace.min.js',
                    '<%= paths.lib %>/highlight.js/highlight.min.js',
                    '<%= paths.lib %>/pace/pace.min.js',
                    '<%= paths.bower %>/zxcvbn/zxcvbn/zxcvbn.js',
                    '<%= paths.js %>/*'
                ],
                dest: '<%= paths.dist %>/theme.js'
            }
        },
        cssmin : {
            css:{
                src: '<%= paths.dist %>/theme.css',
                dest: '<%= paths.dist %>/theme.min.css'
            }
        },
        uglify: {
            js: {
                files: {
                    '<%= paths.dist %>/theme.min.js' : ['<%= paths.dist %>/theme.js']
                }
            }
        },
        watch: {
          files: ['<%= paths.css %>/*', '<%= paths.js %>/*', '<%= paths.lib %>/*'],
          tasks: ['default']
        },
    });
};