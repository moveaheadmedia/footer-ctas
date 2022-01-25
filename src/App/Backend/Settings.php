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

namespace FooterCtas\App\Backend;

use FooterCtas\Common\Abstracts\Base;

/**
 * Class Settings
 *
 * @package FooterCtas\App\Backend
 * @since 1.0.0
 */
class Settings extends Base
{

    /**
     * Initialize the class.
     *
     * @since 1.0.0
     */
    public function init()
    {
        /**
         * This backend class is only being instantiated in the backend as requested in the Bootstrap class
         *
         * @see Requester::isAdminBackend()
         * @see Bootstrap::__construct
         *
         * Add plugin code here for admin settings specific functions
         */
        add_action('init', [$this, 'add_option_page']);
        add_action('init', [$this, 'add_option_page_acf']);
    }

    public function add_option_page()
    {
        if (function_exists('acf_add_options_page')) {

            acf_add_options_page(array(
                'page_title' => 'MAM Footer CTAs',
                'menu_title' => 'MAM Footer CTAs',
                'menu_slug' => 'mam-footer-cta',
                'capability' => 'edit_posts',
                'redirect' => false
            ));

        }
    }

    public function add_option_page_acf()
    {
        if (function_exists('acf_add_local_field_group')):
            $acf = json_decode(file_get_contents(plugins_url( '/assets/admin/acf.json', FOOTER_CTAS_PLUGIN_FILE )), true);
            acf_add_local_field_group($acf[0]);

        endif;
    }
}
