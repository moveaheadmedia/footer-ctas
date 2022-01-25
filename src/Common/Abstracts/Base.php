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

namespace FooterCtas\Common\Abstracts;

use FooterCtas\Config\Plugin;

/**
 * The Base class which can be extended by other classes to load in default methods
 *
 * @package FooterCtas\Common\Abstracts
 * @since 1.0.0
 */
abstract class Base {
	/**
	 * @var array : will be filled with data from the plugin config class
	 * @see Plugin
	 */
	protected $plugin = [];

	/**
	 * Base constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		$this->plugin = Plugin::init();
	}
}
