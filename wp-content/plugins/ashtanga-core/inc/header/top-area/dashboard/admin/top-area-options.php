<?php

if ( ! function_exists( 'ashtanga_core_add_top_area_options' ) ) {
	/**
	 * Function that add additional header layout options
	 *
	 * @param object $page
	 * @param array $general_header_tab
	 */
	function ashtanga_core_add_top_area_options( $page, $general_header_tab ) {

		$top_area_section = $general_header_tab->add_section_element(
			array(
				'name'        => 'qodef_top_area_section',
				'title'       => esc_html__( 'Top Area', 'ashtanga-core' ),
				'description' => esc_html__( 'Options related to top area', 'ashtanga-core' ),
				'dependency'  => array(
					'hide' => array(
						'qodef_header_layout' => array(
							'values'        => ashtanga_core_dependency_for_top_area_options(),
							'default_value' => apply_filters( 'ashtanga_core_filter_header_layout_default_option_value', '' ),
						),
					),
				),
			)
		);

		$top_area_section->add_field_element(
			array(
				'field_type'    => 'yesno',
				'default_value' => 'no',
				'name'          => 'qodef_top_area_header',
				'title'         => esc_html__( 'Top Area', 'ashtanga-core' ),
				'description'   => esc_html__( 'Enable top area', 'ashtanga-core' ),
			)
		);

		$top_area_options_section = $top_area_section->add_section_element(
			array(
				'name'        => 'qodef_top_area_options_section',
				'title'       => esc_html__( 'Top Area Options', 'ashtanga-core' ),
				'description' => esc_html__( 'Set desired values for top area', 'ashtanga-core' ),
				'dependency'  => array(
					'show' => array(
						'qodef_top_area_header' => array(
							'values'        => 'yes',
							'default_value' => 'no',
						),
					),
				),
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'    => 'yesno',
				'name'          => 'qodef_top_area_header_in_grid',
				'title'         => esc_html__( 'Content in Grid', 'ashtanga-core' ),
				'description'   => esc_html__( 'Set content to be in grid', 'ashtanga-core' ),
				'default_value' => 'no',
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_top_area_header_height',
				'title'       => esc_html__( 'Top Area Height', 'ashtanga-core' ),
				'description' => esc_html__( 'Enter top area height (default is 30px)', 'ashtanga-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'ashtanga-core' ),
				),
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type' => 'text',
				'name'       => 'qodef_top_area_header_side_padding',
				'title'      => esc_html__( 'Top Area Side Padding', 'ashtanga-core' ),
				'args'       => array(
					'suffix' => esc_html__( 'px or %', 'ashtanga-core' ),
				),
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_set_top_area_header_content_alignment',
				'title'       => esc_html__( 'Content Alignment', 'ashtanga-core' ),
				'description' => esc_html__( 'Set widgets content alignment inside top header area', 'ashtanga-core' ),
				'options'     => array(
					''       => esc_html__( 'Default', 'ashtanga-core' ),
					'center' => esc_html__( 'Center', 'ashtanga-core' ),
				),
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_top_area_header_background_color',
				'title'       => esc_html__( 'Top Area Background Color', 'ashtanga-core' ),
				'description' => esc_html__( 'Choose top area background color', 'ashtanga-core' ),
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_top_area_header_border_color',
				'title'       => esc_html__( 'Top Area Border Color', 'ashtanga-core' ),
				'description' => esc_html__( 'Enter top area border color', 'ashtanga-core' ),
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_top_area_header_border_width',
				'title'       => esc_html__( 'Top Area Border Width', 'ashtanga-core' ),
				'description' => esc_html__( 'Enter top area border width size', 'ashtanga-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'ashtanga-core' ),
				),
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_top_area_header_border_style',
				'title'       => esc_html__( 'Top Area Border Style', 'ashtanga-core' ),
				'description' => esc_html__( 'Choose top area border style', 'ashtanga-core' ),
				'options'     => ashtanga_core_get_select_type_options_pool( 'border_style' ),
			)
		);
	}

	add_action( 'ashtanga_core_action_after_header_options_map', 'ashtanga_core_add_top_area_options', 20, 2 );
}
