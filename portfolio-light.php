<?php
/**
 * Main plugin file.
 *
 * @package Plance\Plugin\Portfolio_Light
 *
 * Plugin Name: Portfolio Light
 * Description: Create your portfolio (use shortcode [portfolio_light] to display your portfolio list).
 * Plugin URI:  https://plance.top/
 * Version:     1.0.0
 * Author:      plance
 * License:     GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: portfolio-light
 * Domain Path: /languages/
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
