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
use const Plance\Plugin\Portfolio_Light\POST_TYPE;
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
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
	}

	/**
	 * Hook: wp_enqueue_scripts.
	 *
	 * @return void
	 */
	public function wp_enqueue_scripts() {
		wp_register_style(
			'portfolio-light',
			URL . '/assets/css/style.css',
			array(),
			VERSION
		);
	}

	/**
	 * Hook: admin_enqueue_scripts.
	 *
	 * @return void
	 */
	public function admin_enqueue_scripts() {
		global $post_type;

		if ( ! empty( $post_type ) && POST_TYPE === $post_type ) {
			wp_enqueue_style(
				'portfolio-light',
				URL . '/assets/css/admin-style.css',
				array(),
				VERSION
			);
		}
	}
}
