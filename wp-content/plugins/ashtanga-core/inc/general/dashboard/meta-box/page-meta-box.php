<?php

if ( ! function_exists( 'ashtanga_core_add_general_page_meta_box' ) ) {
	/**
	 * Function that add general meta box options for this module
	 *
	 * @param object $page
	 */
	function ashtanga_core_add_general_page_meta_box( $page ) {

		$general_tab = $page->add_tab_element(
			array(
				'name'        => 'tab-page',
				'icon'        => 'fa fa-cog',
				'title'       => esc_html__( 'Page Settings', 'ashtanga-core' ),
				'description' => esc_html__( 'General page layout settings', 'ashtanga-core' ),
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_page_background_color',
				'title'       => esc_html__( 'Page Background Color', 'ashtanga-core' ),
				'description' => esc_html__( 'Set background color', 'ashtanga-core' ),
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'image',
				'name'        => 'qodef_page_background_image',
				'title'       => esc_html__( 'Page Background Image', 'ashtanga-core' ),
				'description' => esc_html__( 'Set background image', 'ashtanga-core' ),
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_page_background_repeat',
				'title'       => esc_html__( 'Page Background Image Repeat', 'ashtanga-core' ),
				'description' => esc_html__( 'Set background image repeat', 'ashtanga-core' ),
				'options'     => array(
					''          => esc_html__( 'Default', 'ashtanga-core' ),
					'no-repeat' => esc_html__( 'No Repeat', 'ashtanga-core' ),
					'repeat'    => esc_html__( 'Repeat', 'ashtanga-core' ),
					'repeat-x'  => esc_html__( 'Repeat-x', 'ashtanga-core' ),
					'repeat-y'  => esc_html__( 'Repeat-y', 'ashtanga-core' ),
				),
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_page_background_size',
				'title'       => esc_html__( 'Page Background Image Size', 'ashtanga-core' ),
				'description' => esc_html__( 'Set background image size', 'ashtanga-core' ),
				'options'     => array(
					''        => esc_html__( 'Default', 'ashtanga-core' ),
					'contain' => esc_html__( 'Contain', 'ashtanga-core' ),
					'cover'   => esc_html__( 'Cover', 'ashtanga-core' ),
				),
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_page_background_attachment',
				'title'       => esc_html__( 'Page Background Image Attachment', 'ashtanga-core' ),
				'description' => esc_html__( 'Set background image attachment', 'ashtanga-core' ),
				'options'     => array(
					''       => esc_html__( 'Default', 'ashtanga-core' ),
					'fixed'  => esc_html__( 'Fixed', 'ashtanga-core' ),
					'scroll' => esc_html__( 'Scroll', 'ashtanga-core' ),
				),
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_page_content_padding',
				'title'       => esc_html__( 'Page Content Padding', 'ashtanga-core' ),
				'description' => esc_html__( 'Set padding that will be applied for page content in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'ashtanga-core' ),
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_page_content_padding_mobile',
				'title'       => esc_html__( 'Page Content Padding Mobile', 'ashtanga-core' ),
				'description' => esc_html__( 'Set padding that will be applied for page content on mobile screens (1024px and below) in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'ashtanga-core' ),
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'    => 'select',
				'name'          => 'qodef_boxed',
				'title'         => esc_html__( 'Boxed Layout', 'ashtanga-core' ),
				'description'   => esc_html__( 'Set boxed layout', 'ashtanga-core' ),
				'default_value' => '',
				'options'       => ashtanga_core_get_select_type_options_pool( 'yes_no' ),
			)
		);

		$boxed_section = $general_tab->add_section_element(
			array(
				'name'       => 'qodef_boxed_section',
				'title'      => esc_html__( 'Boxed Layout Section', 'ashtanga-core' ),
				'dependency' => array(
					'hide' => array(
						'qodef_boxed' => array(
							'values'        => 'no',
							'default_value' => '',
						),
					),
				),
			)
		);

		$boxed_section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_boxed_background_color',
				'title'       => esc_html__( 'Boxed Background Color', 'ashtanga-core' ),
				'description' => esc_html__( 'Set boxed background color', 'ashtanga-core' ),
			)
		);

		$boxed_section->add_field_element(
			array(
				'field_type'  => 'image',
				'name'        => 'qodef_boxed_background_pattern',
				'title'       => esc_html__( 'Boxed Background Pattern', 'ashtanga-core' ),
				'description' => esc_html__( 'Set boxed background pattern', 'ashtanga-core' ),
			)
		);

		$boxed_section->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_boxed_background_pattern_behavior',
				'title'       => esc_html__( 'Boxed Background Pattern Behavior', 'ashtanga-core' ),
				'description' => esc_html__( 'Set boxed background pattern behavior', 'ashtanga-core' ),
				'options'     => array(
					''       => esc_html__( 'Default', 'ashtanga-core' ),
					'fixed'  => esc_html__( 'Fixed', 'ashtanga-core' ),
					'scroll' => esc_html__( 'Scroll', 'ashtanga-core' ),
				),
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'    => 'select',
				'name'          => 'qodef_passepartout',
				'title'         => esc_html__( 'Passepartout', 'ashtanga-core' ),
				'description'   => esc_html__( 'Enabling this option will display a passepartout around website content', 'ashtanga-core' ),
				'default_value' => '',
				'options'       => ashtanga_core_get_select_type_options_pool( 'yes_no' ),
			)
		);

		$passepartout_section = $general_tab->add_section_element(
			array(
				'name'       => 'qodef_passepartout_section',
				'dependency' => array(
					'hide' => array(
						'qodef_passepartout' => array(
							'values'        => 'no',
							'default_value' => '',
						),
					),
				),
			)
		);

		$passepartout_section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_passepartout_color',
				'title'       => esc_html__( 'Passepartout Color', 'ashtanga-core' ),
				'description' => esc_html__( 'Choose background color for passepartout', 'ashtanga-core' ),
			)
		);

		$passepartout_section->add_field_element(
			array(
				'field_type'  => 'image',
				'name'        => 'qodef_passepartout_image',
				'title'       => esc_html__( 'Passepartout Background Image', 'ashtanga-core' ),
				'description' => esc_html__( 'Set background image for passepartout', 'ashtanga-core' ),
			)
		);

		$passepartout_section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_passepartout_size',
				'title'       => esc_html__( 'Passepartout Size', 'ashtanga-core' ),
				'description' => esc_html__( 'Enter size amount for passepartout', 'ashtanga-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px or %', 'ashtanga-core' ),
				),
			)
		);

		$passepartout_section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_passepartout_size_responsive',
				'title'       => esc_html__( 'Passepartout Responsive Size', 'ashtanga-core' ),
				'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (1024px and below)', 'ashtanga-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px or %', 'ashtanga-core' ),
				),
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_content_width',
				'title'       => esc_html__( 'Initial Width of Content', 'ashtanga-core' ),
				'description' => esc_html__( 'Choose the initial width of content which is in grid (applies to pages set to "Default Template" and rows set to "In Grid")', 'ashtanga-core' ),
				'options'     => ashtanga_core_get_select_type_options_pool( 'content_width' ),
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'    => 'yesno',
				'default_value' => 'no',
				'name'          => 'qodef_content_behind_header',
				'title'         => esc_html__( 'Always put content behind header', 'ashtanga-core' ),
				'description'   => esc_html__( 'Enabling this option will put page content behind page header', 'ashtanga-core' ),
			)
		);

		// Hook to include additional options after module options
		do_action( 'ashtanga_core_action_after_general_page_meta_box_map', $general_tab );
	}

	add_action( 'ashtanga_core_action_after_general_meta_box_map', 'ashtanga_core_add_general_page_meta_box', 9 );
}

if ( ! function_exists( 'ashtanga_core_add_general_page_meta_box_callback' ) ) {
	/**
	 * Function that set current meta box callback as general callback functions
	 *
	 * @param array $callbacks
	 *
	 * @return array
	 */
	function ashtanga_core_add_general_page_meta_box_callback( $callbacks ) {
		$callbacks['page'] = 'ashtanga_core_add_general_page_meta_box';

		return $callbacks;
	}

	add_filter( 'ashtanga_core_filter_general_meta_box_callbacks', 'ashtanga_core_add_general_page_meta_box_callback' );
}
