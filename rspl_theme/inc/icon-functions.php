<?php
/**
 * RSPL_theme SVG Icon helper functions
 *
 * @package RSPL_theme
 * @since 1.0.0
 */

function rspl_theme_add_sub_menu_toggle( $output, $item, $depth, $args ) {
	if ( 0 === $depth && in_array( 'menu-item-has-children', $item->classes, true ) ) {

		// Add toggle button.
		$output .= '<button class="sub-menu-toggle" aria-expanded="false" onClick="rsplthemeExpandSubMenu(this)">';
		// $output .= '<span class="icon-plus">' . rspl_theme_get_icon_svg( 'arrow-down-circled', 16 ) . '</span>';
		$output .= '<span class="screen-reader-text">' . esc_html__( 'Open menu', 'rspl_theme' ) . '</span>';
		$output .= '</button>';
	}
	return $output;
}
add_filter( 'walker_nav_menu_start_el', 'rspl_theme_add_sub_menu_toggle', 10, 4 );


/**
 * Gets the SVG code for a given icon.
 */
function rspl_theme_get_icon_svg( $icon, $size = 24 ) {
	return rspl_theme_SVG_Icons::get_svg( 'ui', $icon, $size );
}

/**
 * Gets the SVG code for a given social icon.
 */
function rspl_theme_get_social_icon_svg( $icon, $size = 24 ) {
	return rspl_theme_SVG_Icons::get_svg( 'social', $icon, $size );
}

/**
 * Detects the social network from a URL and returns the SVG code for its icon.
 */
function rspl_theme_get_social_link_svg( $uri, $size = 24 ) {
	return rspl_theme_SVG_Icons::get_social_link_svg( $uri, $size );
}

/**
 * Display SVG icons in social links menu.
 *
 * @param  string  $item_output The menu item output.
 * @param  WP_Post $item        Menu item object.
 * @param  int     $depth       Depth of the menu.
 * @param  array   $args        wp_nav_menu() arguments.
 * @return string  $item_output The menu item output with social icon.
 */
function rspl_theme_nav_menu_social_icons( $item_output, $item, $depth, $args ) {
	// Change SVG icon inside social links menu if there is supported URL.
	if ( 'social' === $args->theme_location ) {
		$svg = rspl_theme_get_social_link_svg( $item->url, 26 );
		if ( empty( $svg ) ) {
			$svg = rspl_theme_get_icon_svg( 'link' );
		}
		$item_output = str_replace( $args->link_after, '</span>' . $svg, $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'rspl_theme_nav_menu_social_icons', 10, 4 );
