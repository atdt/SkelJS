if ( typeof QUnit.newMwEnvironment !== 'undefined' ) {
	module( 'ext.SkelJS', QUnit.newMwEnvironment() );
}

// -------
// tests
//

test( 'Dummy test', function () {
    var x = 4;
    ok( x / 2 === 2 );
} );
