<?php
/**
 * Metabox.
 *
 * @package Plance\Plugin\Portfolio_Light
 */

defined( 'ABSPATH' ) || exit;
?>

<p>
	<label><?php esc_html_e( 'Link to work', 'portfolio-light' ); ?>:</label><br>
	<input type="url" name="_plugin_portfolio_light[link]" value="<?php echo esc_attr( $args['link'] ); ?>" style="width: 100%">
</p>
<p>
	<label><?php esc_html_e( 'Position number', 'portfolio-light' ); ?>:</label><br>
	<input type="number" name="_plugin_portfolio_light[position]" value="<?php echo esc_attr( $args['position'] ); ?>" style="width: 100%">
</p>
<p>
	<label><?php esc_html_e( 'Date of completion of work', 'portfolio-light' ); ?>:</label><br>
	<input type="date" name="_plugin_portfolio_light[created]" value="<?php echo esc_attr( $args['created'] ); ?>" style="width: 100%">
</p>
