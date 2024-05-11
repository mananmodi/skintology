<?php

if ( ! function_exists( 'ashtanga_core_add_team_single_sidebar_meta_boxes' ) ) {
	/**
	 * Function that add sidebar meta boxes for team single module
	 */
	function ashtanga_core_add_team_single_sidebar_meta_boxes( $page, $has_single ) {

		if ( $page && $has_single ) {
			$section = $page->add_section_element(
				array(
					'name'  => 'qodef_team_sidebar_section',
					'title' => esc_html__( 'Sidebar Settings', 'ashtanga-core' ),
				)
			);

			$section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_team_single_sidebar_layout',
					'title'         => esc_html__( 'Sidebar Layout', 'ashtanga-core' ),
					'description'   => esc_html__( 'Choose default sidebar layout for team singles', 'ashtanga-core' ),
					'default_value' => '',
					'options'       => ashtanga_core_get_select_type_options_pool( 'sidebar_layouts' ),
				)
			);

			$custom_sidebars = ashtanga_core_get_custom_sidebars();
			if ( ! empty( $custom_sidebars ) && count( $custom_sidebars ) > 1 ) {
				$section->add_field_element(
					array(
						'field_type'  => 'select',
						'name'        => 'qodef_team_single_custom_sidebar',
						'title'       => esc_html__( 'Custom Sidebar', 'ashtanga-core' ),
						'description' => esc_html__( 'Choose a custom sidebar to display on team singles', 'ashtanga-core' ),
						'options'     => $custom_sidebars,
					)
				);
			}

			$section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_team_single_sidebar_grid_gutter',
					'title'       => esc_html__( 'Set Grid Gutter', 'ashtanga-core' ),
					'description' => esc_html__( 'Choose grid gutter size to set space between content and sidebar', 'ashtanga-core' ),
					'options'     => ashtanga_core_get_select_type_options_pool( 'items_space' ),
				)
			);

			$team_single_sidebar_grid_gutter_row = $section->add_row_element(
				array(
					'name'       => 'qodef_team_single_sidebar_grid_gutter_row',
					'dependency' => array(
						'show' => array(
							'qodef_team_single_sidebar_grid_gutter' => array(
								'values'        => 'custom',
								'default_value' => '',
							),
						),
					),
				)
			);

			$team_single_sidebar_grid_gutter_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_team_single_sidebar_grid_gutter_custom',
					'title'       => esc_html__( 'Custom Grid Gutter', 'ashtanga-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels', 'ashtanga-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$team_single_sidebar_grid_gutter_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_team_single_sidebar_grid_gutter_custom_1440',
					'title'       => esc_html__( 'Custom Grid Gutter - 1440', 'ashtanga-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels for screen size below 1440px', 'ashtanga-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$team_single_sidebar_grid_gutter_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_team_single_sidebar_grid_gutter_custom_1024',
					'title'       => esc_html__( 'Custom Grid Gutter - 1024', 'ashtanga-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels for screen size below 1024px', 'ashtanga-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$team_single_sidebar_grid_gutter_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_team_single_sidebar_grid_gutter_custom_680',
					'title'       => esc_html__( 'Custom Grid Gutter - 680', 'ashtanga-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels for screen size below 680px', 'ashtanga-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);
		}
	}

	add_action( 'ashtanga_core_action_after_team_meta_box_map', 'ashtanga_core_add_team_single_sidebar_meta_boxes', 10, 2 );
}
