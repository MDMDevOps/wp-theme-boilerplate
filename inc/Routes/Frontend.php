<?php
/**
 * Frontend Route Definition
 *
 * PHP Version 8.0.28
 *
 * @package astra/child
 * @author  Bob Moore <bob.moore@midwestfamilymadison.com>
 * @license GPL-2.0+ <http://www.gnu.org/licenses/gpl-2.0.txt>
 * @link    https://github.com/MDMDevOps/astra-child
 * @since   1.0.0
 */

namespace Mwf\Theme\Routes;

use Mwf\Theme\Deps\Mwf\Wp\Framework,
	Mwf\Theme\Deps\DI\OnMount;

/**
 * Frontend router class
 *
 * @subpackage Route
 */
class Frontend extends Lib\Abstracts\Mountable implements
	Framework\Interfaces\Uses\ScriptDispatcher,
	Framework\Interfaces\Uses\StyleDispatcher
{
	use Framework\Traits\Uses\ScriptDispatcher;
	use Framework\Traits\Uses\StyleDispatcher;

	/**
	 * Load actions and filters, and other setup requirements
	 *
	 * @return void
	 */
	#[OnMount]
	public function mount(): void
	{
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueueAssets' ] );
	}
	/**
	 * Enqueue admin styles and JS bundles
	 *
	 * @return void
	 */
	public function enqueueAssets(): void
	{
		$this->enqueueScript(
			'frontend',
			'frontend/bundle.js'
		);
		$this->enqueueStyle(
			'frontend',
			'frontend/bundle.css'
		);
	}
}
