<?php
/**
 * Route controller
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

use Mwf\Theme\Routes;

use Mwf\Lib;

/**
 * Route controller class
 *
 * Defines routes to be loaded
 *
 * @subpackage Controllers
 */
class Router extends Lib\Controllers\Routes
{
	/**
	 * Get definitions that should be added to the service container
	 *
	 * @return array<string, mixed>
	 */
	public static function getServiceDefinitions(): array
	{
		return [
			Routes\Archive::class  => Lib\DI\ContainerBuilder::autowire(),
			Routes\Search::class   => Lib\DI\ContainerBuilder::autowire(),
			Routes\Blog::class     => Lib\DI\ContainerBuilder::autowire(),
			Routes\Single::class   => Lib\DI\ContainerBuilder::autowire(),
			Routes\Admin::class    => Lib\DI\ContainerBuilder::autowire(),
			Routes\Frontend::class => Lib\DI\ContainerBuilder::autowire(),
			'route.archive'        => Lib\DI\ContainerBuilder::get( Routes\Archive::class ),
			'route.search'         => Lib\DI\ContainerBuilder::get( Routes\Search::class ),
			'route.blog'           => Lib\DI\ContainerBuilder::get( Routes\Blog::class ),
			'route.single'         => Lib\DI\ContainerBuilder::get( Routes\Single::class ),
			'route.admin'          => Lib\DI\ContainerBuilder::get( Routes\Admin::class ),
			'route.frontend'       => Lib\DI\ContainerBuilder::get( Routes\Frontend::class ),
		];
	}
}
