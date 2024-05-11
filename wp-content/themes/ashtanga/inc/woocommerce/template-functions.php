<?php

/**
 * Global templates hooks
 */

if ( ! function_exists( 'ashtanga_add_main_woo_page_template_holder' ) ) {
	/**
	 * Function that render additional content for main shop page
	 */
	function ashtanga_add_main_woo_page_template_holder() {
		echo '<main id="qodef-page-content" class="qodef-grid qodef-layout--template ' . esc_attr( ashtanga_get_page_grid_sidebar_classes() ) . ' ' . esc_attr( ashtanga_get_grid_gutter_classes() ) . '" ' . ashtanga_get_grid_gutter_styles() . ' role="main"><div class="qodef-grid-inner">';
	}
}

if ( ! function_exists( 'ashtanga_add_main_woo_page_template_holder_end' ) ) {
	/**
	 * Function that render additional content for main shop page
	 */
	function ashtanga_add_main_woo_page_template_holder_end() {
		echo '</div></main>';
	}
}

if ( ! function_exists( 'ashtanga_add_main_woo_page_holder' ) ) {
	/**
	 * Function that render additional content around WooCommerce pages
	 */
	function ashtanga_add_main_woo_page_holder() {
		$classes = array();

		// add class to single page
		if ( ashtanga_is_woo_page( 'single' ) ) {
			$classes[] = 'qodef-grid-item qodef-col--12';
		}

		// add class to pages with sidebar
		if ( ashtanga_is_woo_page( 'archive' ) ) {
			$classes[] = 'qodef-grid-item';
			$classes[] = ashtanga_get_page_content_sidebar_classes();
		}

		$classes[] = ashtanga_get_woo_main_page_classes();

		echo '<div id="qodef-woo-page" class="' . esc_attr( implode( ' ', $classes ) ) . '">';
	}
}

if ( ! function_exists( 'ashtanga_add_main_woo_page_holder_end' ) ) {
	/**
	 * Function that render additional content around WooCommerce pages
	 */
	function ashtanga_add_main_woo_page_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'ashtanga_add_main_woo_page_sidebar_holder' ) ) {
	/**
	 * Function that render sidebar layout for main shop page
	 */
	function ashtanga_add_main_woo_page_sidebar_holder() {

		if ( ! ashtanga_is_woo_page( 'single' ) ) {
			// Include page content sidebar
			ashtanga_template_part( 'sidebar', 'templates/sidebar' );
		}
	}
}

/**
 * Shop page templates hooks
 */

if ( ! function_exists( 'ashtanga_add_results_and_ordering_holder' ) ) {
	/**
	 * Function that render additional content around results and ordering templates on main shop page
	 */
	function ashtanga_add_results_and_ordering_holder() {
		echo '<div class="qodef-woo-results">';
	}
}

if ( ! function_exists( 'ashtanga_add_results_and_ordering_holder_end' ) ) {
	/**
	 * Function that render additional content around results and ordering templates on main shop page
	 */
	function ashtanga_add_results_and_ordering_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'ashtanga_add_product_list_item_holder' ) ) {
	/**
	 * Function that render additional content around product list item on main shop page
	 */
	function ashtanga_add_product_list_item_holder() {
		echo '<div class="qodef-e-inner">';
	}
}

if ( ! function_exists( 'ashtanga_add_product_list_item_holder_end' ) ) {
	/**
	 * Function that render additional content around product list item on main shop page
	 */
	function ashtanga_add_product_list_item_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'ashtanga_add_product_list_item_media_holder' ) ) {
	/**
	 * Function that render additional content around image template on main shop page
	 */
	function ashtanga_add_product_list_item_media_holder() {
		echo '<div class="qodef-e-media">';
	}
}

if ( ! function_exists( 'ashtanga_add_product_list_item_media_holder_end' ) ) {
	/**
	 * Function that render additional content around image template on main shop page
	 */
	function ashtanga_add_product_list_item_media_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'ashtanga_add_product_list_item_media_image_holder' ) ) {
	/**
	 * Function that render additional content around image template on main shop page
	 */
	function ashtanga_add_product_list_item_media_image_holder() {
		echo '<div class="qodef-e-media-image">';
		do_action( 'qodef_woo_product_list_title_tag_link_open' );
	}
}

