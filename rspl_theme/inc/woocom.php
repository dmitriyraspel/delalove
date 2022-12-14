<?php

/**
 * Filter & remove woocommerce_checkout_fields
 */
add_filter( 'woocommerce_checkout_fields', 'rspl_theme_checkout_fields' );
function rspl_theme_checkout_fields( $fields ){
	$fields[ 'billing' ][ 'billing_last_name' ][ 'required' ] = 0;
  $fields[ 'billing' ][ 'billing_country'   ][ 'required' ] = 0;
  $fields[ 'billing' ][ 'billing_address_1' ][ 'required' ] = 0;
  $fields[ 'billing' ][ 'billing_address_2' ][ 'required' ] = 0;
  $fields[ 'billing' ][ 'billing_city'      ][ 'required' ] = 0;
  $fields[ 'billing' ][ 'billing_state'     ][ 'required' ] = 0;
  $fields[ 'billing' ][ 'billing_postcode'  ][ 'required' ] = 0;
  $fields[ 'billing' ][ 'billing_company'  ][ 'required' ] = 0;
  $fields[ 'billing' ][ 'billing_phone'  ][ 'required' ] = 0;
	
  // remove fields
   unset( $fields['billing'] ['billing_company'] );
  unset( $fields['billing'] ['billing_country'] );
  unset( $fields['billing'] ['billing_address_1'] );
  unset( $fields['billing'] ['billing_address_2'] );
  unset( $fields['billing'] ['billing_city'] );
  unset( $fields['billing'] ['billing_state'] );
  unset( $fields['billing'] ['billing_postcode'] );
  
  return $fields;
}

add_action('woocommerce_before_calculate_totals', 'rspl_theme_change_cart_item_quantities', 20, 1 );
function rspl_theme_change_cart_item_quantities ( $cart ) {
    if ( is_admin() && ! defined( 'DOING_AJAX' ) ) return;

    // $products_ids = array(875, 876, 877); //900
    // New quantity
    $new_qty = 1; 

    foreach( $cart->get_cart() as $cart_item_key => $cart_item ) {
        if( $cart_item['quantity'] != $new_qty ){
            $cart->set_quantity( $cart_item_key, $new_qty ); // Change quantity
        }
    }
}

/**
 * Change redirect after order received page
 */
add_action( 'template_redirect', 'rspl_theme_redirect_after_order_received_page' );
function rspl_theme_redirect_after_order_received_page() {
 
	if( ! is_order_received_page() ) {
		return;
	}
 
	if( isset( $_GET[ 'key' ] ) ) {
		$order_id = wc_get_order_id_by_order_key( $_GET[ 'key' ] );
		$order = wc_get_order( $order_id );
		if( $order->has_status( 'failed' ) ) {
			return;
		}
	}
 
	wp_redirect( site_url( 'my-courses' ) );
	exit;
 
}

// Замена текста "Вернуться в магазин"
add_filter( 'woocommerce_return_to_shop_text', 'rspl_theme_woocommerce_return_to_shop_text_filter' );
function rspl_theme_woocommerce_return_to_shop_text_filter( $default_text ){

    $default_text = 'ПЕРЕЙТИ В КАТАЛОГ ПРОДУКТОВ';
	return $default_text;
}



// Замены ссылки кнопки "Вернуться в магазин"
add_filter( 'woocommerce_return_to_shop_redirect', 'rspl_theme_woocommerce_return_to_shop_redirect_filter' );
function rspl_theme_woocommerce_return_to_shop_redirect_filter( $wc_get_page_permalink ){

    $wc_get_page_permalink = site_url( 'courses-overview' );
	return $wc_get_page_permalink;
}

// Замены текста "Ваша корзина пока пуста."
remove_action( 'woocommerce_cart_is_empty', 'wc_empty_cart_message', 10 );
add_action( 'woocommerce_cart_is_empty', 'rspl_theme_wc_empty_cart_message', 10 );

function rspl_theme_wc_empty_cart_message() {
    $html  = '<p class="cart-empty theme-cart-empty">';
    $html .= wp_kses_post( apply_filters( 'wc_empty_cart_message', __( 'ВАША КОРЗИНА ПОКА ПУСТА. ВЫБЕРИТЕ, ПОЖАЛУЙСТА,
    ПРОЕКТ ПО ДУШЕ В КАТАЛОГЕ ПРОДУКТОВ.', 'rspl_theme' ) ) );
    echo $html . '</p>';
}
