<?php

if ( ! function_exists( 'ashtanga_core_add_page_mobile_logo_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function ashtanga_core_add_page_mobile_logo_meta_box( $logo_tab ) {

		if ( $logo_tab ) {

			$mobile_header_logo_section = $logo_tab->add_section_element(
				array(
					'name'  => 'qodef_mobile_header_logo_section',
					'title' => esc_html__( 'Mobile Header Logo Options', 'ashtanga-core' ),
				)
			);

			$mobile_header_logo_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_mobile_logo_height',
					'title'       => esc_html__( 'Mobile Logo Height', 'ashtanga-core' ),
					'description' => esc_html__( 'Enter mobile logo height', 'ashtanga-core' ),
					'args'        => array(
						'suffix' => esc_html__( 'px', 'ashtanga-core' ),
					),
				)
			);

			$mobile_header_logo_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_mobile_logo_padding',
					'title'       => esc_html__( 'Mobile Logo Padding', 'ashtanga-core' ),
					'description' => esc_html__( 'Enter mobile logo padding value (top right bottom left)', 'ashtanga-core' ),
				)
			);

			$mobile_header_logo_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_mobile_logo_source',
					'title'         => esc_html__( 'Mobile Logo Source', 'ashtanga-core' ),
					'options'       => array(
						''         => esc_html__( 'Default', 'ashtanga-core' ),
						'image'    => esc_html__( 'Image', 'ashtanga-core' ),
						'svg-path' => esc_html__( 'SVG Path', 'ashtanga-core' ),
						'textual'  => esc_html__( 'Textual', 'ashtanga-core' ),
					),
					'default_value' => '',
				)
			);

			$logo_image_section = $mobile_header_logo_section->add_section_element(
				array(
					'title'      => esc_html__( 'Image settings', 'ashtanga-core' ),
					'name'       => 'qodef_mobile_logo_image_section',
					'dependency' => array(
						'show' => array(
							'qodef_mobile_logo_source' => array(
								'values'        => 'image',
								'default_value' => '',
							),
						),
					),
				)
			);

			$logo_image_section->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_mobile_logo_main',
					'title'       => esc_html__( 'Mobile Logo - Main', 'ashtanga-core' ),
					'description' => esc_html__( 'Choose main mobile logo image', 'ashtanga-core' ),
					'multiple'    => 'no',
				)
			);

			// Hook to include additional options after section part
			do_action( 'ashtanga_core_action_after_mobile_logo_image_section_meta_map', $logo_tab, $mobile_header_logo_section, $logo_image_section );

			$logo_svg_path_section = $mobile_header_logo_section->add_section_element(
				array(
					'title'      => esc_html__( 'SVG settings', 'ashtanga-core' ),
					'name'       => 'qodef_mobile_logo_svg_path_section',
					'dependency' => array(
						'show' => array(
							'qodef_mobile_logo_source' => array(
								'values'        => 'svg-path',
								'default_value' => '',
							),
						),
					),
				)
			);

			$logo_svg_path_section->add_field_element(
				array(
					'field_type'  => 'textarea',
					'name'        => 'qodef_mobile_logo_svg_path',
					'title'       => esc_html__( 'Logo SVG Path', 'ashtanga-core' ),
					'description' => esc_html__( 'Enter your logo icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'ashtanga-core' ),
				)
			);

			$logo_svg_path_section_row = $logo_svg_path_section->add_row_element(
				array(
					'name'  => 'qodef_mobile_logo_svg_path_section_row',
					'title' => esc_html__( 'SVG Styles', 'ashtanga-core' ),
				)
			);

			$logo_svg_path_section_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_mobile_logo_svg_path_color',
					'title'      => esc_html__( 'Color', 'ashtanga-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$logo_svg_path_section_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_mobile_logo_svg_path_hover_color',
					'title'      => esc_html__( 'Hover Color', 'ashtanga-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$logo_svg_path_section_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_mobile_logo_svg_path_size',
					'title'      => esc_html__( 'SVG Icon Size', 'ashtanga-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			// Hook to include additional options after section part
			do_action( 'ashtanga_core_action_after_mobile_logo_svg_path_section_meta_map', $logo_tab, $mobile_header_logo_section, $logo_svg_path_section );

			$logo_textual_section = $mobile_header_logo_section->add_section_element(
				array(
					'title'      => esc_html__( 'Textual settings', 'ashtanga-core' ),
					'name'       => 'qodef_mobile_logo_textual_section',
					'dependency' => array(
						'show' => array(
							'qodef_mobile_logo_source' => array(
								'values'        => 'textual',
								'default_value' => '',
							),
						),
					),
				)
			);

			$logo_textual_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_mobile_logo_text',
					'title'       => esc_html__( 'Logo Text', 'ashtanga-core' ),
					'description' => esc_html__( 'Fill your text to be as Logo image', 'ashtanga-core' ),
				)
			);

			$logo_textual_section_row = $logo_textual_section->add_row_element(
				array(
					'name'  => 'qodef_mobile_logo_textual_section_row',
					'title' => esc_html__( 'Typography Styles', 'ashtanga-core' ),
				)
			);

			$logo_textual_section_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_mobile_logo_text_color',
					'title'      => esc_html__( 'Color', 'ashtanga-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$logo_textual_section_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_mobile_logo_text_hover_color',
					'title'      => esc_html__( 'Hover Color', 'ashtanga-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$logo_textual_section_row->add_field_element(
				array(
					'field_type' => 'font',
					'name'       => 'qodef_mobile_logo_text_font_family',
					'title'      => esc_html__( 'Font Family', 'ashtanga-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$logo_textual_section_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_mobile_logo_text_font_size',
					'title'      => esc_html__( 'Font Size', 'ashtanga-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$logo_textual_section_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_mobile_logo_text_line_height',
					'title'      => esc_html__( 'Line Height', 'ashtanga-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$logo_textual_section_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_mobile_logo_text_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'ashtanga-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$logo_textual_section_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_mobile_logo_text_font_weight',
					'title'      => esc_html__( 'Font Weight', 'ashtanga-core' ),
					'options'    => ashtanga_core_get_select_type_options_pool( 'font_weight' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$logo_textual_section_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_mobile_logo_text_text_transform',
					'title'      => esc_html__( 'Text Transform', 'ashtanga-core' ),
					'options'    => ashtanga_core_get_select_type_options_pool( 'text_transform' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$logo_textual_section_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_mobile_logo_text_font_style',
					'title'      => esc_html__( 'Font Style', 'ashtanga-core' ),
					'options'    => ashtanga_core_get_select_type_options_pool( 'font_style' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$logo_textual_section_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_mobile_logo_text_text_decoration',
					'title'      => esc_html__( 'Text Decoration', 'ashtanga-core' ),
					'options'    => ashtanga_core_get_select_type_options_pool( 'text_decoration' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$logo_textual_section_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_mobile_logo_text_hover_text_decoration',
					'title'      => esc_html__( 'Hover Text Decoration', 'ashtanga-core' ),
					'options'    => ashtanga_core_get_select_type_options_pool( 'text_decoration' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			// Hook to include additional options after section part
			do_action( 'ashtanga_core_action_after_mobile_logo_textual_section_meta_map', $logo_tab, $mobile_header_logo_section, $logo_textual_section );

			// Hook to include additional options after module options
			do_action( 'ashtanga_core_action_after_page_mobile_logo_meta_map', $mobile_header_logo_section );
		}
	}

	add_action( 'ashtanga_core_action_after_page_mobile_header_meta_map', 'ashtanga_core_add_page_mobile_logo_meta_box' );
}