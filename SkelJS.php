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

$wgAutoloadClasses['SkelJSHooks'] = dirname( __FILE__ ) . '/SkelJS.hooks.php';

$wgExtensionMessagesFiles['SkelJS'] = dirname( __FILE__ ) . '/SkelJS.i18n.php';


// TODO: Preconfigure 'top' and 'bottom' module. 
// Cf http://www.mediawiki.org/wiki/ResourceLoader/Migration_guide_for_extension_developers#Inline_JavaScript

$wgResourceModules['ext.SkelJS'] = array(
				'scripts'       => SkelJSHooks::globRelative( '/modules/*.js' ),
				'localBasePath' => SkelJSHooks::$dir,
				'remoteExtPath' => 'SkelJS'
);


// -------
// Hooks
//

$wgHooks['BeforePageDisplay'][] = 'SkelJSHooks::beforePageDisplay';

$wgHooks['ResourceLoaderTestModules'][] = 'SkelJSHooks::addTestModules';

/* vim: set sw=8:ts=8:sts=0: */
