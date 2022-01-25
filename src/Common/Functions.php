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

namespace FooterCtas\Common;

use FooterCtas\App\Frontend\Templates;
use FooterCtas\Common\Abstracts\Base;

/**
 * Main function class for external uses
 *
 * @see footer_ctas()
 * @package FooterCtas\Common
 */
class Functions extends Base {
	/**
	 * Get plugin data by using footer_ctas()->getData()
	 *
	 * @return array
	 * @since 1.0.0
	 */
	public function getData(): array {
		return $this->plugin->data();
	}

	/**
	 * Get the template instantiated class using footer_ctas()->templates()
	 *
	 * @return Templates
	 * @since 1.0.0
	 */
	public function templates(): Templates {
		return new Templates();
	}
}
