<?php

if ( ! function_exists( 'ashtanga_core_add_page_title_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function ashtanga_core_add_page_title_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => ASHTANGA_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'title',
				'icon'        => 'fa fa-cog',
				'title'       => esc_html__( 'Title', 'ashtanga-core' ),
				'description' => esc_html__( 'Global Title Options', 'ashtanga-core' ),
			)
		);

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_page_title',
					'title'         => esc_html__( 'Enable Page Title', 'ashtanga-core' ),
					'description'   => esc_html__( 'Use this option to enable/disable page title', 'ashtanga-core' ),
					'default_value' => 'yes',
				)
			);

			$page_title_section = $page->add_section_element(
				array(
					'name'       => 'qodef_page_title_section',
					'title'      => esc_html__( 'Title Area', 'ashtanga-core' ),
					'dependency' => array(
						'hide' => array(
							'qodef_enable_page_title' => array(
								'values'        => 'no',
								'default_value' => '',
							),
						),
					),
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_title_layout',
					'title'         => esc_html__( 'Title Layout', 'ashtanga-core' ),
					'description'   => esc_html__( 'Choose a title layout', 'ashtanga-core' ),
					'options'       => apply_filters( 'ashtanga_core_filter_title_layout_options', array() ),
					'default_value' => 'standard',
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_set_page_title_area_in_grid',
					'title'         => esc_html__( 'Page Title In Grid', 'ashtanga-core' ),
					'description'   => esc_html__( 'Enabling this option will set page title area to be in grid', 'ashtanga-core' ),
					'default_value' => 'yes',
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_page_title_height',
					'title'       => esc_html__( 'Height', 'ashtanga-core' ),
					'description' => esc_html__( 'Enter title height', 'ashtanga-core' ),
					'args'        => array(
						'suffix' => esc_html__( 'px', 'ashtanga-core' ),
					),
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_page_title_height_on_smaller_screens',
					'title'       => esc_html__( 'Height on Smaller Screens', 'ashtanga-core' ),
					'description' => esc_html__( 'Enter title height to be displayed on smaller screens with active mobile header', 'ashtanga-core' ),
					'args'        => array(
						'suffix' => esc_html__( 'px', 'ashtanga-core' ),
					),
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_page_title_background_color',
					'title'       => esc_html__( 'Background Color', 'ashtanga-core' ),
					'description' => esc_html__( 'Enter page title area background color', 'ashtanga-core' ),
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_page_title_background_image',
					'title'       => esc_html__( 'Background Image', 'ashtanga-core' ),
					'description' => esc_html__( 'Enter page title area background image', 'ashtanga-core' ),
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_page_title_background_image_behavior',
					'title'      => esc_html__( 'Background Image Behavior', 'ashtanga-core' ),
					'options'    => array(
						''           => esc_html__( 'Default', 'ashtanga-core' ),
						'responsive' => esc_html__( 'Set Responsive Image', 'ashtanga-core' ),
						'parallax'   => esc_html__( 'Set Parallax Image', 'ashtanga-core' ),
					),
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_border',
					'title'         => esc_html__( 'Border', 'ashtanga-core' ),
					'description'   => esc_html__( 'Enabling this option will set border around all title', 'ashtanga-core' ),
					'options'       => ashtanga_core_get_select_type_options_pool( 'no_yes' ),
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_page_title_color',
					'title'      => esc_html__( 'Title Color', 'ashtanga-core' ),
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_page_title_tag',
					'title'         => esc_html__( 'Title Tag', 'ashtanga-core' ),
					'description'   => esc_html__( 'Enabling this option will set title tag', 'ashtanga-core' ),
					'options'       => ashtanga_core_get_select_type_options_pool( 'title_tag', false ),
					'default_value' => 'h1',
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_page_title_text_alignment',
					'title'         => esc_html__( 'Text Alignment', 'ashtanga-core' ),
					'options'       => array(
						'left'   => esc_html__( 'Left', 'ashtanga-core' ),
						'center' => esc_html__( 'Center', 'ashtanga-core' ),
						'right'  => esc_html__( 'Right', 'ashtanga-core' ),
					),
					'default_value' => 'left',
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_page_title_vertical_text_alignment',
					'title'         => esc_html__( 'Vertical Text Alignment', 'ashtanga-core' ),
					'options'       => array(
						'header-bottom' => esc_html__( 'From Bottom of Header', 'ashtanga-core' ),
						'window-top'    => esc_html__( 'From Window Top', 'ashtanga-core' ),
					),
					'default_value' => 'header-bottom',
				)
			);

			// Hook to include additional options after module options
			do_action( 'ashtanga_core_action_after_page_title_options_map', $page_title_section );
		}
	}

	add_action( 'ashtanga_core_action_default_options_init', 'ashtanga_core_add_page_title_options', ashtanga_core_get_admin_options_map_position( 'title' ) );
}
