<?php
/**
 * Shortcode.
 *
 * @package Plance\Plugin\Portfolio_Light
 */

namespace Plance\Plugin\Portfolio_Light;

defined( 'ABSPATH' ) || exit;

use DateTime;
use const Plance\Plugin\Portfolio_Light\PATH;
use const Plance\Plugin\Portfolio_Light\POST_TYPE;
use const Plance\Plugin\Portfolio_Light\FIELD_POSITION;
use Plance\Plugin\Multilang_Perelink\Singleton;

/**
 * Shortcode class.
 */
class Shortcode {
	use Singleton;

	/**
	 * Init.
	 *
	 * @return void
	 */
	protected function init() {
		add_shortcode( 'portfolio_light', array( $this, 'shortcode' ) );
	}

	/**
	 * Shortcode.
	 *
	 * @param  array $atts Attributes.
	 * @return string
	 */
	public function shortcode( $atts = array() ) {

		$atts = shortcode_atts(
			array(
				'date_format' => 'Y-m-d',
			),
			$atts
		);

		wp_enqueue_style( 'plance-portfolio-light' );

		$posts = get_posts(
			array(
				'post_type'   => POST_TYPE,
				'post_status' => 'publish',
				'numberposts' => -1,
				'meta_query'  => array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_query
					'relation' => 'OR',
					array(
						'key'     => FIELD_POSITION,
						'compare' => 'EXISTS',
					),
					array(
						'key'     => FIELD_POSITION,
						'compare' => 'NOT EXISTS',
					),
				),
				'orderby'     => 'meta_value_num',
				'order'       => 'DESC',
			)
		);

		ob_start();

		load_template(
			PATH . '/templates/shortcodes/default.php',
			false,
			array(
				'posts'       => $posts,
				'date_format' => $atts['date_format'],
				'instance'    => $this,
			)
		);

		return ob_get_clean();
	}

	/**
	 * Check date valid or not.
	 *
	 * @param  string $date Date.
	 * @param  string $format Format.
	 * @return bool
	 */
	public function is_valid_date( $date, $format = 'Y-m-d' ) {
		$date_time = DateTime::createFromFormat( $format, $date );
		return $date_time && $date_time->format( $format ) === $date;
	}
}
