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

namespace FooterCtas\App\Backend;

use FooterCtas\Common\Abstracts\Base;

/**
 * Class Notices
 *
 * @package FooterCtas\App\Backend
 * @since 1.0.0
 */
class Notices extends Base {

	/**
	 * Initialize the class.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		/**
		 * This backend class is only being instantiated in the backend as requested in the Bootstrap class
		 *
		 * @see Requester::isAdminBackend()
		 * @see Bootstrap::__construct
		 *
		 * Add plugin code here for admin notices specific functions
		 */
		add_action( 'admin_notices', [ $this, 'acf_pro_not_installed' ] );
	}

	/**
	 * Example admin notice
	 *
	 * @since 1.0.0
	 */
	public function acf_pro_not_installed() {
		global $pagenow;
        if( ! class_exists('ACF') ) {
        echo '<div class="notice notice-warning is-dismissible">
             <p>' . __( 'Footer CTAs require ACF Pro to work', 'footer-ctas' ) . '</p>
         </div>';
		}
	}
}
