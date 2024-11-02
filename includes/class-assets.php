<?php
/**
 * Assets class.
 *
 * @package Plance\Plugin\Portfolio_Light
 */

namespace Plance\Plugin\Portfolio_Light;

defined( 'ABSPATH' ) || exit;

use const Plance\Plugin\Portfolio_Light\URL;
use const Plance\Plugin\Portfolio_Light\VERSION;
use Plance\Plugin\Portfolio_Light\Singleton;

/**
 * Assets class.
 */
class Assets {
	use Singleton;

	/**
	 * Init.
	 *
	 * @return void
	 */
	protected function init() {
		add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts' ) );
	}

	/**
	 * Hook: wp_enqueue_scripts.
	 *
	 * @return void
	 */
	public function wp_enqueue_scripts() {
		wp_register_style(
			'plance-portfolio-light',
			URL . '/assets/css/style.css',
			array(),
			VERSION
		);
	}
}
