<?php

if ( ! function_exists( 'ashtanga_core_add_timetable_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function ashtanga_core_add_timetable_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => ASHTANGA_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'timetable',
				'icon'        => 'fa fa-book',
				'title'       => esc_html__( 'Timetable', 'ashtanga-core' ),
				'description' => esc_html__( 'Global Timetable Options', 'ashtanga-core' ),
			)
		);

		if ( $page ) {

			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_timetable_predefined_style',
					'title'         => esc_html__( 'Enable Predefined Style', 'ashtanga-core' ),
					'description'   => esc_html__( 'Enabling this option will set predefined style for timetable plugin', 'ashtanga-core' ),
					'options'       => ashtanga_core_get_select_type_options_pool( 'no_yes', false ),
					'default_value' => 'yes',
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_timetable_single_sidebar_layout',
					'title'         => esc_html__( 'Sidebar Layout', 'ashtanga-core' ),
					'description'   => esc_html__( 'Choose default sidebar layout for timetable single pages', 'ashtanga-core' ),
					'default_value' => 'no-sidebar',
					'options'       => ashtanga_core_get_select_type_options_pool( 'sidebar_layouts', false ),
				)
			);

			$custom_sidebars = ashtanga_core_get_custom_sidebars();
			if ( ! empty( $custom_sidebars ) && count( $custom_sidebars ) > 1 ) {
				$page->add_field_element(
					array(
						'field_type'  => 'select',
						'name'        => 'qodef_timetable_single_custom_sidebar',
						'title'       => esc_html__( 'Custom Sidebar', 'ashtanga-core' ),
						'description' => esc_html__( 'Choose a custom sidebar to display on timetable single pages', 'ashtanga-core' ),
						'options'     => $custom_sidebars,
					)
				);
			}

			$page->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_timetable_single_sidebar_grid_gutter',
					'title'       => esc_html__( 'Set Grid Gutter', 'ashtanga-core' ),
					'description' => esc_html__( 'Choose grid gutter size to set space between content and sidebar for blog single', 'ashtanga-core' ),
					'options'     => ashtanga_core_get_select_type_options_pool( 'items_space' ),
				)
			);

			$timetable_single_sidebar_grid_gutter_row = $page->add_row_element(
				array(
					'name'       => 'qodef_timetable_single_sidebar_grid_gutter_row',
					'dependency' => array(
						'show' => array(
							'qodef_timetable_single_sidebar_grid_gutter' => array(
								'values'        => 'custom',
								'default_value' => '',
							),
						),
					),
				)
			);

			$timetable_single_sidebar_grid_gutter_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_timetable_single_sidebar_grid_gutter_custom',
					'title'       => esc_html__( 'Custom Grid Gutter', 'ashtanga-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels', 'ashtanga-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$timetable_single_sidebar_grid_gutter_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_timetable_single_sidebar_grid_gutter_custom_1440',
					'title'       => esc_html__( 'Custom Grid Gutter - 1440', 'ashtanga-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels for screen size below 1440px', 'ashtanga-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$timetable_single_sidebar_grid_gutter_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_timetable_single_sidebar_grid_gutter_custom_1024',
					'title'       => esc_html__( 'Custom Grid Gutter - 1024', 'ashtanga-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels for screen size below 1024px', 'ashtanga-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$timetable_single_sidebar_grid_gutter_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_timetable_single_sidebar_grid_gutter_custom_680',
					'title'       => esc_html__( 'Custom Grid Gutter - 680', 'ashtanga-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels for screen size below 680px', 'ashtanga-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			// Hook to include additional options after module options
			do_action( 'ashtanga_core_action_after_timetable_options_map', $page );
		}
	}

	add_action( 'ashtanga_core_action_default_options_init', 'ashtanga_core_add_timetable_options', ashtanga_core_get_admin_options_map_position( 'timetable' ) );
}
