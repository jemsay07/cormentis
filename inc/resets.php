<?php
/*if( !defined( 'ABS_PATH' ) ) :
	exit();
endif;*/

/**
* This Function will reset the header links
*
* http://wordpress.stackexchange.com/questions/207104/edit-theme-wp-head
*/
function wp_full_resets(){
	// Removes the wlwmanifest link
	remove_action( 'wp_head', 'wlwmanifest_link' );

	// Removes the RSD link
	remove_action( 'wp_head', 'rsd_link' );

	// Removes the WP shortlink
	//remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

	// Removes the canonical links
	//remove_action( 'wp_head', 'rel_canonical' );

	// Removes the links to the extra feeds such as category feeds
	//remove_action( 'wp_head', 'feed_links_extra', 3 ); 

	// Removes links to the general feeds: Post and Comment Feed
	//remove_action( 'wp_head', 'feed_links', 2 ); 

	// Removes the index link
	remove_action( 'wp_head', 'index_rel_link' ); 

	// Removes the prev link
	remove_action( 'wp_head', 'parent_post_rel_link' ); 

	// Removes the start link
	remove_action( 'wp_head', 'start_post_rel_link' ); 

	// Removes the relational links for the posts adjacent to the current post
	remove_action( 'wp_head', 'adjacent_posts_rel_link' );
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );
	
	// Removes the WordPress version i.e. -
	remove_action( 'wp_head', 'wp_generator' );
	
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	
	/**
	*https://wordpress.org/support/topic/wp-44-remove-json-api-and-x-pingback-from-http-headers
	*/
	add_filter('rest_enabled', '_return_false');
	add_filter('rest_jsonp_enabled', '_return_false');
	
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
	
	remove_action('wp_head', 'wp_print_scripts');
    //remove_action('wp_head', 'wp_print_head_scripts', 9);
    add_action('wp_footer', 'wp_print_scripts', 5);
    add_action('wp_footer', 'wp_print_head_scripts', 5);

    //remove excerpt
    remove_filter( 'get_the_excerpt', 'wp_trim_excerpt' );

}
add_action( 'init', 'wp_full_resets' );