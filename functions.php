<?php
/**
 * Main functions file
 * 
 * Used to load the autoload file, and kickoff the plugin
 *
 * PHP Version 8.0.28
 *
 * @package Theme
 * @author  Bob Moore <bob.moore@midwestfamilymadison.com>
 * @license GPL-2.0+ <http://www.gnu.org/licenses/gpl-2.0.txt>
 * @link    https://github.com/MDMDevOps/astra-child
 * @since   1.0.0
 */

namespace Mwf\Theme;
/**
 * Composer auto loader
 * 
 * @see https://getcomposer.org/doc/01-basic-usage.md#autoloading
 */
require_once trailingslashit( __DIR__ ) . 'deps/autoload.php';
require_once trailingslashit( __DIR__ ) . 'vendor/autoload.php';

new Theme( 'mwf_theme' );
