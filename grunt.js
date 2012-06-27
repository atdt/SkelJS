/**
 * Definition of command-line tasks for use with Grunt, a task-based build
 * tool for JavaScript.
 * 
 * @file
 * @ingroup Extensions
 */

module.exports = function ( grunt ) {

    // -------
    // tasks
    //

    grunt.initConfig( {
        qunit  : { all: [ 'tests/**/*.html' ] },
        server : { port: 8000, base: '.' },
        lint   : { files: [ 'modules/**/*.js' ] },
        jshint : {
            options : {
                curly   : true,
                eqeqeq  : true,
                immed   : true,
                latedef : true,
                newcap  : true,
                noarg   : true,
                sub     : true,
                regexp  : true,
                undef   : true,
                eqnull  : true,
                browser : true,
            },
            globals : {
                mw        : true,
                mediaWiki : true,
                jQuery    : true,
            }
        },
    } );

    // When invoked without any command-line arguments, grunt will run qunit
    // tests and lint the code.
    grunt.registerTask( 'default', 'qunit lint' );

};