if ( ! function_exists( 'ashtanga_add_product_list_item_media_image_holder_end' ) ) {
	/**
	 * Function that render additional content around image template on main shop page
	 */
	function ashtanga_add_product_list_item_media_image_holder_end() {
		do_action( 'qodef_woo_product_list_title_tag_link_close' );
		echo '</div>';
	}
}

if ( ! function_exists( 'ashtanga_add_product_list_item_additional_image_holder' ) ) {
	/**
	 * Function that render additional content around image and sale templates on main shop page
	 */
	function ashtanga_add_product_list_item_additional_image_holder() {
		echo '<div class="qodef-e-media-inner">';
	}
}

if ( ! function_exists( 'ashtanga_add_product_list_item_additional_image_holder_end' ) ) {
	/**
	 * Function that render additional content around image and sale templates on main shop page
	 */
	function ashtanga_add_product_list_item_additional_image_holder_end() {
		// Hook to include additional content inside product list item image
		do_action( 'ashtanga_action_product_list_item_additional_hover_content' );

		echo '</div>';
	}
}

if ( ! function_exists( 'ashtanga_add_product_list_item_content_holder' ) ) {
	/**
	 * Function that render additional content around product info on main shop page
	 */
	function ashtanga_add_product_list_item_content_holder() {
		echo '<div class="qodef-e-content">';
	}
}

if ( ! function_exists( 'ashtanga_add_product_list_item_content_holder_end' ) ) {
	/**
	 * Function that render additional content around product info on main shop page
	 */
	function ashtanga_add_product_list_item_content_holder_end() {
		// Hook to include additional content inside product list item content
		do_action( 'ashtanga_action_product_list_item_additional_content' );

		echo '</div>';
	}
}

if ( ! function_exists( 'ashtanga_add_product_list_item_info_holder' ) ) {
	/**
	 * Function that render additional content around product info on main shop page
	 */
	function ashtanga_add_product_list_item_info_holder() {
		echo '<div class="qodef-e-info-holder"><div class="qodef-e-info">';
	}
}

if ( ! function_exists( 'ashtanga_add_product_list_item_info_holder_end' ) ) {
	/**
	 * Function that render additional content around product info on main shop page
	 */
	function ashtanga_add_product_list_item_info_holder_end() {
		echo '</div></div>';
	}
}

if ( ! function_exists( 'ashtanga_add_to_cart_button_text_single' ) ) {
	function ashtanga_add_to_cart_button_text_single(): ?string {
		return __( 'Purchase', 'woocommerce' );
	}
}


if ( ! function_exists( 'ashtanga_add_product_list_item_title_holder' ) ) {
	/**
	 * Function that render additional content around product title on main shop page
	 */
	function ashtanga_add_product_list_item_title_holder() {
		echo '<div class="qodef-woo-product-title-holder">';
	}
}

if ( ! function_exists( 'ashtanga_add_product_list_item_title_holder_end' ) ) {
	/**
	 * Function that render additional content around product title on main shop page
	 */
	function ashtanga_add_product_list_item_title_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'ashtanga_add_product_list_item_categories' ) ) {
	/**
	 * Function that render product categories
	 */
	function ashtanga_add_product_list_item_categories() {
		$categories = wp_get_post_terms( get_the_ID(), 'product_cat' );

		if ( ! empty( $categories ) ) { ?>
			<?php echo get_the_term_list( get_the_ID(), 'product_cat', '', '<span class="qodef-info-separator-single"></span>' ); ?>
			<div class="qodef-info-separator-end"></div>
			<?php
		}
	}
}

/**
 * Product single page templates hooks
 */

if ( ! function_exists( 'ashtanga_add_product_single_content_holder' ) ) {
	/**
	 * Function that render additional content around image and summary templates on single product page
	 */
	function ashtanga_add_product_single_content_holder() {
		echo '<div class="qodef-woo-single-inner">';
	}
}

if ( ! function_exists( 'ashtanga_add_product_single_content_holder_end' ) ) {
	/**
	 * Function that render additional content around image and summary templates on single product page
	 */
	function ashtanga_add_product_single_content_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'ashtanga_add_product_single_image_holder' ) ) {
	/**
	 * Function that render additional content around featured image on single product page
	 */
	function ashtanga_add_product_single_image_holder() {
		echo '<div class="qodef-woo-single-image">';
	}
}

