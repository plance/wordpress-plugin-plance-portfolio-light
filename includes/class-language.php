<?php
/**
 * Language class.
 *
 * @package Plance\Plugin\Portfolio_Light
 */

namespace Plance\Plugin\Portfolio_Light;

defined( 'ABSPATH' ) || exit;

use const Plance\Plugin\Portfolio_Light\PATH;
use Plance\Plugin\Portfolio_Light\Singleton;

/**
 * Language class.
 */
class Language {
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
