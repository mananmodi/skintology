<?php

if ( ! function_exists( 'ashtanga_core_add_product_info_typography_options' ) ) {
	/**
	 * Function that add general options for this module
	 *
	 * @param object $page
	 */
	function ashtanga_core_add_product_info_typography_options( $page ) {

		if ( $page ) {
			$product_info_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-product-info',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Product Info', 'ashtanga-core' ),
					'description' => esc_html__( 'Set typography values for product info elements', 'ashtanga-core' ),
				)
			);

			$price_typography_section = $product_info_tab->add_section_element(
				array(
					'name'  => 'qodef_price_typography_product_info',
					'title' => esc_html__( 'Price Typography', 'ashtanga-core' ),
				)
			);

			$product_price_typography_row = $price_typography_section->add_row_element(
				array(
					'name'  => 'qodef_product_price_typography_row',
					'title' => esc_html__( 'Product Price Styles', 'ashtanga-core' ),
				)
			);

			$product_price_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_product_price_color',
					'title'      => esc_html__( 'Color', 'ashtanga-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$product_price_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_product_price_discount_color',
					'title'      => esc_html__( 'Discount Color', 'ashtanga-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$product_price_typography_row->add_field_element(
				array(
					'field_type' => 'font',
					'name'       => 'qodef_product_price_font_family',
					'title'      => esc_html__( 'Font Family', 'ashtanga-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$product_price_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_product_price_font_size',
					'title'      => esc_html__( 'Font Size', 'ashtanga-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$product_price_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_product_price_line_height',
					'title'      => esc_html__( 'Line Height', 'ashtanga-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$product_price_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_product_price_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'ashtanga-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$product_price_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_product_price_font_weight',
					'title'      => esc_html__( 'Font Weight', 'ashtanga-core' ),
					'options'    => ashtanga_core_get_select_type_options_pool( 'font_weight' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$product_price_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_product_price_text_transform',
					'title'      => esc_html__( 'Text Transform', 'ashtanga-core' ),
					'options'    => ashtanga_core_get_select_type_options_pool( 'text_transform' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$product_price_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_product_price_font_style',
					'title'      => esc_html__( 'Font Style', 'ashtanga-core' ),
					'options'    => ashtanga_core_get_select_type_options_pool( 'font_style' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$product_price_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_product_price_text_decoration',
					'title'      => esc_html__( 'Text Decoration', 'ashtanga-core' ),
					'options'    => ashtanga_core_get_select_type_options_pool( 'text_decoration' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$product_single_price_typography_row = $price_typography_section->add_row_element(
				array(
					'name'  => 'qodef_product_single_price_typography_row',
					'title' => esc_html__( 'Product Single Price Styles', 'ashtanga-core' ),
				)
			);

			$product_single_price_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_product_single_price_color',
					'title'      => esc_html__( 'Color', 'ashtanga-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$product_single_price_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_product_single_price_discount_color',
					'title'      => esc_html__( 'Discount Color', 'ashtanga-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$product_single_price_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_product_single_price_font_size',
					'title'      => esc_html__( 'Font Size', 'ashtanga-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$product_single_price_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_product_single_price_line_height',
					'title'      => esc_html__( 'Line Height', 'ashtanga-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$product_info_typography_section = $product_info_tab->add_section_element(
				array(
					'name'  => 'qodef_general_typography_product_info',
					'title' => esc_html__( 'Product Info Typography', 'ashtanga-core' ),
				)
			);

			$product_label_typography_row = $product_info_typography_section->add_row_element(
				array(
					'name'  => 'qodef_product_label_typography_row',
					'title' => esc_html__( 'Product Info Label Styles', 'ashtanga-core' ),
				)
			);

			$product_label_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_product_label_color',
					'title'      => esc_html__( 'Color', 'ashtanga-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$product_label_typography_row->add_field_element(
				array(
					'field_type' => 'font',
					'name'       => 'qodef_product_label_font_family',
					'title'      => esc_html__( 'Font Family', 'ashtanga-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$product_label_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_product_label_font_size',
					'title'      => esc_html__( 'Font Size', 'ashtanga-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$product_label_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_product_label_line_height',
					'title'      => esc_html__( 'Line Height', 'ashtanga-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$product_label_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_product_label_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'ashtanga-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$product_label_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_product_label_font_weight',
					'title'      => esc_html__( 'Font Weight', 'ashtanga-core' ),
					'options'    => ashtanga_core_get_select_type_options_pool( 'font_weight' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$product_label_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_product_label_text_transform',
					'title'      => esc_html__( 'Text Transform', 'ashtanga-core' ),
					'options'    => ashtanga_core_get_select_type_options_pool( 'text_transform' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$product_label_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_product_label_font_style',
					'title'      => esc_html__( 'Font Style', 'ashtanga-core' ),
					'options'    => ashtanga_core_get_select_type_options_pool( 'font_style' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$product_label_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_product_label_text_decoration',
					'title'      => esc_html__( 'Text Decoration', 'ashtanga-core' ),
					'options'    => ashtanga_core_get_select_type_options_pool( 'text_decoration' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$product_info_typography_row = $product_info_typography_section->add_row_element(
				array(
					'name'  => 'qodef_product_info_typography_row',
					'title' => esc_html__( 'Product Info Styles', 'ashtanga-core' ),
				)
			);

			$product_info_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_product_info_color',
					'title'      => esc_html__( 'Color', 'ashtanga-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$product_info_typography_row->add_field_element(
				array(
					'field_type' => 'font',
					'name'       => 'qodef_product_info_font_family',
					'title'      => esc_html__( 'Font Family', 'ashtanga-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$product_info_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_product_info_font_size',
					'title'      => esc_html__( 'Font Size', 'ashtanga-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$product_info_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_product_info_line_height',
					'title'      => esc_html__( 'Line Height', 'ashtanga-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$product_info_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_product_info_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'ashtanga-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$product_info_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_product_info_font_weight',
					'title'      => esc_html__( 'Font Weight', 'ashtanga-core' ),
					'options'    => ashtanga_core_get_select_type_options_pool( 'font_weight' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$product_info_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_product_info_text_transform',
					'title'      => esc_html__( 'Text Transform', 'ashtanga-core' ),
					'options'    => ashtanga_core_get_select_type_options_pool( 'text_transform' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$product_info_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_product_info_font_style',
					'title'      => esc_html__( 'Font Style', 'ashtanga-core' ),
					'options'    => ashtanga_core_get_select_type_options_pool( 'font_style' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$product_info_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_product_info_text_decoration',
					'title'      => esc_html__( 'Text Decoration', 'ashtanga-core' ),
					'options'    => ashtanga_core_get_select_type_options_pool( 'text_decoration' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$product_info_link_typography_row = $product_info_typography_section->add_row_element(
				array(
					'name'  => 'qodef_product_info_link_typography_row',
					'title' => esc_html__( 'Product Info Link Styles', 'ashtanga-core' ),
				)
			);

			$product_info_link_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_product_info_hover_color',
					'title'      => esc_html__( 'Link Hover Color', 'ashtanga-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$product_info_link_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_product_info_hover_text_decoration',
					'title'      => esc_html__( 'Link Hover Text Decoration', 'ashtanga-core' ),
					'options'    => ashtanga_core_get_select_type_options_pool( 'text_decoration' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);
		}
	}

	add_action( 'ashtanga_core_action_after_woo_options_map', 'ashtanga_core_add_product_info_typography_options' );
}