if ( ! function_exists( 'ashtanga_add_product_single_image_holder_end' ) ) {
	/**
	 * Function that render additional content around featured image on single product page
	 */
	function ashtanga_add_product_single_image_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'ashtanga_woo_product_render_social_share_html' ) ) {
	/**
	 * Function that render social share html
	 */
	function ashtanga_woo_product_render_social_share_html() {
		$social_share_enabled = 'yes' === ashtanga_get_post_value_through_levels( 'qodef_woo_enable_social_share' );
		$social_share_layout  = ashtanga_get_post_value_through_levels( 'qodef_social_share_layout' );

		if ( class_exists( 'AshtangaCore_Social_Share_Shortcode' ) && $social_share_enabled ) {
			$params = array(
				'title'  => esc_html__( 'Share:', 'ashtanga' ),
				'layout' => $social_share_layout,
			);

			echo AshtangaCore_Social_Share_Shortcode::call_shortcode( $params ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}
}

/**
 * Override default WooCommerce templates
 */

if ( ! function_exists( 'ashtanga_woo_disable_page_heading' ) ) {
	/**
	 * Function that disable heading template on main shop page
	 *
	 * @return bool
	 */
	function ashtanga_woo_disable_page_heading() {
		return false;
	}
}

if ( ! function_exists( 'ashtanga_add_product_list_holder' ) ) {
	/**
	 * Function that add additional content around product lists on main shop page
	 *
	 * @param string $html
	 *
	 * @return string which contains html content
	 */
	function ashtanga_add_product_list_holder( $html ) {
		$classes        = array();
		$layout         = ashtanga_get_post_value_through_levels( 'qodef_product_list_item_layout' );
		$space          = ashtanga_get_post_value_through_levels( 'qodef_woo_product_list_columns_space' );
		$vertical_space = ashtanga_get_post_value_through_levels( 'qodef_woo_product_list_columns_vertical_space' );

		if ( ! empty( $layout ) ) {
			$classes[] = 'qodef-item-layout--' . $layout;
		}

		if ( ! empty( $space ) ) {
			$classes[] = 'qodef-gutter--' . $space;
		}

		if ( ! empty( $vertical_space ) ) {
			$classes[] = 'qodef-vertical-gutter--' . $vertical_space;
		}

		$styles = ashtanga_get_gutter_custom_styles( 'qodef_woo_product_list_columns_space_', 'qodef_woo_product_list_columns_vertical_space_', array(), true );

		return '<div class="qodef-woo-product-list ' . esc_attr( implode( ' ', $classes ) ) . '" ' . ashtanga_get_inline_style( $styles ) . '>' . $html;
	}
}

if ( ! function_exists( 'ashtanga_add_product_list_holder_end' ) ) {
	/**
	 * Function that add additional content around product lists on main shop page
	 *
	 * @param string $html
	 *
	 * @return string which contains html content
	 */
	function ashtanga_add_product_list_holder_end( $html ) {
		return $html . '</div>';
	}
}

if ( ! function_exists( 'ashtanga_woo_product_list_columns' ) ) {
	/**
	 * Function that set number of columns for main shop page
	 *
	 * @return int
	 */
	function ashtanga_woo_product_list_columns() {
		$option = ashtanga_get_post_value_through_levels( 'qodef_woo_product_list_columns' );

		if ( ! empty( $option ) ) {
			$columns = intval( $option );
		} else {
			$columns = 3;
		}

		return $columns;
	}
}

if ( ! function_exists( 'ashtanga_woo_products_per_page' ) ) {
	/**
	 * Function that set number of items for main shop page
	 *
	 * @param int $products_per_page
	 *
	 * @return int
	 */
	function ashtanga_woo_products_per_page( $products_per_page ) {
		$option = ashtanga_get_post_value_through_levels( 'qodef_woo_product_list_products_per_page' );

		if ( ! empty( $option ) ) {
			$products_per_page = intval( $option );
		}

		return $products_per_page;
	}
}

if ( ! function_exists( 'ashtanga_woo_pagination_args' ) ) {
	/**
	 * Function that override pagination args on main shop page
	 *
	 * @param array $args
	 *
	 * @return array
	 */
	function ashtanga_woo_pagination_args( $args ) {
		$args['prev_text'] = ashtanga_get_svg_icon( 'pagination-arrow-left' );
		$args['next_text'] = ashtanga_get_svg_icon( 'pagination-arrow-right' );
		$args['type']      = 'plain';

		return $args;
	}
}

if ( ! function_exists( 'ashtanga_add_single_product_classes' ) ) {
	/**
	 * Function that render additional content around WooCommerce pages
	 *
	 * @param array $classes Default argument array
	 * @param string $class
	 * @param int $post_id
	 *
	 * @return array
	 */
	function ashtanga_add_single_product_classes( $classes, $class = '', $post_id = 0 ) {
		if ( ! $post_id || ! in_array( get_post_type( $post_id ), array( 'product', 'product_variation' ), true ) ) {
			return $classes;
		}

		$product = wc_get_product( $post_id );

		if ( $product ) {
			$new = get_post_meta( $post_id, 'qodef_show_new_sign', true );

			if ( 'yes' === $new ) {
				$classes[] = 'new';
			}
		}

		return $classes;
	}
}

if ( ! function_exists( 'ashtanga_add_sale_flash_on_product' ) ) {
	/**
	 * Function for adding on sale template for product
	 */
	function ashtanga_add_sale_flash_on_product() {
		echo ashtanga_woo_set_sale_flash(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

if ( ! function_exists( 'ashtanga_woo_set_sale_flash' ) ) {
	/**
	 * Function that override on sale template for product
	 *
	 * @return string which contains html content
	 */
	function ashtanga_woo_set_sale_flash() {
		$product = ashtanga_woo_get_global_product();

		if ( ! empty( $product ) && $product->is_on_sale() && $product->is_in_stock() ) {
			return ashtanga_woo_get_woocommerce_sale( $product );
		}

		return '';
	}
}

if ( ! function_exists( 'ashtanga_woo_get_woocommerce_sale' ) ) {
	/**
	 * Function that return sale mark label
	 *
	 * @param object $product
	 *
	 * @return string
	 */
	function ashtanga_woo_get_woocommerce_sale( $product ) {
		$enable_percent_mark = ashtanga_get_post_value_through_levels( 'qodef_woo_enable_percent_sign_value' );
		$price               = floatval( $product->get_regular_price() );
		$sale_price          = floatval( $product->get_sale_price() );

		if ( $price > 0 && 'yes' === $enable_percent_mark ) {
			$sale_label = '-' . ( 100 - round( ( $sale_price * 100 ) / $price ) ) . '%';
		} else {
			$sale_label = esc_html__( 'Sale', 'ashtanga' );
		}

		return '<span class="qodef-woo-product-mark qodef-woo-onsale">' . $sale_label . '</span>';
	}
}

if ( ! function_exists( 'ashtanga_add_out_of_stock_mark_on_product' ) ) {
	/**
	 * Function for adding out of stock template for product
	 */
	function ashtanga_add_out_of_stock_mark_on_product() {
		$product = ashtanga_woo_get_global_product();

		if ( ! empty( $product ) && ! $product->is_in_stock() ) {
			echo ashtanga_get_out_of_stock_mark(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}
}

if ( ! function_exists( 'ashtanga_get_out_of_stock_mark' ) ) {
	/**
	 * Function for adding out of stock template for product
	 *
	 * @return string
	 */
	function ashtanga_get_out_of_stock_mark() {
		return '<span class="qodef-woo-product-mark qodef-out-of-stock">' . esc_html__( 'Sold', 'ashtanga' ) . '</span>';
	}
}

if ( ! function_exists( 'ashtanga_add_new_mark_on_product' ) ) {
	/**
	 * Function for adding out of stock template for product
	 */
	function ashtanga_add_new_mark_on_product() {
		$product = ashtanga_woo_get_global_product();

		if ( ! empty( $product ) && $product->get_id() !== '' ) {
			echo ashtanga_get_new_mark( $product->get_id() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}
}

if ( ! function_exists( 'ashtanga_get_new_mark' ) ) {
	/**
	 * Function for adding out of stock template for product
	 *
	 * @param int $product_id
	 *
	 * @return string
	 */
	function ashtanga_get_new_mark( $product_id ) {
		$option = get_post_meta( $product_id, 'qodef_show_new_sign', true );

		if ( 'yes' === $option ) {
			return '<span class="qodef-woo-product-mark qodef-new">' . esc_html__( 'New', 'ashtanga' ) . '</span>';
		}

		return false;
	}
}

if ( ! function_exists( 'ashtanga_woo_shop_loop_item_title' ) ) {
	/**
	 * Function that override product list item title template
	 */
	function ashtanga_woo_shop_loop_item_title() {
		$option    = ashtanga_get_post_value_through_levels( 'qodef_woo_product_list_title_tag' );
		$title_tag = ! empty( $option ) ? esc_attr( $option ) : 'h5';

		echo '<' . esc_attr( $title_tag ) . ' class="qodef-woo-product-title woocommerce-loop-product__title">';
		do_action( 'qodef_woo_product_list_title_tag_link_open' );
		echo wp_kses_post( get_the_title() );
		do_action( 'qodef_woo_product_list_title_tag_link_close' );
		echo '</' . esc_attr( $title_tag ) . '>';
	}
}

if ( ! function_exists( 'ashtanga_woo_template_single_title' ) ) {
	/**
	 * Function that override product single item title template
	 */
	function ashtanga_woo_template_single_title() {
		$option    = ashtanga_get_post_value_through_levels( 'qodef_woo_single_title_tag' );
		$title_tag = ! empty( $option ) ? esc_attr( $option ) : 'h1';

		echo '<' . esc_attr( $title_tag ) . ' class="qodef-woo-product-title product_title entry-title">' . wp_kses_post( get_the_title() ) . '</' . esc_attr( $title_tag ) . '>';
	}
}

if ( ! function_exists( 'ashtanga_woo_single_thumbnail_images_columns' ) ) {
	/**
	 * Function that set number of columns for thumbnail images on single product page
	 *
	 * @param int $columns
	 *
	 * @return int
	 */
	function ashtanga_woo_single_thumbnail_images_columns( $columns ) {
		$option = ashtanga_get_post_value_through_levels( 'qodef_woo_single_thumbnail_images_columns' );

		if ( ! empty( $option ) ) {
			$columns = intval( $option );
		}

		return $columns;
	}
}

if ( ! function_exists( 'ashtanga_woo_single_thumbnail_images_size' ) ) {
	/**
	 * Function that set thumbnail images size on single product page
	 *
	 * @return string
	 */
	function ashtanga_woo_single_thumbnail_images_size() {
		return apply_filters( 'ashtanga_filter_woo_single_thumbnail_size', 'woocommerce_thumbnail' );
	}
}

if ( ! function_exists( 'ashtanga_woo_single_thumbnail_images_wrapper' ) ) {
	/**
	 * Function that add additional wrapper around thumbnail images on single product
	 */
	function ashtanga_woo_single_thumbnail_images_wrapper() {
		echo '<div class="qodef-woo-thumbnails-wrapper">';
	}
}
if ( ! function_exists( 'ashtanga_woo_return_module_part' ) ) {
	function ashtanga_woo_return_module_part( $module ) {
		return $module;
	}
}

if ( ! function_exists( 'ashtanga_woo_get_gallery_ids' ) ) {
	function ashtanga_woo_get_gallery_ids( $with_main = true ) {
		$product        = ashtanga_woo_get_global_product();
		$attachment_ids = $product->get_gallery_image_ids();

		if ( $with_main ) {
			$post_thumbnail_id = $product->get_image_id();
			array_unshift( $attachment_ids, intval( $post_thumbnail_id ) );
		}

		return $attachment_ids;
	}
}

if ( ! function_exists( 'ashtanga_woo_single_thumbnail_images_wrapper_end' ) ) {
	/**
	 * Function that add additional wrapper around thumbnail images on single product
	 */
	function ashtanga_woo_single_thumbnail_images_wrapper_end() {
		echo '</div>';
		$image_ids = ashtanga_woo_get_gallery_ids();

		if ( ! empty( $image_ids ) ) {
			$html  = '<div class="qodef-woo-swiper-container">';
			$html .= '<div class="swiper-wrapper">';
			foreach ( $image_ids as $image_id ) {
				$html .= '<div class="swiper-slide">';
				$html .= wp_get_attachment_image( $image_id, 'woocommerce_thumbnail' );
				$html .= '</div>';
			}
			$html .= '</div>';
		} else {
			$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
			$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'ashtanga' ) );
		}
		$html .= '</div>';

		echo ashtanga_woo_return_module_part( $html );
	}
}

if ( ! function_exists( 'ashtanga_woo_single_related_product_list_columns' ) ) {
	/**
	 * Function that set number of columns for related product list on single product page
	 *
	 * @param array $args
	 *
	 * @return array
	 */
	function ashtanga_woo_single_related_product_list_columns( $args ) {
		$option = ashtanga_get_post_value_through_levels( 'qodef_woo_single_related_product_list_columns' );

		if ( ! empty( $option ) ) {
			$args['posts_per_page'] = intval( $option );
			$args['columns']        = intval( $option );
		}

		return $args;
	}
}

if ( ! function_exists( 'ashtanga_woo_product_get_rating_html' ) ) {
	/**
	 * Function that override ratings templates
	 *
	 * @param string $html - contains html content
	 * @param float $rating
	 *
	 * @return string
	 */
	function ashtanga_woo_product_get_rating_html( $html, $rating ) {
		if ( ! empty( $rating ) ) {
			$html  = '<div class="qodef-woo-ratings qodef-m"><div class="qodef-m-inner">';
			$html .= '<div class="qodef-m-star qodef--initial">';
			for ( $i = 0; $i < 5; $i ++ ) {
				$html .= ashtanga_get_svg_icon( 'star', 'qodef-m-star-item' );
			}
			$html .= '</div>';
			$html .= '<div class="qodef-m-star qodef--active" style="width:' . ( ( $rating / 5 ) * 100 ) . '%">';
			for ( $i = 0; $i < 5; $i ++ ) {
				$html .= ashtanga_get_svg_icon( 'star', 'qodef-m-star-item' );
			}
			$html .= '</div>';
			$html .= '</div></div>';
		}

		return $html;
	}
}

if ( ! function_exists( 'ashtanga_woo_get_product_search_form' ) ) {
	/**
	 * Function that override product search widget form
	 *
	 * @return string which contains html content
	 */
	function ashtanga_woo_get_product_search_form() {
		return ashtanga_get_template_part( 'woocommerce', 'templates/product-searchform' );
	}
}

if ( ! function_exists( 'ashtanga_woo_get_content_widget_product' ) ) {
	/**
	 * Function that override product content widget
	 *
	 * @param string $located
	 * @param string $template_name
	 *
	 * @return string which contains html content
	 */
	function ashtanga_woo_get_content_widget_product( $located, $template_name ) {

		if ( 'content-widget-product.php' === $template_name && file_exists( ASHTANGA_INC_ROOT_DIR . '/woocommerce/templates/content-widget-product.php' ) ) {
			$located = ASHTANGA_INC_ROOT_DIR . '/woocommerce/templates/content-widget-product.php';
		}

		return $located;
	}
}

if ( ! function_exists( 'ashtanga_woo_get_quantity_input' ) ) {
	/**
	 * Function that override quantity input
	 *
	 * @param string $located
	 * @param string $template_name
	 *
	 * @return string which contains html content
	 */
	function ashtanga_woo_get_quantity_input( $located, $template_name ) {

		if ( 'global/quantity-input.php' === $template_name && file_exists( ASHTANGA_INC_ROOT_DIR . '/woocommerce/templates/global/quantity-input.php' ) ) {
			$located = ASHTANGA_INC_ROOT_DIR . '/woocommerce/templates/global/quantity-input.php';
		}

		return $located;
	}
}

if ( ! function_exists( 'ashtanga_woo_get_single_product_meta' ) ) {
	/**
	 * Function that override single product meta
	 *
	 * @param string $located
	 * @param string $template_name
	 *
	 * @return string which contains html content
	 */
	function ashtanga_woo_get_single_product_meta( $located, $template_name ) {

		if ( 'single-product/meta.php' === $template_name && file_exists( ASHTANGA_INC_ROOT_DIR . '/woocommerce/templates/single-product/meta.php' ) ) {
			$located = ASHTANGA_INC_ROOT_DIR . '/woocommerce/templates/single-product/meta.php';
		}

		return $located;
	}
}

if ( ! function_exists( 'ashtanga_woo_add_search_widget_icon' ) ) {
	/**
	 * Function that add search icon into global js object
	 *
	 * @param $array
	 *
	 * @return mixed
	 */
	function ashtanga_woo_add_search_widget_icon( $array ) {
		$array['iconSearch'] = ashtanga_get_svg_icon( 'search' );

		return $array;
	}

	add_filter( 'ashtanga_filter_localize_main_js', 'ashtanga_woo_add_search_widget_icon' );
}
