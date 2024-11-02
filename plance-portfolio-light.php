<?php
/**
 * Main.
 *
 * @package Plance\Plugin\Portfolio_Light
 *
 * Plugin Name: Portfolio Light
 * Description: Create your portfolio
 * Version: 1.0.0
 * Author: Pavel
 * Author URI: https://plance.top/
 *
 * Text Domain:       plance-portfolio-light
 * Domain Path:       /languages/
 */

namespace Plance\Plugin\Portfolio_Light;

defined( 'ABSPATH' ) || exit;


/**
 * Bootstrap.
 */
require __DIR__ . '/bootstrap.php';

/**
 * Actions.
 */
require __DIR__ . '/actions.php';
