<?php
/**
 * Bootstrap.
 *
 * @package Plance\Plugin\Portfolio_Light
 */

namespace Plance\Plugin\Portfolio_Light;

defined( 'ABSPATH' ) || exit;


const PATH           = __DIR__;
const VERSION        = '1.0.0';
const POST_TYPE      = 'portfolio-light';
const TAXONOMY       = 'portfolio-light_category';
const FIELD_LINK     = '_plance_plugin_portfolio_light_link';
const FIELD_POSITION = '_plance_plugin_portfolio_light_position';
const FIELD_CREATED  = '_plance_plugin_portfolio_light_created';

define( __NAMESPACE__ . '\URL', rtrim( plugin_dir_url( __FILE__ ), '/' ) );


/**
 * Autoload plugin classes.
 */
spl_autoload_register(
	function ( $class ) {
		if ( strpos( $class, __NAMESPACE__ . '\\' ) !== 0 ) {
			return;
		}

		$class     = str_replace( __NAMESPACE__ . '\\', '', $class );
		$class     = str_replace( '_', '-', strtolower( $class ) );
		$folders   = explode( '\\', $class );
		$classname = array_pop( $folders );

		$path = '';
		if ( ! empty( $folders ) ) {
			$path = join( DIRECTORY_SEPARATOR, $folders ) . DIRECTORY_SEPARATOR;
		}

		$prefixes = array( 'class' );
		foreach ( $prefixes as $prefix ) {
			$file_name = PATH . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . $path . $prefix . '-' . $classname . '.php';
			if ( file_exists( $file_name ) ) {
				require_once $file_name;
				return;
			}
		}
	}
);
