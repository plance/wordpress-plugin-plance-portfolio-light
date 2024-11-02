<?php
/**
 * Admin class.
 *
 * @package Plance\Plugin\Portfolio_Light
 */

namespace Plance\Plugin\Portfolio_Light;

defined( 'ABSPATH' ) || exit;

use const Plance\Plugin\Portfolio_Light\POST_TYPE;
use Plance\Plugin\Portfolio_Light\Singleton;

/**
 * Admin class.
 */
class Admin {
	use Singleton;

	/**
	 * Init.
	 *
	 * @return void
	 */
	protected function init() {
		add_action( 'admin_head', array( $this, 'admin_head' ) );
	}

	/**
	 * Hook: admin_head.
	 *
	 * @return void
	 */
	public function admin_head() {
		global $post_type;

		if ( ! empty( $post_type ) && POST_TYPE === $post_type ) {
			?>
				<style type="text/css">
					.column-column_preview {
						width: 75px;
						text-align: center;
					}
					.column-column_sort {
						width: 100px;
						text-align: center;
					}
				</style>
			<?php
		}
	}
}
