<?php
/**
 * Footer CTAs
 *
 * @package   footer-ctas
 * @author    Move Ahead Media <ali@moveaheadmedia.co.uk>
 * @copyright 2022 Footer CTAs
 * @license   MIT
 * @link      https://moveaheadmedia.com
 */

declare( strict_types = 1 );

namespace FooterCtas\App\Frontend;

use FooterCtas\Common\Abstracts\Base;

/**
 * Class Enqueue
 *
 * @package FooterCtas\App\Frontend
 * @since 1.0.0
 */
class Enqueue extends Base {

	/**
	 * Initialize the class.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		/**
		 * This frontend class is only being instantiated in the frontend as requested in the Bootstrap class
		 *
		 * @see Requester::isFrontend()
		 * @see Bootstrap::__construct
		 *
		 * Add plugin code here
		 */
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueueScripts' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'addUserStyle' ] );

	}

    /**
     * Add the user styles from the plugin options
     *
     * @since 1.0.0
     */
    public function addUserStyle(){
        $data = '
        .mam-footer-ctas {
            bottom: '. footer_ctas()->get_bottom() . ';
            right: '. footer_ctas()->get_right() . ';
            left: '. footer_ctas()->get_left() . ';
        }
        a.mam-footer-ctas-toggle {
            background-color: '. footer_ctas()->get_bg_color() . ';
            color: '. footer_ctas()->get_color() . ';
        }
        .mam-footer-ctas-content {
            background-color: '. footer_ctas()->get_bg_color() . ';
        }
        .mam-footer-ctas-item-link {
            color: '. footer_ctas()->get_color() . ';
        }
        ';
        if(footer_ctas()->get_position() == 'Bottom Left'){
            $data .= '
            .mam-footer-ctas-item-title {
                left: 40px;
            }
            ';
        }else{
            $data .= '
            .mam-footer-ctas-item-title {
                right: 40px;
            }
            ';
        }
        wp_add_inline_style( 'footer-ctas-frontend-css', $data );
    }

	/**
	 * Enqueue scripts function
	 *
	 * @since 1.0.0
	 */
	public function enqueueScripts() {
		// Enqueue CSS
		foreach (
			[
                [
                    'deps'    => [],
                    'handle'  => 'fontawesome',
                    'media'   => 'all',
                    'source'  => 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css', // phpcs:disable ImportDetection.Imports.RequireImports.Symbol -- this constant is global
                    'version' => '6.0.0',
                ],
                [
                    'deps'    => [],
                    'handle'  => 'fancybox',
                    'media'   => 'all',
                    'source'  => 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css', // phpcs:disable ImportDetection.Imports.RequireImports.Symbol -- this constant is global
                    'version' => '3.5.7',
                ],
                [
                    'deps'    => [],
                    'handle'  => 'footer-ctas-frontend-css',
                    'media'   => 'all',
                    'source'  => plugins_url( '/assets/public/css/frontend.css', FOOTER_CTAS_PLUGIN_FILE ), // phpcs:disable ImportDetection.Imports.RequireImports.Symbol -- this constant is global
                    'version' => $this->plugin->version(),
                ],
			] as $css ) {
			wp_enqueue_style( $css['handle'], $css['source'], $css['deps'], $css['version'], $css['media'] );
		}
		// Enqueue JS
		foreach (
			[
                [
                    'deps'      => ['jquery'],
                    'handle'    => 'fancybox',
                    'in_footer' => true,
                    'source'    => 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js', // phpcs:disable ImportDetection.Imports.RequireImports.Symbol -- this constant is global
                    'version'   => '3.5.7',
                ],
                [
                    'deps'      => ['jquery', 'fancybox'],
                    'handle'    => 'plugin-test-frontend-js',
                    'in_footer' => true,
                    'source'    => plugins_url( '/assets/public/js/frontend.js', FOOTER_CTAS_PLUGIN_FILE ), // phpcs:disable ImportDetection.Imports.RequireImports.Symbol -- this constant is global
                    'version'   => $this->plugin->version(),
                ],
			] as $js ) {
			wp_enqueue_script( $js['handle'], $js['source'], $js['deps'], $js['version'], $js['in_footer'] );
		}

		// Send variables to JS
		global $wp_query;

		// localize script and send variables
		wp_localize_script( 'plugin-test-frontend-js', 'plugin_frontend_script',
			[
				'plugin_frontend_url'  => admin_url( 'admin-ajax.php' ),
				'plugin_wp_query_vars' => $wp_query->query_vars,
			]
		);
	}
}
