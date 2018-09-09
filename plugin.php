<?php
/**
 * Plugin Name: StockPress
 * Plugin URI:
 * Description:
 * Version:     0.1.0
 * Author:      Nic Fusciardi
 * Text Domain: stockpress
 * Domain Path: /languages
 *
 * @package StockPress
 */

// Useful global constants
define( 'STOCKPRESS_VERSION', '0.1.0' );
define( 'STOCKPRESS_URL', plugin_dir_url( __FILE__ ) );
define( 'STOCKPRESS_PATH', dirname( __FILE__ ) . '/' );
define( 'STOCKPRESS_INC', STOCKPRESS_PATH . 'includes/' );

// Include files
require_once STOCKPRESS_INC . 'core.php';
require_once STOCKPRESS_PATH . 'classes/class-iex-rest-client.php';
require_once STOCKPRESS_PATH . 'shortcodes/inline-ticker/inline-ticker-shortcode.php';