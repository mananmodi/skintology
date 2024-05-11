<?php

if ( ! function_exists( 'ashtanga_core_add_general_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function ashtanga_core_add_general_options( $page ) {

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_main_color',
					'title'       => esc_html__( 'Main Color', 'ashtanga-core' ),
					'description' => esc_html__( 'Choose the most dominant theme color', 'ashtanga-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_page_background_color',
					'title'       => esc_html__( 'Page Background Color', 'ashtanga-core' ),
					'description' => esc_html__( 'Set background color', 'ashtanga-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_page_background_image',
					'title'       => esc_html__( 'Page Background Image', 'ashtanga-core' ),
					'description' => esc_html__( 'Set background image', 'ashtanga-core' ),
				)
			);

			$page->add_field_element(
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

			$page->add_field_element(
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

			$page->add_field_element(
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

			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_page_content_padding',
					'title'       => esc_html__( 'Page Content Padding', 'ashtanga-core' ),
					'description' => esc_html__( 'Set padding that will be applied for page content in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'ashtanga-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_page_content_padding_mobile',
					'title'       => esc_html__( 'Page Content Padding Mobile', 'ashtanga-core' ),
					'description' => esc_html__( 'Set padding that will be applied for page content on mobile screens (1024px and below) in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'ashtanga-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_boxed',
					'title'         => esc_html__( 'Boxed Layout', 'ashtanga-core' ),
					'description'   => esc_html__( 'Set boxed layout', 'ashtanga-core' ),
					'default_value' => 'no',
				)
			);

			$boxed_section = $page->add_section_element(
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
						'fixed'  => esc_html__( 'Fixed', 'ashtanga-core' ),
						'scroll' => esc_html__( 'Scroll', 'ashtanga-core' ),
					),
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_passepartout',
					'title'         => esc_html__( 'Passepartout', 'ashtanga-core' ),
					'description'   => esc_html__( 'Enabling this option will display a passepartout around website content', 'ashtanga-core' ),
					'default_value' => 'no',
				)
			);

			$passepartout_section = $page->add_section_element(
				array(
					'name'       => 'qodef_passepartout_section',
					'title'      => esc_html__( 'Passepartout Section', 'ashtanga-core' ),
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

			$page->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_content_width',
					'title'         => esc_html__( 'Initial Width of Content', 'ashtanga-core' ),
					'description'   => esc_html__( 'Choose the initial width of content which is in grid (applies to pages set to "Default Template" and rows set to "In Grid")', 'ashtanga-core' ),
					'options'       => ashtanga_core_get_select_type_options_pool( 'content_width', false ),
					'default_value' => '1300',
				)
			);

			// Hook to include additional options after module options
			do_action( 'ashtanga_core_action_after_general_options_map', $page );

			$page->add_field_element(
				array(
					'field_type'  => 'textarea',
					'name'        => 'qodef_custom_js',
					'title'       => esc_html__( 'Custom JS', 'ashtanga-core' ),
					'description' => esc_html__( 'Enter your custom JavaScript here', 'ashtanga-core' ),
				)
			);
		}
	}

	add_action( 'ashtanga_core_action_default_options_init', 'ashtanga_core_add_general_options', ashtanga_core_get_admin_options_map_position( 'general' ) );
}
