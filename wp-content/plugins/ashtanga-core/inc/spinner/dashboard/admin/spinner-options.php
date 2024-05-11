<?php

if ( ! function_exists( 'ashtanga_core_add_page_spinner_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function ashtanga_core_add_page_spinner_options( $page ) {

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_page_spinner',
					'title'         => esc_html__( 'Enable Page Spinner', 'ashtanga-core' ),
					'description'   => esc_html__( 'Enable Page Spinner Effect', 'ashtanga-core' ),
					'default_value' => 'no',
				)
			);

			$spinner_section = $page->add_section_element(
				array(
					'name'       => 'qodef_page_spinner_section',
					'title'      => esc_html__( 'Page Spinner Section', 'ashtanga-core' ),
					'dependency' => array(
						'show' => array(
							'qodef_enable_page_spinner' => array(
								'values'        => 'yes',
								'default_value' => 'no',
							),
						),
					),
				)
			);

			$spinner_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_page_spinner_type',
					'title'         => esc_html__( 'Select Page Spinner Type', 'ashtanga-core' ),
					'description'   => esc_html__( 'Choose a page spinner animation style', 'ashtanga-core' ),
					'options'       => apply_filters( 'ashtanga_core_filter_page_spinner_layout_options', array() ),
					'default_value' => apply_filters( 'ashtanga_core_filter_page_spinner_default_layout_option', '' ),
				)
			);

			$spinner_section->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_page_spinner_image',
					'title'       => esc_html__( 'Spinner Image', 'ashtanga-core' ),
					'description' => esc_html__( 'Choose the spinner image', 'ashtanga-core' ),
					'dependency'  => array(
						'show' => array(
							'qodef_page_spinner_type' => array(
								'values'        => 'ashtanga',
								'default_value' => ''
							)
						)
					)
				)
			);

			$spinner_section->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_page_spinner_background_color',
					'title'       => esc_html__( 'Spinner Background Color', 'ashtanga-core' ),
					'description' => esc_html__( 'Choose the spinner background color', 'ashtanga-core' ),
				)
			);

			$spinner_section->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_page_spinner_color',
					'title'       => esc_html__( 'Spinner Color', 'ashtanga-core' ),
					'description' => esc_html__( 'Choose the spinner color', 'ashtanga-core' ),
				)
			);

			$spinner_section->add_field_element(
				array(
					'field_type'    => 'text',
					'name'          => 'qodef_page_spinner_text',
					'title'         => esc_html__( 'Spinner Text', 'ashtanga-core' ),
					'description'   => esc_html__( 'Enter the spinner text', 'ashtanga-core' ),
					'default_value' => 'ashtanga',
					'dependency'    => array(
						'show' => array(
							'qodef_page_spinner_type' => array(
								'values'        => 'textual',
								'default_value' => ''
							)
						)
					)
				)
			);

			$spinner_section->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_page_spinner_fade_out_animation',
					'title'         => esc_html__( 'Enable Fade Out Animation', 'ashtanga-core' ),
					'description'   => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'ashtanga-core' ),
					'default_value' => 'no',
				)
			);
		}
	}

	add_action( 'ashtanga_core_action_after_general_options_map', 'ashtanga_core_add_page_spinner_options' );
}
