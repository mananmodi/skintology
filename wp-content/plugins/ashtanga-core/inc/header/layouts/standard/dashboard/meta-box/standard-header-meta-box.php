<?php

if ( ! function_exists( 'ashtanga_core_add_standard_header_meta' ) ) {
	/**
	 * Function that add additional header layout meta box options
	 *
	 * @param object $page
	 */
	function ashtanga_core_add_standard_header_meta( $page ) {
		$section = $page->add_section_element(
			array(
				'name'       => 'qodef_standard_header_section',
				'title'      => esc_html__( 'Standard Header', 'ashtanga-core' ),
				'dependency' => array(
					'show' => array(
						'qodef_header_layout' => array(
							'values'        => array( '', 'standard' ),
							'default_value' => '',
						),
					),
				),
			)
		);

		$section->add_field_element(
			array(
				'field_type'    => 'select',
				'name'          => 'qodef_standard_header_in_grid',
				'title'         => esc_html__( 'Content in Grid', 'ashtanga-core' ),
				'description'   => esc_html__( 'Set content to be in grid', 'ashtanga-core' ),
				'default_value' => '',
				'options'       => ashtanga_core_get_select_type_options_pool( 'no_yes' ),
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_standard_header_height',
				'title'       => esc_html__( 'Header Height', 'ashtanga-core' ),
				'description' => esc_html__( 'Enter header height', 'ashtanga-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'ashtanga-core' ),
				),
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_standard_header_side_padding',
				'title'       => esc_html__( 'Header Side Padding', 'ashtanga-core' ),
				'description' => esc_html__( 'Enter side padding for header area', 'ashtanga-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px or %', 'ashtanga-core' ),
				),
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_standard_header_background_color',
				'title'       => esc_html__( 'Header Background Color', 'ashtanga-core' ),
				'description' => esc_html__( 'Enter header background color', 'ashtanga-core' ),
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_standard_header_border_color',
				'title'       => esc_html__( 'Header Border Color', 'ashtanga-core' ),
				'description' => esc_html__( 'Enter header border color', 'ashtanga-core' ),
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_standard_header_border_width',
				'title'       => esc_html__( 'Header Border Width', 'ashtanga-core' ),
				'description' => esc_html__( 'Enter header border width size', 'ashtanga-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'ashtanga-core' ),
				),
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_standard_header_border_style',
				'title'       => esc_html__( 'Header Border Style', 'ashtanga-core' ),
				'description' => esc_html__( 'Choose header border style', 'ashtanga-core' ),
				'options'     => ashtanga_core_get_select_type_options_pool( 'border_style' ),
			)
		);

		$section->add_field_element(
			array(
				'field_type'    => 'select',
				'name'          => 'qodef_standard_header_menu_position',
				'title'         => esc_html__( 'Menu position', 'ashtanga-core' ),
				'default_value' => '',
				'options'       => array(
					''       => esc_html__( 'Default', 'ashtanga-core' ),
					'left'   => esc_html__( 'Left', 'ashtanga-core' ),
					'center' => esc_html__( 'Center', 'ashtanga-core' ),
					'right'  => esc_html__( 'Right', 'ashtanga-core' ),
				),
			)
		);
	}

	add_action( 'ashtanga_core_action_after_page_header_meta_map', 'ashtanga_core_add_standard_header_meta' );
}
