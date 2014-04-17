'use strict';
module.exports = function(grunt) {

  grunt.initConfig({

    watch: {
      js: {
        files: ['js/script.js','js/gmaps.js'],
        tasks: ['uglify','concat'],
        options: {
            livereload: true,
        },
      },
      css: {
        files: ['css/base.less','css/style.less'],
        tasks: ['less','cssmin'],
        options: {
            livereload: true
        },
      },
      file: {
        files: ['index.php','./*.php'],
        options: {
            livereload: true
        },
      }
    },

    less: {
      'css/style.min.css': ['css/base.less','css/style.less']
    },

     cssmin: {
      'css/style.min.css': ['css/webfont.css','css/style.min.css'],
      'js/lib/main.min.css': ['js/lib/jquery.fancybox.css']
    },

    uglify: {
      options: {
        mangle: false,
      },
      target: {
        files: {
        'js/script.min.js': ['js/jquery.cycle.js','js/jquery.easing.js','js/browser.js','js/html5.js','js/script.js','js/gmaps.js']
        }
      }
    },

    concat: {
      options: {
        separator: ';',
      },
      basic: {
        src: ['js/jquery-1.10.1.min.js','js/lib/jquery.fancybox.pack.js','js/lib/jquery.mousewheel-3.0.6.pack.js','js/script.min.js'],
        dest: 'js/script.min.js',
      },
    },

    'ftp-deploy': {
    build: {
      auth: {
        host: 'ftp.server.com.br',
        port: 21,
        authKey: 'key1'
      },
      src: './',
      dest: '/www/wp-content/themes/MalonePress/',
      exclusions: ['node_modules', 'Gruntfile.js', 'package.json','.ftppass']
      }
    }

});
 
grunt.loadNpmTasks('grunt-contrib-uglify');
grunt.loadNpmTasks('grunt-contrib-cssmin');
grunt.loadNpmTasks('grunt-contrib-less');
grunt.loadNpmTasks('grunt-contrib-concat');
grunt.loadNpmTasks('grunt-ftp-deploy');
grunt.loadNpmTasks('grunt-contrib-watch');

grunt.registerTask('default', ['watch']);
grunt.registerTask('deploy', ['ftp-deploy']);


};

