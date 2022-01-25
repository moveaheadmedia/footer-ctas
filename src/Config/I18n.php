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

namespace FooterCtas\Config;

use FooterCtas\Common\Abstracts\Base;

/**
 * Internationalization and localization definitions
 *
 * @package FooterCtas\Config
 * @since 1.0.0
 */
final class I18n extends Base {
	/**
	 * Load the plugin text domain for translation
	 * @docs https://developer.wordpress.org/plugins/internationalization/how-to-internationalize-your-plugin/#loading-text-domain
	 *
	 * @since 1.0.0
	 */
	public function load() {
		load_plugin_textdomain(
			$this->plugin->textDomain(),
			false,
			dirname( plugin_basename( FOOTER_CTAS_PLUGIN_FILE ) ) . '/languages' // phpcs:disable ImportDetection.Imports.RequireImports.Symbol -- this constant is global
		);
	}
}
