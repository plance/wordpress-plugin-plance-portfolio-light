<?php
/**
 * Textdomain class.
 *
 * @package Plance\Plugin\Portfolio_Light
 */

namespace Plance\Plugin\Portfolio_Light;

defined( 'ABSPATH' ) || exit;

use Plance\Plugin\Portfolio_Light\Singleton;

/**
 * Textdomain class.
 */
class Textdomain {
	use Singleton;

	/**
	 * Init.
	 *
	 * @return void
	 */
	protected function init() {
		load_plugin_textdomain( 'plance-portfolio-light', false, '/plance-portfolio-light/languages' );
	}
}
