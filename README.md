# Footer CTAs

Contributors: alisal

Tags: ctas, buttons, Move Ahead Media, Footer buttons, UX

Requires at least: 5.5.0

Tested up to: 5.9

Requires PHP: 7.1

Stable tag: 1.0

License: GPLv2

License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html

a WordPress plugin to easily add floating click to action buttons to your website footer using advanced custom fields.

##Description
Add links or popups to your website footer easily.

**Footer CTAs requires "ACF PRO" premium plugin to be installed and active to work.**
>We are working on a standalone version will be released in the future.

###PHP Documentation
```
<?php

footer_ctas()->get_status(); // Enabled or Disabled
footer_ctas()->get_toggle_icon(); // the icon html
footer_ctas()->get_items(); // array of all the buttons information
footer_ctas()->get_position(); // Bottom Left or Bottom Right
footer_ctas()->get_bottom(); // 15px default or from the option page
footer_ctas()->get_left(); // 15px default or from the option page
footer_ctas()->get_right(); // 15px default or from the option page
footer_ctas()->get_color(); // #FFFFFF default or from the option page
footer_ctas()->get_bg_color(); // #000000 default or from the option page


?>
```

##Installation
* Upload ”footer-ctas” to the ”/wp-content/plugins/” directory.
* Activate the plugin through the ”Plugins” menu in WordPress.
* Enable and configure the plugin in WordPress settings.
* Make sure you have "ACF PRO" installed and activated.

##Frequently Asked Questions
No FAQs at the moment, feel free to discuss issues in the support tab.

##Screenshots
1. Front End Screenshot.
2. Back-end Screenshot.

##1.0
* first version!