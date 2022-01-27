<?php
/**
 * Footer CTAs
 *
 * @package   footer-ctas
 * @author    Move Ahead Media <ali@moveaheadmedia.co.uk>
 * @copyright 2022 Footer CTAs
 * @license   GPLv2
 * @link      https://github.com/moveaheadmedia/footer-ctas/
 *
 * Plugin Name:     Footer CTAs
 * Plugin URI:      https://github.com/moveaheadmedia/footer-ctas/
 * Description:     Adds footer CTAs to your website, Require ACF Pro
 * Version:         1.0.0
 * Author:          Move Ahead Media
 * Author URI:      https://moveaheadmedia.com
 * Text Domain:     footer-ctas
 * Domain Path:     /languages
 * Requires PHP:    5.6
 * Requires WP:     4.5.0
 * Namespace:       FooterCtas
 */

declare( strict_types = 1 );

/**
 * Define the default root file of the plugin
 *
 * @since 1.0.0
 */
const FOOTER_CTAS_PLUGIN_FILE = __FILE__;

/**
 * Load PSR4 autoloader
 *
 * @since 1.0.0
 */
$footer_ctas_autoloader = require plugin_dir_path( FOOTER_CTAS_PLUGIN_FILE ) . 'vendor/autoload.php';

/**
 * Setup hooks (activation, deactivation, uninstall)
 *
 * @since 1.0.0
 */
register_activation_hook( __FILE__, [ 'FooterCtas\Config\Setup', 'activation' ] );
register_deactivation_hook( __FILE__, [ 'FooterCtas\Config\Setup', 'deactivation' ] );
register_uninstall_hook( __FILE__, [ 'FooterCtas\Config\Setup', 'uninstall' ] );

/**
 * Bootstrap the plugin
 *
 * @since 1.0.0
 */
if ( ! class_exists( '\FooterCtas\Bootstrap' ) ) {
	wp_die( __( 'Footer CTAs is unable to find the Bootstrap class.', 'footer-ctas' ) );
}
add_action(
	'plugins_loaded',
	static function () use ( $footer_ctas_autoloader ) {
		/**
		 * @see \FooterCtas\Bootstrap
		 */
		try {
			new \FooterCtas\Bootstrap( $footer_ctas_autoloader );
		} catch ( Exception $e ) {
			wp_die( __( 'Footer CTAs is unable to run the Bootstrap class.', 'footer-ctas' ) );
		}
	}
);

/**
 * Create a main function for external uses
 *
 * @return \FooterCtas\Common\Functions
 * @since 1.0.0
 */
function footer_ctas(): \FooterCtas\Common\Functions {
	return new \FooterCtas\Common\Functions();
}
