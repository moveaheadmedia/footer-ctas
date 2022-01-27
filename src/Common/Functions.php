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

declare(strict_types=1);

namespace FooterCtas\Common;

use FooterCtas\App\Frontend\Templates;
use FooterCtas\Common\Abstracts\Base;

/**
 * Main function class for external uses
 *
 * @see footer_ctas()
 * @package FooterCtas\Common
 */
class Functions extends Base
{
    /**
     * Get plugin data by using footer_ctas()->getData()
     *
     * @return array
     * @since 1.0.0
     */
    public function getData(): array
    {
        return $this->plugin->data();
    }

    /**
     * Get the template instantiated class using footer_ctas()->templates()
     *
     * @return Templates
     * @since 1.0.0
     */
    public function templates(): Templates
    {
        return new Templates();
    }

    /**
     * Get the plugin status from the plugin options
     *
     * @return bool
     * @since 1.0.0
     */
    public function get_status(): bool
    {
        if (get_field('mam_footer_ctas_enabled', 'option') == 'Enabled') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the plugin toggle button icon
     *
     * @return string
     * @since 1.0.0
     */
    public function get_toggle_icon(): string
    {
        $icon = get_field('mam_footer_ctas_toggle_button_icon', 'option');
        if ($icon) {
            return $icon;
        } else {
            return 'Toggle';
        }
    }

    /**
     * Get the plugin style options
     *
     * @return string
     * @since 1.0.0
     */
    public function get_position(): string
    {
        $position = 'Bottom Left';
        $option = get_field('mam_footer_style', 'option');
        if($option['mam_footer_position']){
            $position = $option['mam_footer_position'];
        }
        return $position;
    }

    /**
     * Get the plugin style options
     *
     * @return string
     * @since 1.0.0
     */
    public function get_bottom(): string
    {
        $bottom = '15px';
        $option = get_field('mam_footer_style', 'option');
        if($option['mam_footer_bottom']){
            $bottom = $option['mam_footer_bottom'] .'px';
        }
        return $bottom;
    }

    /**
     * Get the plugin style options
     *
     * @return string
     * @since 1.0.0
     */
    public function get_left(): string
    {
        if($this->get_position() == 'Bottom Right'){
            return 'auto';
        }

        $left = '15px';
        $option = get_field('mam_footer_style', 'option');
        if($option['mam_footer_left']){
            $left = $option['mam_footer_left'] .'px';
        }
        return $left;
    }

    /**
     * Get the plugin style options
     *
     * @return string
     * @since 1.0.0
     */
    public function get_right(): string
    {
        if($this->get_position() == 'Bottom Left'){
            return 'auto';
        }

        $right = '15px';
        $option = get_field('mam_footer_style', 'option');
        if($option['mam_footer_right']){
            $right = $option['mam_footer_right'] .'px';
        }
        return $right;
    }

    /**
     * Get the plugin style options
     *
     * @return string
     * @since 1.0.0
     */
    public function get_color(): string
    {
        $color = '#FFFFFF';
        $option = get_field('mam_footer_style', 'option');
        if($option['mam_footer_color']){
            $color = $option['mam_footer_color'];
        }
        return $color;
    }

    /**
     * Get the plugin style options
     *
     * @return string
     * @since 1.0.0
     */
    public function get_bg_color(): string
    {
        $color = '#000000';
        $option = get_field('mam_footer_style', 'option');
        if($option['mam_footer_background_color']){
            $color = $option['mam_footer_background_color'];
        }
        return $color;
    }

    /**
     * Get the plugin cta buttons data
     *
     * @return array
     * @since 1.0.0
     */
    public function get_items(): array
    {
        return get_field('mam_footer_ctas', 'options');
    }
}
