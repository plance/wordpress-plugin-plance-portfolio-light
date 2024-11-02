<?php
/**
 * Taxonomy class.
 *
 * @package Plance\Plugin\Portfolio_Light
 */

namespace Plance\Plugin\Portfolio_Light;

defined( 'ABSPATH' ) || exit;

use const Plance\Plugin\Portfolio_Light\TAXONOMY;
use const Plance\Plugin\Portfolio_Light\POST_TYPE;
use Plance\Plugin\Portfolio_Light\Singleton;

/**
 * Taxonomy class.
 */
class Taxonomy {
	use Singleton;

	/**
	 * Init.
	 *
	 * @return void
	 */
	protected function init() {
		register_taxonomy(
			TAXONOMY,
			POST_TYPE,
			array(
				'label'             => __( 'Categories', 'plance-portfolio-light' ),
				'public'            => false,
				'hierarchical'      => true,
				'show_admin_column' => true,
				'show_ui'           => true,
				'rewrite'           => array(
					'slug' => 'portfolio-category',
				),
			)
		);
	}
}
