<?php
/*
Plugin Name: CAP Overlay
Plugin URI: http://americanprogress.com/
Description: Provides a 'overlay' post type and global overlay.
Version: 1.0
Author: Seth Rubenstein
Author URI: http://sethrubenstein.info
*/

/**
 * Copyright (c) `date "+%Y"` . All rights reserved.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * **********************************************************************
*/

add_image_size('cap_overlay_bg', 1000, 625, array('left','top'));

if ( ! function_exists('register_cap_overlay') ) {

    // Register Custom Post Type
    function register_cap_overlay() {

    	$labels = array(
    		'name'                => _x( 'Overlays', 'Post Type General Name', 'cap_overlay' ),
    		'singular_name'       => _x( 'Overlay', 'Post Type Singular Name', 'cap_overlay' ),
    		'menu_name'           => __( 'Overlays', 'cap_overlay' ),
    		'name_admin_bar'      => __( 'Overlay', 'cap_overlay' ),
    		'parent_item_colon'   => __( 'Overlay:', 'cap_overlay' ),
    		'all_items'           => __( 'All Overlays', 'cap_overlay' ),
    		'add_new_item'        => __( 'Add New Overlay', 'cap_overlay' ),
    		'add_new'             => __( 'Add New', 'cap_overlay' ),
    		'new_item'            => __( 'New Overlay', 'cap_overlay' ),
    		'edit_item'           => __( 'Edit Overlay', 'cap_overlay' ),
    		'update_item'         => __( 'Update Overlay', 'cap_overlay' ),
    		'view_item'           => __( 'View Overlay', 'cap_overlay' ),
    		'search_items'        => __( 'Search Overlay', 'cap_overlay' ),
    		'not_found'           => __( 'Not found', 'cap_overlay' ),
    		'not_found_in_trash'  => __( 'Not found in Trash', 'cap_overlay' ),
    	);
    	$args = array(
    		'label'               => __( 'cap_overlay', 'cap_overlay' ),
    		'description'         => __( 'A modal overlay', 'cap_overlay' ),
    		'labels'              => $labels,
    		'supports'            => array( 'title', 'editor', 'revisions', ),
    		'hierarchical'        => false,
    		'public'              => true,
    		'show_ui'             => true,
    		'show_in_menu'        => true,
    		'menu_position'       => 10,
    		'menu_icon'           => 'dashicons-welcome-view-site',
    		'show_in_admin_bar'   => true,
    		'show_in_nav_menus'   => false,
    		'can_export'          => true,
    		'has_archive'         => false,
    		'exclude_from_search' => true,
    		'publicly_queryable'  => true,
    		'capability_type'     => 'post',
    	);
    	register_post_type( 'cap_overlay', $args );

    }
    add_action( 'init', 'register_cap_overlay', 0 );

}

if( function_exists('register_field_group') ):

