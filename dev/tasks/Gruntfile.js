/* Generated for New Theme */
module.exports = function (grunt) {
  require("matchdep").filterDev("grunt-*").forEach(grunt.loadNpmTasks);
  // 1. All configuration goes here
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    //watch
    watch: {
      css: {
        files: '../src/scss/**/*.scss',
        tasks: ['sass:dev', 'autoprefixer', 'notify:sassDone'],
        options: {
          livereload: true,
        },
      },
      js: {
        files: '../src/js/**/*.js',
        tasks: ['copy:js'],
        options: {
          livereload: true,
        },
      },
      php: {
        files: '../../**/*.php',
        options: {
          livereload: true,
        },
      },
      images: {
        files: '../src/images/**/*.{png,jpg,gif,svg}',
        tasks: ['copy:images'],
        options: {
          livereload: true,
        },
      },
      fonts: {
        files: '../src/fonts/**/*',
        tasks: ['copy:fonts'],
        options: {
          livereload: true,
        },
      },
    },
    // end watch
    //sass
    sass: { // Task
      dev: { // Target
        options: { // Target options
          style: 'expanded'
        },
        files: { // Dictionary of files
          '../../static/css/style.css': '../src/scss/style.scss'
        }
      },
      dist: { // Target
        options: { // Target options
          style: 'expanded'
        },
        files: { // Dictionary of files
          '../../static/css/style.css': '../src/scss/style.scss',
        }
      }
    },
    // end sass

    // webfont
    webfont: {
      icons: {
        src: '../src/images/icons/yellow/*.svg',
        dest: '../src/fonts/',
        options: {
          stylesheet: 'scss',
          relativeFontPath: '../fonts/'
        }
      }
    },
    // end webfont

    //auto prefixer
    autoprefixer: {
      options: {
        browsers: ['last 8 version', 'ie 8', 'ie 7']
      },
      // just prefix the specified file
      single_file: {
        options: {
          // Target-specific options go here.
        },
        src: '../../static/css/style.css',
        dest: '../../static/css/style.css'
      }
    },
    //end auto prefixer
    //css min
    cssmin: {
      minify: {
        expand: true,
        cwd: '../../static/css',
        src: ['*.css', '!*.min.css'],
        dest: '../../static/css',
        ext: '.css',
        report: 'gzip'
      }
    },
    // end ccs min

    uglify: {
      js: {
        options: {
          sourceMap: false
          // sourceMapName: ''
        },
        files: {
          '../../static/js/bootstrap.js': ['../../static/js/bootstrap.js'],
          '../../static/js/jquery.js': ['../../static/js/jquery.js'],
          '../../static/js/modernizr.js': ['../../static/js/modernizr.js']
        }
      }
    },

    //notify
    notify: {
      done: {
        options: {
          title: 'Done!', // optional
          message: 'Whatever you were doing is done!', //required
        }
      },
      distStart: {
        options: {
          title: ' Prepping for distribution!', // optional
          message: 'Get ready for the awesome...', //required
        }
      },
      distDone: {
        options: {
          title: "All packaged up!", // optional
          message: "New Theme is ready to be distributed ", //needed escaping!
        }
      },
      sassDone: {
        options: {
          title: ' Ta-da!!!', // optional
          message: 'Sass has compiled successfully ', //required
        }
      },
      initStart: {
        options: {
          title: 'Initializing project', // optional
          message: '...', //required
        }
      },
      initDone: {
        options: {
          title: 'Initialization done!', // optional
          message: 'Run : "grunt watch" and get to work!', //required
        }
      },
    },
    //endnotify
    //Bower copy
    bowercopy: {
      libs: {
        options: {
            destPrefix: '../../static'
        },
        files: {
          'js/modernizr.js': 'modernizr/modernizr.js',
          'js/jquery.js': 'jquery/jquery.js',
          'css/bootstrap.css': 'bootstrap/dist/css/bootstrap.css',
          'fonts/glyphicons-halflings-regular.eot': 'bootstrap/dist/fonts/glyphicons-halflings-regular.eot',
          'fonts/glyphicons-halflings-regular.svg': 'bootstrap/dist/fonts/glyphicons-halflings-regular.svg',
          'fonts/glyphicons-halflings-regular.ttf': 'bootstrap/dist/fonts/glyphicons-halflings-regular.ttf',
          'fonts/glyphicons-halflings-regular.woff': 'bootstrap/dist/fonts/glyphicons-halflings-regular.woff',
          'js/bootstrap.js': 'bootstrap/dist/js/bootstrap.js'
        }
      }
    },
    //end Bower copy
    //copy
    copy: {
      js: {
        files: [
          // includes files within path
          {expand: true, cwd: '../src/js', src: ['*.js'], dest: '../../static/js', filter: 'isFile'},
        ]
      },
      images: {
        files: [
          // includes files within path
          {expand: true, cwd: '../src/images', src: ['**/*.{png,jpg,gif,svg}'], dest: '../../static/images', filter: 'isFile'},
        ]
      },
      fonts: {
        files: [
          // includes files within path
          {expand: true, cwd: '../src/fonts', src: ['**/*.eot', '**/*.svg', '**/*.ttf', '**/*.woff'], dest: '../../static/fonts', filter: 'isFile'},
        ]
      }
    },
    //end copy


    //Image min
    imagemin: {
      dynamic: {
        options: {
          optimizationLevel: 0
        },
        files: [{
          expand: true,
          src: ['../../static/images/**/*.{png,jpg,gif}'],
          dest: '../../static/images'
        }]
      }
    },
    //end image min

    // extract pot files & generate .mo
    pot: {
      options:{
        text_domain: 'littlebluebag', //Your text domain. Produces my-text-domain.pot
        dest: '../../languages/', //directory to place the pot file
        keywords: [ //WordPress localisation functions
          '__:1',
          '_e:1',
          '_x:1,2c',
          'esc_html__:1',
          'esc_html_e:1',
          'esc_html_x:1,2c',
          'esc_attr__:1',
          'esc_attr_e:1',
          'esc_attr_x:1,2c',
          '_ex:1,2c',
          '_n:1,2',
          '_nx:1,2,4c',
          '_n_noop:1,2',
          '_nx_noop:1,2,3c'
        ],
      },
      files:{
        src:  [ '../../**/*.php' ], //Parse all php files
        expand: true
      }
    },
    po2mo: {
      files: {
        src: '../../languages/*.po',
        expand: true
      }
    },
    // end pot

    // make a zipfile
    compress: {
      production: {
        options: {
          archive: '../../production/littlebluebag.zip'
        },
        files: [
          {
            cwd: '../..',
            src: ['**',  '!dev/**', '!production/**'],
            dest: 'littlebluebag/',
            expand: true
          },
        ]
      }
    }
    // end make a zipfile
    
  }); //end grunt package configs
  
  //Asset pipelines
  grunt.registerTask('prepJS',     [ 'copy:js' ]);
  grunt.registerTask('prepStyles', [ 'sass:dist', 'autoprefixer', 'cssmin' ]);
  grunt.registerTask('prepImages', [ 'copy:images']); // , 'imagemin:dynamic' ]);
  grunt.registerTask('prepFonts',  [ 'copy:fonts' ]);

  //RUN ON START
  grunt.registerTask('init',       ['notify:initStart', 'webfont:icons', 'bowercopy', 'copy:js', 'copy:images', 'sass:dev', 'prepFonts', 'notify:initDone']);

  //RUN FOR PRODUCTION 
  grunt.registerTask('prod',       ['notify:distStart', 'webfont:icons', 'bowercopy', 'prepJS','prepImages', 'prepStyles', 'prepFonts', 'uglify:js', 'compress:production', 'notify:distDone']);
  
  //DEFAULT
  grunt.registerTask('default', []);
};
