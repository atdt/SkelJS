<?php
/**
 * Hooks for SkelJS extension
 * 
 * @file
 * @ingroup Extensions
 */

class SkelJSHooks {

        /**
         * BeforePageDisplay hook
         * 
         * Adds the modules to the page
         * 
         * @param $out OutputPage output page
         * @param $skin Skin current skin
         */
        public static function beforePageDisplay( $out, $skin ) {
                $out->addModules( 'ext.SkelJS' );
                return true;
        }

        /**
         * ResourceLoaderGetConfigVars hook
         * 
         * Adds enabled/disabled switches for Vector modules (XXX Changeme)
         */
        public static function resourceLoaderGetConfigVars( &$vars ) {
                return true;
        }

}
/* vim: set sw=8:ts=8:sts=0: */
