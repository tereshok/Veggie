<?php
/**
 * TODO: Uncomment some action if you need it
 */

//======================================================================
// SHOP / ARCHIVE PAGE
//======================================================================

/**
 * Remove Result count
 */

//remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

/**
 * Remove Sorting dropdown
 */

//remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

//======================================================================
// SINGLE PRODUCT PAGE
//======================================================================

/**
 * Replace excerpt with full content
 */

//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
//add_action( 'woocommerce_single_product_summary', 'single_product_content_replace', 20 );

function single_product_content_replace() {
	the_content();
}

/**
 * Remove info tabs under products info (Description / Reviews / ...)
 */

//remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );

//======================================================================
// CART PAGE
//======================================================================



//======================================================================
// CHECKOUT PAGE
//======================================================================



//======================================================================
// MY ACCOUNT PAGE
//======================================================================



//======================================================================
// DASHBOARD TWEAKS
//======================================================================