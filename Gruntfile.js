module.exports = function (grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    // Concatenation
    concat: {
      dist: {
        src: [
          'js/bootstrap.js',
          'js/functions.js',
          'js/theme.js'
        ],
        dest: 'js/scripts.js'
      }
    },
    // Uglify
    uglify: {
      build: {
        src: 'js/scripts.js',
        dest: 'js/scripts.min.js'
      }
    },
    // Optimize images
    imagemin: {
      dynamic: {
        files: [{
          expand: true,
          cwd: 'images/',
          src: ['**/*.{png,jpg,gif}'],
          dest: 'images/build/'
        }]
      }
    },
    // SASS
    sass: {
      dist: {
        options: {
          trace: true,
          style: 'compressed',
          precision: 8
        },
        files: {
          'style.css': 'sass/style.scss'
        }
      }
    },
    // Autoprefixer
    autoprefixer: {
      dist: {
        files: {
          'style.css': 'style.css'
        }
      }
    },
    // Watch
    watch: {
      options: {
        livereload: true
      },
      php: {
        files: ['*.php', 'template=parts/*.php', 'inc/*.php', 'page-templates/*.php'],
        options: {
          spawn: false
        }
      },
      scripts: {
        files: ['js/*.js'],
        tasks: ['concat'],
        options: {
          spawn: false
        }
      },
      sass: {
        files: ['sass/*.scss', 'sass/theme/*.scss'],
        tasks: ['sass'],
        options: {
          spawn: false
        }
      },
      css: {
        files: ['style.css'],
        tasks: ['autoprefixer']
      }
    }
  })

  grunt.loadNpmTasks('grunt-contrib-concat')
  grunt.loadNpmTasks('grunt-contrib-uglify')
  grunt.loadNpmTasks('grunt-contrib-imagemin')
  grunt.loadNpmTasks('grunt-contrib-sass')
  grunt.loadNpmTasks('grunt-autoprefixer')
  grunt.loadNpmTasks('grunt-contrib-watch')
  // Register tasks
  grunt.registerTask('default', 'watch')
}
