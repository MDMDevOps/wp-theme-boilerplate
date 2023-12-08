<?php
/**
 * Providers Controller
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

use Mwf\Theme\Providers as Provider;

use Mwf\Theme\Deps\Mwf\WPCore,
	Mwf\Theme\Deps\Mwf\WPCore\DI\ContainerBuilder;

/**
 * Providers controller class
 *
 * Controls and orchestrates the execution of any 3rd party providers.
 *
 * @subpackage Controllers
 */
class Providers extends Mwf\WPCore\Abstracts\Mountable implements Mwf\WPCore\Interfaces\Controller
{
	/**
	 * Get definitions that should be added to the service container
	 *
	 * @return array<string, mixed>
	 */
	public static function getServiceDefinitions(): array
	{
		return [
			Provider\Astra::class => ContainerBuilder::autowire(),
		];
	}
	/**
	 * Actions to perform when the class is loaded
	 *
	 * @param Provider\Astra $astra : astra provider instance.
	 *
	 * @return void
	 */
	#[OnMount]
	public function mountAstra( Provider\Astra $astra ): void
	{
		add_filter( "{$this->package}_frontend_style_dependencies", [ $astra, 'useAstraStyles' ] );
	}
}
