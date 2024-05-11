<?php

if ( ! function_exists( 'ashtanga_core_add_product_list_variation_info_below' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function ashtanga_core_add_product_list_variation_info_below( $variations ) {
		$variations['info-below'] = esc_html__( 'Info Below', 'ashtanga-core' );

		return $variations;
	}

	add_filter( 'ashtanga_core_filter_product_list_layouts', 'ashtanga_core_add_product_list_variation_info_below' );
}

if ( ! function_exists( 'ashtanga_core_register_shop_list_info_below_actions' ) ) {
	/**
	 * Function that override product item layout for current variation type
	 */
	function ashtanga_core_register_shop_list_info_below_actions() {

		// IMPORTANT - THIS CODE NEED TO COPY/PASTE ALSO INTO THEME FOLDER MAIN WOOCOMMERCE FILE - set_default_layout method

		// Add additional tags around product list item
		add_action( 'woocommerce_before_shop_loop_item', 'ashtanga_add_product_list_item_holder', 5 ); // permission 5 is set because woocommerce_template_loop_product_link_open hook is added on 10
		add_action( 'woocommerce_after_shop_loop_item', 'ashtanga_add_product_list_item_holder_end', 30 ); // permission 30 is set because woocommerce_template_loop_add_to_cart hook is added on 10

		// Add additional tags around product list item image
		add_action( 'woocommerce_before_shop_loop_item_title', 'ashtanga_add_product_list_item_media_holder', 5 ); // permission 5 is set because woocommerce_show_product_loop_sale_flash hook is added on 10
		add_action( 'woocommerce_before_shop_loop_item_title', 'ashtanga_add_product_list_item_media_holder_end', 20 ); // permission 30 is set because woocommerce_template_loop_product_thumbnail hook is added on 10

		// Add additional tags around product list item image
		add_action( 'woocommerce_before_shop_loop_item_title', 'ashtanga_add_product_list_item_media_image_holder', 6 ); // permission 5 is set because woocommerce_show_product_loop_sale_flash hook is added on 10
		add_action( 'woocommerce_before_shop_loop_item_title', 'ashtanga_add_product_list_item_media_image_holder_end', 14 ); // permission 30 is set because woocommerce_template_loop_product_thumbnail hook is added on 10

		// Add additional tags around content inside product list item image
		add_action( 'woocommerce_before_shop_loop_item_title', 'ashtanga_add_product_list_item_additional_image_holder', 15 ); // permission 15 is set because woocommerce_template_loop_product_thumbnail hook is added on 10
		add_action( 'woocommerce_before_shop_loop_item_title', 'ashtanga_add_product_list_item_additional_image_holder_end', 17 ); // permission 25 is set because ashtanga_add_product_list_item_media_holder_end hook is added on 30

		// Add link at the end of woocommerce_before_shop_loop_item_title
		add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 17 ); // permission 28 is set because ashtanga_add_product_list_item_media_holder_end is 30
		add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 18 ); // permission 29 is set because ashtanga_add_product_list_item_media_holder_end is 30

		// Add additional tags around product list item content
		add_action( 'woocommerce_shop_loop_item_title', 'ashtanga_add_product_list_item_content_holder', 5 ); // permission 5 is set because woocommerce_template_loop_product_title hook is added on 10
		add_action( 'woocommerce_after_shop_loop_item', 'ashtanga_add_product_list_item_content_holder_end', 20 ); // permission 30 is set because woocommerce_template_loop_add_to_cart hook is added on 10

		// Add additional tags around product list item title
		add_action( 'woocommerce_shop_loop_item_title', 'ashtanga_add_product_list_item_title_holder', 7 );
		add_action( 'woocommerce_shop_loop_item_title', 'ashtanga_add_product_list_item_title_holder_end', 10 );

		// Add additional tags around categories
		add_action( 'woocommerce_shop_loop_item_title', 'ashtanga_add_product_list_item_info_holder', 11 ); // permission 11 is set because woocommerce_template_loop_product_title hook is added on 10
		add_action( 'woocommerce_shop_loop_item_title', 'ashtanga_add_product_list_item_categories', 12 ); // permission 12 is set to be before woocommerce_template_loop_product_title hook it's added on 10
		add_action( 'woocommerce_shop_loop_item_title', 'ashtanga_add_product_list_item_info_holder_end', 13 ); // permission 13 is set because woocommerce_template_loop_add_to_cart hook is added on 10

		// Change add to cart position on product list
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' ); // permission 10 is default
		add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 16 ); // permission 20 is set because ashtanga_add_product_list_item_additional_image_holder hook is added on 15
	}

	add_action( 'ashtanga_core_action_shop_list_item_layout_info-below', 'ashtanga_core_register_shop_list_info_below_actions' );
}
