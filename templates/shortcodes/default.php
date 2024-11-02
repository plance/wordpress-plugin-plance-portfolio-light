<?php
/**
 * Shortcode.
 *
 * @package Plance\Plugin\Portfolio_Light
 */

defined( 'ABSPATH' ) || exit;

use const Plance\Plugin\Portfolio_Light\FIELD_LINK;
use const Plance\Plugin\Portfolio_Light\FIELD_CREATED;

if ( empty( $args['posts'] ) ) :
	return;
endif;
?>

<div class="portfolio-light-works">
	<?php foreach ( $args['posts'] as $post_loop ) : ?>

		<div class="portfolio-light-work">

			<a href="<?php echo esc_url( get_the_post_thumbnail_url( $post_loop, 'full' ) ); ?>" class="portfolio-light__link">
				<?php
					echo get_the_post_thumbnail(
						$post_loop->ID,
						'post-thumbnail',
						array(
							'class' => 'portfolio-light__img',
						)
					);
				?>
			</a>

			<div class="portfolio-light__title">
				<?php $field_link = get_post_meta( $post_loop->ID, FIELD_LINK, true ); ?>

				<?php if ( ! empty( $field_link ) ) : ?>
					<noindex>
						<a href="<?php echo esc_url( $field_link ); ?>" target="_blank"><?php echo esc_attr( $post_loop->post_title ); ?></a>
					</noindex>
				<?php else : ?>
					<?php echo esc_attr( $post_loop->post_title ); ?>
				<?php endif; ?>
			</div>

			<div class="portfolio-light__content">
				<?php echo wpautop( $post_loop->post_content ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</div>


			<?php $field_created = get_post_meta( $post_loop->ID, FIELD_CREATED, true ); ?>
			<?php if ( ! empty( $field_created ) && ! empty( $args['date_format'] ) && $args['instance']->is_valid_date( $field_created ) ) : ?>
				<div class="portfolio-light__created">
					<span class="portfolio-light__created-title">
						<?php echo esc_html_e( 'Work done', 'plance-portfolio-light' ); ?>:
					</span>
					<span class="portfolio-light__created-value">
						<?php echo esc_attr( wp_date( $args['date_format'], strtotime( $field_created ) ) ); ?>
					</span>
				</div>
			<?php endif; ?>

		</div>

	<?php endforeach; ?>
</div>
