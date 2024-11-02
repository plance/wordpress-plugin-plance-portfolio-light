<?php
/**
 * Post_Type class.
 *
 * @package Plance\Plugin\Portfolio_Light
 */

namespace Plance\Plugin\Portfolio_Light;

defined( 'ABSPATH' ) || exit;

use const Plance\Plugin\Portfolio_Light\POST_TYPE;
use const Plance\Plugin\Portfolio_Light\FIELD_LINK;
use const Plance\Plugin\Portfolio_Light\FIELD_CREATED;
use const Plance\Plugin\Portfolio_Light\FIELD_POSITION;
use Plance\Plugin\Portfolio_Light\Singleton;

/**
 * Post_Type class.
 */
class Post_Type {
	use Singleton;

	/**
	 * Init.
	 *
	 * @return void
	 */
	protected function init() {
		$this->register();

		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'save_post_' . POST_TYPE, array( $this, 'save_post' ) );
		add_action( 'manage_' . POST_TYPE . '_posts_custom_column', array( $this, 'manage_posts_custom_column' ), 10, 2 );
		add_filter( 'manage_' . POST_TYPE . '_posts_columns', array( $this, 'manage_posts_columns' ) );
		add_filter( 'manage_edit-' . POST_TYPE . '_sortable_columns', array( $this, 'manage_edit_sortable_columns' ) );
	}

	/**
	 * Register.
	 *
	 * @return void
	 */
	private function register() {
		register_post_type(
			POST_TYPE,
			array(
				'labels'      => array(
					'name'          => __( 'Portfolio', 'plance-portfolio-light' ),
					'singular_name' => __( 'Portfolio', 'plance-portfolio-light' ),
				),
				'public'      => false,
				'show_ui'     => true,
				'has_archive' => true,
				'rewrite'     => array(
					'slug' => POST_TYPE,
				),
				'can_export'  => true,
				'menu_icon'   => 'dashicons-format-gallery',
				'supports'    => array(
					'title',
					'editor',
					'thumbnail',
				),
			)
		);
	}

	/**
	 * Hook: add_meta_boxes.
	 *
	 * @return void
	 */
	public function add_meta_boxes() {
		add_meta_box(
			'mb-' . POST_TYPE,
			__( 'Portfolio settings', 'plance-portfolio-light' ),
			function( $post ) {
				load_template(
					PATH . '/templates/admin/metabox.php',
					false,
					array(
						'link'     => get_post_meta( $post->ID, FIELD_LINK, true ),
						'position' => get_post_meta( $post->ID, FIELD_POSITION, true ),
						'created'  => get_post_meta( $post->ID, FIELD_CREATED, true ),
					)
				);
			},
			POST_TYPE,
			'normal',
			'high'
		);
	}

	/**
	 * Hook: manage_posts_custom_column.
	 *
	 * @param  string $column_name Column name.
	 * @param  int    $post_id Post id.
	 * @return void
	 */
	public function manage_posts_custom_column( $column_name, $post_id ) {
		switch ( $column_name ) {
			case 'column_preview':
				echo get_the_post_thumbnail( $post_id, array( 50, 50 ) );
				break;

			case 'column_sort':
				echo esc_attr( get_post_meta( $post_id, FIELD_POSITION, true ) );
				break;
		}
	}

	/**
	 * Manage posts columns.
	 *
	 * @param  array $default_columns Default columns.
	 * @return array
	 */
	public function manage_posts_columns( $default_columns ) {
		$columns = array();

		foreach ( $default_columns as $key => $value ) {
			if ( 'title' === $key ) {
				$columns['column_preview'] = __( 'Preview', 'plance-portfolio-light' );
			}

			if ( 'date' === $key ) {
				$columns['column_sort'] = __( 'Position', 'plance-portfolio-light' );
			}

			$columns[ $key ] = $value;
		}

		return $columns;
	}

	/**
	 * Manage edit sortable columns.
	 *
	 * @param  array $columns Columns.
	 * @return array
	 */
	public function manage_edit_sortable_columns( $columns ) {
		$columns['column_sort'] = 'sort';

		return $columns;
	}

	/**
	 * Hook: save_post.
	 *
	 * @param  int $post_id Post id.
	 * @return void
	 */
	public function save_post( $post_id ) {
		$input = filter_input( INPUT_POST, '_plance_plugin_portfolio_light', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY );

		update_post_meta( $post_id, FIELD_LINK, $input['link'] ?? '' );
		update_post_meta( $post_id, FIELD_CREATED, $input['created'] ?? '' );
		update_post_meta( $post_id, FIELD_POSITION, $input['position'] ?? '' );
	}
}
