module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    sass: { 
      options: {
        includePaths: ['bower_components/foundation/scss']
      },
      dev: {            
        options: {                      
          style: 'expanded',
          sourcemap: 'auto',
        },
        files: {                                  
          'css/app.css': 'scss/app.scss'
        }
      },
      dist: {
        options: {               
          style: 'compressed',
          sourcemap: 'none',
        },
        files: {                                  
          'css/app.css': 'scss/app.scss'
        }
      }
    },


    postcss: {
      options: {
        processors: [
          require('pixrem')(), // add fallbacks for rem units
          require('autoprefixer')({browsers: 'last 8 versions'}), // add vendor prefixes
          require('cssnano')() // minify the result
        ]
      },
      dev: {
        src: 'css/*.css',
        options: {
          map: true,

          processors: [
            require('pixrem')(), // add fallbacks for rem units
            require('autoprefixer')({browsers: 'last 8 versions'}), // add vendor prefixes
          ]
        }
      },
      dist: {
        src: 'css/*.css',
        options: {
          map: {
            inline: false, // save all sourcemaps as separate files...
            annotation: 'css/maps/' // ...to the specified directory
         },
         processors: [
            require('pixrem')(), // add fallbacks for rem units
            require('autoprefixer')({browsers: 'last 8 versions'}), // add vendor prefixes
            require('cssnano')() // minify the result
          ]
        }
      }
    },

    // criticalcss: {
    //   custom: {
    //     options: {
    //       url: "http://localhost:8888/fully-flared-wp4-startup/",
    //       width: 1200,
    //       height: 900,
    //       outputfile: "css/critical.css",
    //       filename: "css/app.css", // Using path.resolve( path.join( ... ) ) is a good idea here
    //       buffer: 800*1024,
    //       ignoreConsole: false
    //     }
    //   }
    // },

    copy: {
      scripts: {
        expand: true,
        cwd: 'bower_components/',
        src: '**/*.js',
        dest: 'js'
      },

      maps: {
        expand: true,
        cwd: 'bower_components/',
        src: '**/*.map',
        dest: 'js'
      }
    },

    uglify: {
      dist: {
        files: {
          'js/modernizr/modernizr.min.js': ['js/modernizr/modernizr.js']
        }
      }
    },

    concat: {
      options: {
        separator: ';'
      },
      dist: {
        src: [
          'js/foundation/js/foundation.min.js',
          'js/custom/*.js'
        ],

        dest: 'js/app.js'
      }

    },

    watch: {
      grunt: { files: ['Gruntfile.js', '*.php'] },

      options: {
        livereload: true,
      },

      sass: {
        files: 'scss/**/*.scss',
        tasks: ['sass:dev', 'postcss:dev']
      },

      scripts: {
        files: ['js/custom/*.js'],
        tasks: ['concat'],
        options: {
          spawn: false,
        },
      }
    }
  });

  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-postcss');
  // grunt.loadNpmTasks('grunt-criticalcss');

  //Deploy/distribution: $ grunt dist
  // grunt.registerTask('dist', ['sass:dist', 'postcss:dist', 'concat', 'uglify', 'criticalcss']);
  grunt.registerTask('dist', ['sass:dist', 'postcss:dist', 'concat', 'uglify', 'criticalcss']);

  //Development: $ grunt
  grunt.registerTask('default', ['sass:dev', 'postcss:dev', 'concat', 'watch']); 

}