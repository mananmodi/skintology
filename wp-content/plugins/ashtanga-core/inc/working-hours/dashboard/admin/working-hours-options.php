<?php

if ( ! function_exists( 'ashtanga_core_add_working_hours_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function ashtanga_core_add_working_hours_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => ASHTANGA_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'working-hours',
				'icon'        => 'fa fa-book',
				'title'       => esc_html__( 'Working Hours', 'ashtanga-core' ),
				'description' => esc_html__( 'Global Working Hours Options', 'ashtanga-core' ),
			)
		);

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_working_hours_monday',
					'title'      => esc_html__( 'Working Hours For Monday', 'ashtanga-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_working_hours_tuesday',
					'title'      => esc_html__( 'Working Hours For Tuesday', 'ashtanga-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_working_hours_wednesday',
					'title'      => esc_html__( 'Working Hours For Wednesday', 'ashtanga-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_working_hours_thursday',
					'title'      => esc_html__( 'Working Hours For Thursday', 'ashtanga-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_working_hours_friday',
					'title'      => esc_html__( 'Working Hours For Friday', 'ashtanga-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_working_hours_saturday',
					'title'      => esc_html__( 'Working Hours For Saturday', 'ashtanga-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_working_hours_sunday',
					'title'      => esc_html__( 'Working Hours For Sunday', 'ashtanga-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'checkbox',
					'name'       => 'qodef_working_hours_special_days',
					'title'      => esc_html__( 'Special Days', 'ashtanga-core' ),
					'options'    => array(
						'monday'    => esc_html__( 'Monday', 'ashtanga-core' ),
						'tuesday'   => esc_html__( 'Tuesday', 'ashtanga-core' ),
						'wednesday' => esc_html__( 'Wednesday', 'ashtanga-core' ),
						'thursday'  => esc_html__( 'Thursday', 'ashtanga-core' ),
						'friday'    => esc_html__( 'Friday', 'ashtanga-core' ),
						'saturday'  => esc_html__( 'Saturday', 'ashtanga-core' ),
						'sunday'    => esc_html__( 'Sunday', 'ashtanga-core' ),
					),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_working_hours_special_text',
					'title'      => esc_html__( 'Featured Text For Special Days', 'ashtanga-core' ),
				)
			);

			// Hook to include additional options after module options
			do_action( 'ashtanga_core_action_after_working_hours_options_map', $page );
		}
	}

	add_action( 'ashtanga_core_action_default_options_init', 'ashtanga_core_add_working_hours_options', ashtanga_core_get_admin_options_map_position( 'working-hours' ) );
}
