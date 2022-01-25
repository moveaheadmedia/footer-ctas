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

namespace FooterCtas\App\General;

use FooterCtas\Common\Abstracts\Base;

/**
 * Class Shortcodes
 *
 * @package FooterCtas\App\General
 * @since 1.0.0
 */
class Shortcodes extends Base {
	/**
	 * Initialize the class.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		/**
		 * This general class is always being instantiated as requested in the Bootstrap class
		 *
		 * @see Bootstrap::__construct
		 *
		 * Add plugin code here
		 */

		add_shortcode( 'mam-footer-ctas', [ $this, 'footer_ctas' ] );
	}

	/**
	 * [mam-footer-ctas]
	 *
	 * @param array $atts Parameters.
	 * @return string
	 * @since 1.0.0
	 */
	public function footer_ctas( array $atts ): string {
        if(get_field('mam_footer_ctas_enabled', 'option') == 'Disabled'){
            return '';
        }
        // init data
        $toggle_icon = get_field('mam_footer_ctas_toggle_button_icon', 'option');
        $ctas = array();
        if( have_rows('mam_footer_ctas') ) {
            // Loop through rows.
            while( have_rows('mam_footer_ctas') ) {
                the_row();
                $item = array();
                $item['icon'] = get_sub_field('icon');
                $item['text'] = get_sub_field('text');
                $item['popup'] = get_sub_field('popup');
                $item['link'] = get_sub_field('link');
                $item['popup_content'] = get_sub_field('popup_content');
                $ctas[] = $item;
            }
        }
        return '';

    }
}
