<?php

/*
Plugin Name: BCom Branding Add-On
Plugin URI: https://bcom.solutions
Description: Adds BCom branding to the login screen, support widget on dashboard, and a few other small details to the backend.
Author: Neal Mattox, BCom Solutions, LLC.
Author URI: https://bcom.solutions
Text Domain: bcom-add-on
License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html

/**
 * Support Widget
*/

add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

function my_custom_dashboard_widgets() {
global $wp_meta_boxes;
wp_add_dashboard_widget('custom_help_widget', 'BCom Support', 'custom_dashboard_help');
}

function custom_dashboard_help() {
echo '<p>Welcome!</p>
<p>Need help? Contact the BCom Solutions support team by emailing <a href="mailto:web@bcomonline.com">web@bcomonline.com</a>.</p> 
<p>For more innovative solutions visit the <a href="https://bcom.solutions" target="_blank">BCom Solutions website.</a></p>
<div style="text-align: center;">
<a href="https://bcom.solutions" target="_blank"><img style="width: 60%; text-align: center; margin: 0 auto;" src="//bcom.solutions/Images/DesignedByBCom.png"></a>
</div>
';
}

/*Switch out Howdy text*/

function replace_howdy( $wp_admin_bar ) {
    $my_account=$wp_admin_bar->get_node('my-account');
    $newtitle = str_replace( 'Howdy,', 'Thanks for being awesome', $my_account->title );
    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => $newtitle,
    ) );
}
add_filter( 'admin_bar_menu', 'replace_howdy',25 );

/*Login Logo*/

function my_custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url(//bcom.solutions/Images/BCOMPowerSymbol.svg) !important; background-size: 76px !important; }
    </style>';
}

add_action('login_head', 'my_custom_login_logo');

/*Dashboard Footer Text*/
function remove_footer_admin () {
  echo "Site designed and powered by BCom Solutions, LLC. Visit us at https://bcom.solutions";
} 

add_filter('admin_footer_text', 'remove_footer_admin');