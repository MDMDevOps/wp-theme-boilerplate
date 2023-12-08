/**
 * 1: jQuery must be imported. During build, wp-scripts will automatically add jQuery to the list
 *    of dependencies in {script-name}.asset.php, and remove it from the bundle.
 */
 import jQuery from 'jquery';
/**
 * 2. Use jQuery as you normally would, but type the $ parameter as JQueryStatic.
 */
 jQuery( function ( $ : JQueryStatic ) {
     'use strict';
     // jQuery scripts here...
 } );