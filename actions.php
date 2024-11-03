<?php
/**
 * Actions.
 *
 * @package Plance\Plugin\Portfolio_Light
 */

namespace Plance\Plugin\Portfolio_Light;

defined( 'ABSPATH' ) || exit;


use Plance\Plugin\Portfolio_Light\Admin;
use Plance\Plugin\Portfolio_Light\Assets;
use Plance\Plugin\Portfolio_Light\Taxonomy;
use Plance\Plugin\Portfolio_Light\Shortcode;
use Plance\Plugin\Portfolio_Light\Post_Type;
use Plance\Plugin\Portfolio_Light\Textdomain;
use Plance\Plugin\Portfolio_Light\Pre_Get_Posts;


add_action( 'plugins_loaded', array( Textdomain::class, 'instance' ) );
add_action( 'plugins_loaded', array( Admin::class, 'instance' ) );
add_action( 'plugins_loaded', array( Assets::class, 'instance' ) );
add_action( 'plugins_loaded', array( Shortcode::class, 'instance' ) );
add_action( 'plugins_loaded', array( Pre_Get_Posts::class, 'instance' ) );
add_action( 'init', array( Taxonomy::class, 'instance' ) );
add_action( 'init', array( Post_Type::class, 'instance' ) );
