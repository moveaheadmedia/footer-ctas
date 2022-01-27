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
	 * @return string
	 * @since 1.0.0
	 */
	public function footer_ctas(): string {
        // init data
        return footer_ctas()->templates()->get('mam-footer-cta', 'template');
    }
}
