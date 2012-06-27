<?php
/**
 * SkelJS Extension
 * 
 * @file
 * @ingroup Extensions
 * 
 * @author Ori Livneh <ori@wikimedia.org>
 * @license GPL v2 or later
 * @version 0.0.1
 */

$localBasePath = dirname( __FILE__ );

// -------
// Setup
//

$wgExtensionCredits['specialpage'][] = array(
        'path'           => __FILE__,
        'name'           => 'JavaScript-Driven MediaWiki Extension Skeleton',
        'version'        => '0.0.1',
        'url'            => 'https://www.mediawiki.org/wiki/Extension:SkelJS',
        'author'         => array( 'Ori Livneh' ),
        'descriptionmsg' => 'skeljs-desc',
);

$wgExtensionMessagesFiles['SkelJS'] = $localBasePath . '/SkelJS.i18n.php';

$wgResourceModules['ext.SkelJS'] = array(
        'scripts'       => glob( 'lib/*.js' ),
        'localBasePath' => $localBasePath,
        'remoteExtPath' => 'SkelJS'
);


// ---------
// Testing
//

$wgEnableJavaScriptTest = true;
$testModules['qunit']['SkelJS.tests'] = array(
        'scripts'       => glob( 'tests/*.test.js' ),
        'dependencies'  => $wgResourceModules['ext.SkelJS']['scripts'],
        'localBasePath' => $localBasePath,
        'remoteExtPath' => 'SkelJS'
);


// -------
// Hooks
//

$wgAutoloadClasses['SkelJSHooks'] = $localBasePath . '/SkelJS.hooks.php';
$wgHooks['BeforePageDisplay'][] = 'SkelJSHooks::beforePageDisplay';

/* vim: set sw=8:ts=8:sts=0: */
