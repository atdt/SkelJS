<?php
/**
 * Hooks for SkelJS extension
 * 
 * @file
 * @ingroup Extensions
 */

class SkelJSHooks {

	public static $dir;

	/**
	 * globRelative
	 * 
	 * Searches for files matching pattern relative to the path of the SkelJS 
	 * extension
	 * 
	 * @param $pattern string glob pattern
	 */
	public static function globRelative( $pattern ) {
		$dirlen = strlen( self::$dir );
		$matches = glob( self::$dir . $pattern );
		foreach ( $matches as &$match ) {
			$match = substr( $match, $dirlen );
		}
		unset( $match );
		return $matches;
	}


	/**
	 * BeforePageDisplay hook
	 * 
	 * Adds the modules to the page
	 * 
	 * @param $out OutputPage output page
	 * @param $skin Skin current skin
	 */
	public static function beforePageDisplay( $out, $skin ) {
		$out->addJsConfigVars( array (
			"wgAnswer" => 42
		) );
		$out->addModules( 'ext.SkelJS' );
		return true;
	}

	/**
	 * ResourceLoaderTestModules hook handler.
	 * @param $testModules: array of javascript testing modules. 'qunit' is fed using tests/qunit/QUnitTestResources.php.
	 * @param $resourceLoader object
	 * @return bool
	 */
	public static function addTestModules( array &$testModules, ResourceLoader &$resourceLoader ) { 
		$testModules['qunit']['ext.SkelJS.tests'] = array(
			'scripts'       => 'tests/ext.SkelJS.tests.js',
			'dependencies'  => $wgResourceModules['ext.SkelJS']['scripts'],
			'localBasePath' => self::$dir,
			'remoteExtPath' => 'SkelJS'
		);
		return true;
	}

}

SkelJSHooks::$dir = dirname( __FILE__ );