register_field_group(array (
	'key' => 'group_554792f6ea6f3',
	'title' => 'Overlay Settings',
	'fields' => array (
		array (
			'key' => 'field_5547bcfa35c2f',
			'label' => 'Background Image',
			'name' => 'overlay_bg',
			'prefix' => '',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'id',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array (
			'key' => 'field_554795c550ea4',
			'label' => 'Overlay Javascript',
			'name' => 'overlay_javascript',
			'prefix' => '',
			'type' => 'textarea',
			'instructions' => 'If you have javascript specific to this overlay put it in here..<br>

For example if you wanted to close the overlay when a user clicks on X element of a class...<br><br><br>
<code>
jQuery(".close-the-overlay-class").click(function() {<br>
        jQuery("#overlay").hide();<br>
        jQuery("body").removeClass("overlay-visible");<br>
        ga("send", "event", {<br>
                "eventCategory": "Overlay",<br>
                "eventAction": "Exit",<br>
                "eventLabel": "overlay-POSTIDHERE",<br>
                "nonInteraction": true<br>
        });<br>
});
</code>',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5547afb92fbd3',
			'label' => 'Cookie Duration',
			'name' => 'cookie_duration',
			'prefix' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => 'days',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'cap_overlay',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

endif;

// CAP Overlay editor UX improvements...
function remove_yoast_from_overlay(){
    remove_meta_box('wpseo_meta', 'cap_overlay', 'normal');
}
add_action('add_meta_boxes', 'remove_yoast_from_overlay', 99);

function disable_wysiwyg_for_overlay($default) {
    global $post;
    if ('cap_overlay' == get_post_type($post)) {
        return false;
    }
    return $default;
}
add_filter('user_can_richedit', 'disable_wysiwyg_for_overlay');

function cap_overlay_enqueue() {
    // Check for jQuery
    if ( !wp_script_is( 'jquery', 'enqueued' ) ) {
        wp_enqueue_script( 'jquery' );
    }

    // Check for js-cookie
    if ( !wp_script_is( 'js-cookie', 'enqueued' ) ) {
        wp_register_script( 'js-cookie', plugin_dir_url(__FILE__).'bower_components/js-cookie/src/js.cookie.js');
        wp_enqueue_script( 'js-cookie', array('jquery') );
    }

    wp_enqueue_style( 'cap-overlay-style', plugin_dir_url(__FILE__).'cap-overlay-style.css' );
}
add_action( 'wp_enqueue_scripts', 'cap_overlay_enqueue' );

/**
 * Constructs the overlay.
 * @param post ID of the overlay
 * @return json encoded markup and scripts for the overlay.
 */
function get_cap_overlay($overlay_id) {
    // If an id is not passed into the function or if the ID passed is not in fact an overlay then cancel.
    if ( empty($overlay_id) || 'cap_overlay' != get_post_type( $overlay_id ) ) {
        return json_encode('');
    }

    // @todo need to also check for if is published.

    $overlay = get_post($overlay_id);

    // Cookie related variables
    $tracking_label = 'overlay-'.$overlay->ID; // a combination of the post id and post modified date.
    $cookie_name = $tracking_label;
    $cookie_days = (int) get_post_meta($overlay->ID, "cookie_duration", true);

    // If you have a form you can create javascript that for example
    // when you click send will hide/close the overlay and set the cookie.
    $additional_script = '';
    if (get_field('overlay_javascript')) {
        $additional_script = get_field('overlay_javascript', $overlay_id);
    }

    $overlay_bg = '';
    if (get_field('overlay_bg', $overlay_id)) {
        $overlay_image = wp_get_attachment_image_src( get_field('overlay_bg', $overlay_id), 'cap_overlay_bg' );
        $overlay_bg = 'style="background-image: url('.$overlay_image[0].');" class="has-bg-image"';
    }

    $script = '
    jQuery(document).ready(function(){
        // Check for cookie support in browser.
        var cookies_enabled = false;
        try {
            Cookies.set("are_cookies_enabled", "true");
            var val = Cookies.get("are_cookies_enabled");
            if(val){
                cookies_enabled = true;
                Cookies.remove("are_cookies_enabled");
                console.log("Cookie test complete");
            }
        } catch (e){
            // do nothing
        }

        // If cookies are not enabled in this browser then kill script.
        if (false === cookies_enabled) {
            return;
        }

        // Check for existance of cookie.
        var cookie_exist = Cookies.get("'.$cookie_name.'");

        // If there is, then just exit -- dont show the overlay
        if (cookie_exist) {
            return;
        }

        // If not then lets fire off the modal overlay.
        jQuery("#overlay").addClass("visible");
        jQuery("body").addClass("overlay-visible");

        // Now that we have fired off the modal lets set a cookie so we dont show this overlay again.
        Cookies.set("'.$cookie_name.'", "displayed", { expires: '.$cookie_days.' });
        console.log("Cookie SET");

        // Tell Google Analytics that this modal has been seen.
        ga("send", "event", {
            "eventCategory": "Overlay",
            "eventAction": "Impression",
            "eventLabel": "'.$tracking_label.'",
            "nonInteraction": true
        });

        // If the user hits ESC key, exit overlay.
        jQuery(document).keydown(function(event) {
            var ch = event.which
            if(ch == 27) {
                jQuery("#overlay").hide();
                jQuery("body").removeClass("overlay-visible");
                ga("send", "event", {
                    "eventCategory": "Overlay",
                    "eventAction": "Exit",
                    "eventLabel": "'.$tracking_label.'",
                    "nonInteraction": true
                });
            }
        });

        // If the user clicks modal background or overlay close then exit overlay.
        jQuery("html, #close-overlay-button, #close-overlay-link, .close-the-overlay").click(function() {
            jQuery("#overlay").hide();
            jQuery("body").removeClass("overlay-visible");
            ga("send", "event", {
                "eventCategory": "Overlay",
                "eventAction": "Exit",
                "eventLabel": "'.$tracking_label.'",
                "nonInteraction": true
            });
        });

        // Ensure that clicking in the actual overlay content to interact with content
        // doesnt close overlay.
        jQuery(".overlay-content").click(function(event){
            event.stopPropagation();
        });
        '.$additional_script.'
    });
    ';

    // Overlay Markup + Script to be returned via JSON.
    $markup = '
    <div id="overlay">
        <div class="overlay-container">
            <div class="overlay-close-area">
                <span id="close-overlay-button" href="javascript:void(0)">&times;</span>
            </div>
            <div id="overlay-wrapper" '.$overlay_bg.'>
                <div class="overlay-content">
                    <div class="overlay-content-inner">'.$overlay->post_content.'</div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">'.$script.'</script>
    ';

    return json_encode($markup);
}

function cap_overlay_init() {
    $args = array(
        "posts_per_page" => 1,
        "post_type"      => "cap_overlay",
        'post_status'      => 'publish'
    );
    $overlays = get_posts($args);
    $overlay = array_shift($overlays);

    // if there is no overlay, just return
    if ( empty($overlay)) {
        return;
    }

    // display the overlay
    ?>
    <script>
        jQuery(document).ready(function(){
            // Display the overlay
            var overlayCode = <?php echo get_cap_overlay($overlay->ID); ?>;
            jQuery("body").append(overlayCode);

        });
    </script>
<?php
}
add_action('wp_footer','cap_overlay_init', 100);
