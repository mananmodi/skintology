<?php

if ( ! function_exists( 'ashtanga_core_side_area_options' ) ) {
	/**
	 * Function that add global module options
	 */
	function ashtanga_core_side_area_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => ASHTANGA_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'sidearea',
				'icon'        => 'fa fa-indent',
				'title'       => esc_html__( 'Side Area', 'ashtanga-core' ),
				'description' => esc_html__( 'Global Side Area Options', 'ashtanga-core' ),
			)
		);

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_side_area_width',
					'title'       => esc_html__( 'Side Area Width', 'ashtanga-core' ),
					'description' => esc_html__( 'Enter a width for Side Area (px or %).', 'ashtanga-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_side_area_content_overlay_color',
					'title'       => esc_html__( 'Content Overlay Background Color', 'ashtanga-core' ),
					'description' => esc_html__( 'Choose a background color for a content overlay', 'ashtanga-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_side_area_background_color',
					'title'       => esc_html__( 'Background Color', 'ashtanga-core' ),
					'description' => esc_html__( 'Choose a background color for side area', 'ashtanga-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_sidearea_background_image',
					'title'       => esc_html__( 'Background Image', 'ashtanga-core' ),
					'description' => esc_html__( 'If uploaded background image will be displayed.', 'ashtanga-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_side_area_icon_source',
					'title'         => esc_html__( 'Icon Source', 'ashtanga-core' ),
					'options'       => ashtanga_core_get_select_type_options_pool( 'icon_source', false ),
					'default_value' => 'predefined',
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_side_area_icon_pack',
					'title'         => esc_html__( 'Icon Pack', 'ashtanga-core' ),
					'default_value' => 'font-awesome',
					'options'       => qode_framework_icons()->get_icon_packs( array( 'linea-icons', 'dripicons', 'simple-line-icons' ) ),
					'dependency'    => array(
						'show' => array(
							'qodef_side_area_icon_source' => array(
								'values'        => 'icon_pack',
								'default_value' => 'predefined',
							),
						),
					),
				)
			);

			$section_svg_path = $page->add_section_element(
				array(
					'title'      => esc_html__( 'SVG Path', 'ashtanga-core' ),
					'name'       => 'qodef_side_area_svg_path_section',
					'dependency' => array(
						'show' => array(
							'qodef_side_area_icon_source' => array(
								'values'        => 'svg_path',
								'default_value' => 'predefined',
							),
						),
					),
				)
			);

			$section_svg_path->add_field_element(
				array(
					'field_type'  => 'textarea',
					'name'        => 'qodef_side_area_icon_svg_path',
					'title'       => esc_html__( 'Side Area Open Icon SVG Path', 'ashtanga-core' ),
					'description' => esc_html__( 'Enter your side area open icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'ashtanga-core' ),
				)
			);

			$section_svg_path->add_field_element(
				array(
					'field_type'  => 'textarea',
					'name'        => 'qodef_side_area_close_icon_svg_path',
					'title'       => esc_html__( 'Side Area Close Icon SVG Path', 'ashtanga-core' ),
					'description' => esc_html__( 'Enter your side area close icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'ashtanga-core' ),
				)
			);

			$color_section = $page->add_section_element(
				array(
					'name'  => 'qodef_side_area_color_section',
					'title' => esc_html__( 'Colors', 'ashtanga-core' ),
				)
			);

			$color_section->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_side_area_icon_color',
					'title'      => esc_html__( 'Color', 'ashtanga-core' ),
				)
			);

			$color_section->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_side_area_icon_hover_color',
					'title'      => esc_html__( 'Hover Color', 'ashtanga-core' ),
				)
			);

			$color_section->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_side_area_close_icon_color',
					'title'      => esc_html__( 'Close Icon Color', 'ashtanga-core' ),
				)
			);

			$color_section->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_side_area_close_icon_hover_color',
					'title'      => esc_html__( 'Close Icon Hover Color', 'ashtanga-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_side_area_alignment',
					'title'       => esc_html__( 'Text Alignment', 'ashtanga-core' ),
					'description' => esc_html__( 'Choose text alignment for side area', 'ashtanga-core' ),
					'options'     => array(
						''       => esc_html__( 'Default', 'ashtanga-core' ),
						'left'   => esc_html__( 'Left', 'ashtanga-core' ),
						'center' => esc_html__( 'Center', 'ashtanga-core' ),
						'right'  => esc_html__( 'Right', 'ashtanga-core' ),
					),
				)
			);

			// Hook to include additional options after module options
			do_action( 'ashtanga_core_action_after_side_area_options_map', $page );
		}
	}

	add_action( 'ashtanga_core_action_default_options_init', 'ashtanga_core_side_area_options', ashtanga_core_get_admin_options_map_position( 'side-area' ) );
}
