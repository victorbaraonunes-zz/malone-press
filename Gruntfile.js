
'use strict';

module.exports = function(grunt) {

    grunt.initConfig({

        pkg: grunt.file.readJSON('package.json'),
        banner: '/*! <%= pkg.name %> - v<%= pkg.version %> | ' +
                'last update: <%= grunt.template.today("yyyy-mm-dd") %> */',

        watch: {

            js: {
                files: ['src/js/*.js'],
                tasks: ['uglify','concat'],
                options: {
                    livereload: true,
                },
            },

            css: {
                files: ['src/css/*.styl'],
                tasks: ['stylus','cssmin'],
                options: {
                    livereload: true
                },
            },

            file: {
                files: ['**.php','**/**.php'],
                options: {
                    livereload: true
                },
            },

            img: {
                files: ['src/img/*'],
                tasks: ['copy:img'],
                options: {
                    livereload: true
                },
            },
        },

        stylus: {
            'bower_components/_temp/style.css': [
                'src/css/style.styl'
            ]
        },

        cssmin: {
            'assets/css/style.min.css': [
                //'bower_components/normalize.css/normalize.css',
                'bower_components/fancybox/source/jquery.fancybox.rewrited.css',
                'src/css/webfont.css',
                'bower_components/_temp/style.css'
            ]
        },

        uglify: {
            options: {
                mangle: false,
                preserveComments: false
            },
            target:
            {
                files: {
                    'bower_components/_temp/script.js': [
                        'bower_components/jquery-cycle/jquery.cycle.all.js',
                        'src/js/script.js',
                        'src/js/gmaps.js'
                    ]
                }
            }
        },

        concat: {
            options: {
                separator: ';',
                stripBanners: true
            },
            files: {
                src: [
                    'bower_components/jquery/jquery.min.js',
                    'bower_components/fancybox/source/jquery.fancybox.pack.js',
                    'bower_components/jquery-easing-original/jquery.easing.1.3.min.js',
                    'bower_components/html5shiv/dist/html5shiv.min.js',
                    'bower_components/updateyourbrowser/index.js',
                    'bower_components/_temp/script.js',
                ],
                dest: 'assets/js/script.min.js',
            },
        },

        clean: {
            assets: ["assets/*", "!assets/index.php"]
        },

        cssUrlRewrite: {
            dist: {
                src: "bower_components/fancybox/source/jquery.fancybox.css",
                dest: "bower_components/fancybox/source/jquery.fancybox.rewrited.css",
                options: {
                    skipExternal: true,
                    rewriteUrl: function(url, options, dataURI) {
                        var path = url.split('/').reverse();
                        return '../js/fancybox/'+path[0];
                    }
                }
            }
        },

        copy: {
            fancybox: {
                cwd: 'bower_components/fancybox/source',
                src: ['*.{png,jpg,gif}','helpers/*'],
                dest: 'assets/js/fancybox/',
                expand: true,
                dot: true
            },
            img: {
                cwd: 'src/img',
                src: ['*.{jpg,png,gif}','!_*.*'],
                dest: 'assets/img/',
                expand: true,
                dot: true
            },
            fonts: {
                cwd: 'src/fonts',
                src: ['*.{eot,svg,ttf,woff}'],
                dest: 'assets/fonts/',
                expand: true,
                dot: true
            },
            silence: {
                files: [
                    {
                        cwd: './assets',
                        src: ['index.php'],
                        dest: 'assets/img/',
                        expand: true,
                        dot: true
                    },
                    {
                        cwd: './assets',
                        src: ['index.php'],
                        dest: 'assets/css/',
                        expand: true,
                        dot: true
                    },
                    {
                        cwd: './assets',
                        src: ['index.php'],
                        dest: 'assets/js/',
                        expand: true,
                        dot: true
                    },
                    {
                        cwd: './assets',
                        src: ['index.php'],
                        dest: 'assets/fonts/',
                        expand: true,
                        dot: true
                    },
                ],
            expand: true,
                dot: true
            },
        },

        'ftp-deploy': {
            build: {
                auth: {
                    host: 'localhost',
                    port: 21,
                    authKey: 'key1'
                },
                src: '../../../',
                dest: '/',
                //src: './',
                //dest: '/www/wp-content/themes/**/',
                exclusions: [
                    'node_modules',
                    'bower_components',
                    'Gruntfile.js',
                    'bower.json',
                    'package.json',
                    '.ftppass',
                    '.gitignore',
                    '.git',
                    'src'
                ]
            }
        }


    });

    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-stylus');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-ftp-deploy');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks("grunt-css-url-rewrite");

    grunt.registerTask('default', ['clean','cssUrlRewrite','copy','stylus','cssmin','uglify','concat','watch']);
    grunt.registerTask('deploy', ['ftp-deploy']);

    require('time-grunt')(grunt);

};

