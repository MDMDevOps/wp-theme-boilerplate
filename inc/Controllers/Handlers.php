<?php
/**
 * Service Controller
 *
 * PHP Version 8.0.28
 *
 * @package astra/child
 * @author  Bob Moore <bob.moore@midwestfamilymadison.com>
 * @license GPL-2.0+ <http://www.gnu.org/licenses/gpl-2.0.txt>
 * @link    https://github.com/MDMDevOps/astra-child
 * @since   1.0.0
 */

namespace Mwf\Theme\Controllers;

use Mwf\Theme\Handlers as Handler;

use Mwf\Theme\Deps\Mwf\Wp\Framework,
	Mwf\Theme\Deps\DI\OnMount;

/**
 * Service controller class
 *
 * Controls and orchestrates the execution of specific handlers.
 *
 * @subpackage Controllers
 */
class Handlers extends Framework\Abstracts\Mountable implements Framework\Interfaces\Controller
{
	/**
	 * Get definitions that should be added to the service container
	 *
	 * @return array<string, mixed>
	 */
	public static function getServiceDefinitions(): array
	{
		return [
			Handler\Editor::class => Lib\DI\ContainerBuilder::autowire(),
			Handler\Images::class => Lib\DI\ContainerBuilder::autowire(),
		];
	}
	/**
	 * Actions to perform when the class is loaded
	 *
	 * @param Handler\Editor $handler : instance of editor service.
	 *
	 * @return void
	 */
	#[OnMount]
	public function mountEditor( Handler\Editor $handler ): void
	{
		add_action( 'after_setup_theme', [ $handler, 'themeSupport' ] );
		add_action( 'after_setup_theme', [ $handler, 'editorStylesheet' ], 99999 );
	}
	/**
	 * Actions to work with images
	 *
	 * @param Handler\Images $handler : instance of images handler.
	 *
	 * @return void
	 */
	#[OnMount]
	public function mountIMages( Handler\Images $handler ): void
	{
		add_filter( 'after_setup_theme', [ $handler, 'addImageSizes' ] );
		add_filter( 'image_size_names_choose', [ $handler, 'addImageSizeLabels' ] );
	}
}