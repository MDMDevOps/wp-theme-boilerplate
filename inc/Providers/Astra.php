<?php
/**
 * Astra provider
 *
 * PHP Version 8.0.28
 *
 * @package astra/child
 * @author  Bob Moore <bob.moore@midwestfamilymadison.com>
 * @license GPL-2.0+ <http://www.gnu.org/licenses/gpl-2.0.txt>
 * @link    https://github.com/MDMDevOps/astra-child
 * @since   1.0.0
 */

namespace Mwf\Theme\Providers;

use Mwf\Theme\Deps\Mwf\Wp\Framework,
	Mwf\Theme\Deps\DI\OnMount;

/**
 * Class for interacting with astra directly
 *
 * @subpackage Providers
 */
class Astra extends Framework\Abstracts\Mountable
{
	/**
	 * Mount specific astra actions not related to class functions
	 *
	 * @return void
	 */
	#[OnMount]
	public function mount(): void
	{
		add_filter( 'astra_above_header_disable', '__return_false', 999 );
		add_filter( 'astra_below_header_disable', '__return_false', 999 );
	}
	/**
	 * Add astra stylesheets to the theme style dependencies
	 *
	 * This ensures our child theme always loads after astra.
	 *
	 * @param array<string> $deps : array of known dependencies.
	 *
	 * @return array<string>
	 */
	public function useAstraStyles( array $deps ): array
	{
		global $wp_styles;

		$astra = array_filter(
			array_keys( $wp_styles->registered ),
			function ( $key ) {
				return str_contains( $key, 'astra' );
			}
		);

		return array_merge( $deps, array_values( $astra ) );
	}
}
