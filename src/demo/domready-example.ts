/**
 * 1. Import domReady from wordpress/scripts allows us to replace jQuery's $( document ).ready() with
 *   domReady( callback ). This is a drop-in replacement.
 */
import domReady from '@wordpress/dom-ready';
/**
 * 2. Use domReady, wrapping any functions similar to $( document ).ready().
 */
domReady( () => {
    // do custom scripts here
} );
