<?php
/**
 * Admin class.
 *
 * @package Plance\Plugin\Portfolio_Light
 */

namespace Plance\Plugin\Portfolio_Light;

defined( 'ABSPATH' ) || exit;

use WP_Query;
use const Plance\Plugin\Portfolio_Light\POST_TYPE;
use const Plance\Plugin\Portfolio_Light\FIELD_POSITION;
use Plance\Plugin\Portfolio_Light\Singleton;

/**
 * Admin class.
 */
class Pre_Get_Posts {
	use Singleton;

	/**
	 * Init.
	 *
	 * @return void
	 */
	protected function init() {
		add_action( 'pre_get_posts', array( $this, 'pre_get_posts' ) );
	}

	/**
	 * Hook: pre_get_posts.
	 *
	 * @param  WP_Query $query WP_Query.
	 * @return void
	 */
	public function pre_get_posts( $query ) {
		if ( ! is_admin() ) {
			return;
		}

		if ( POST_TYPE !== $query->query['post_type'] ) {
			return '';
		}

		$meta_query = array(
			'relation' => 'OR',
			array(
				'key'     => FIELD_POSITION,
				'compare' => 'EXISTS',
			),
			array(
				'key'     => FIELD_POSITION,
				'compare' => 'NOT EXISTS',
			),
		);

		if ( '' === $query->get( 'orderby' ) ) {
			$query->set( 'meta_query', $meta_query );
			$query->set( 'orderby', 'meta_value_num' );
			$query->set( 'order', 'DESC' );
		} elseif ( 'sort' === $query->get( 'orderby' ) ) {
			$query->set( 'meta_query', $meta_query );
			$query->set( 'orderby', 'meta_value_num' );
		}
	}
}
