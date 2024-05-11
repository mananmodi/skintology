<?php

if ( ! function_exists( 'ashtanga_core_add_page_sidebar_meta_box' ) ) {
	/**
	 * Function that add general meta box options for this module
	 *
	 * @param object $page
	 */
	function ashtanga_core_add_page_sidebar_meta_box( $page ) {

		if ( $page ) {

			$sidebar_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-sidebar',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Sidebar Settings', 'ashtanga-core' ),
					'description' => esc_html__( 'Sidebar layout settings', 'ashtanga-core' ),
				)
			);

			$sidebar_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_page_sidebar_layout',
					'title'       => esc_html__( 'Sidebar Layout', 'ashtanga-core' ),
					'description' => esc_html__( 'Choose a sidebar layout', 'ashtanga-core' ),
					'options'     => ashtanga_core_get_select_type_options_pool( 'sidebar_layouts' ),
				)
			);

			$custom_sidebars = ashtanga_core_get_custom_sidebars();
			if ( ! empty( $custom_sidebars ) && count( $custom_sidebars ) > 1 ) {
				$sidebar_tab->add_field_element(
					array(
						'field_type'  => 'select',
						'name'        => 'qodef_page_custom_sidebar',
						'title'       => esc_html__( 'Custom Sidebar', 'ashtanga-core' ),
						'description' => esc_html__( 'Choose a custom sidebar', 'ashtanga-core' ),
						'options'     => $custom_sidebars,
					)
				);
			}

			$sidebar_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_page_sidebar_grid_gutter',
					'title'       => esc_html__( 'Set Grid Gutter', 'ashtanga-core' ),
					'description' => esc_html__( 'Choose grid gutter size to set space between content and sidebar', 'ashtanga-core' ),
					'options'     => ashtanga_core_get_select_type_options_pool( 'items_space' ),
				)
			);

			$page_sidebar_grid_gutter_row = $sidebar_tab->add_row_element(
				array(
					'name'       => 'qodef_page_sidebar_grid_gutter_row',
					'dependency' => array(
						'show' => array(
							'qodef_page_sidebar_grid_gutter' => array(
								'values'        => 'custom',
								'default_value' => '',
							),
						),
					),
				)
			);

			$page_sidebar_grid_gutter_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_page_sidebar_grid_gutter_custom',
					'title'       => esc_html__( 'Custom Grid Gutter', 'ashtanga-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels', 'ashtanga-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$page_sidebar_grid_gutter_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_page_sidebar_grid_gutter_custom_1440',
					'title'       => esc_html__( 'Custom Grid Gutter - 1440', 'ashtanga-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels for screen size below 1440px', 'ashtanga-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$page_sidebar_grid_gutter_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_page_sidebar_grid_gutter_custom_1024',
					'title'       => esc_html__( 'Custom Grid Gutter - 1024', 'ashtanga-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels for screen size below 1024px', 'ashtanga-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$page_sidebar_grid_gutter_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_page_sidebar_grid_gutter_custom_680',
					'title'       => esc_html__( 'Custom Grid Gutter - 680', 'ashtanga-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels for screen size below 680px', 'ashtanga-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			// Hook to include additional options after module options
			do_action( 'ashtanga_core_action_after_page_sidebar_meta_box_map', $sidebar_tab );
		}
	}

	add_action( 'ashtanga_core_action_after_general_meta_box_map', 'ashtanga_core_add_page_sidebar_meta_box' );
}

if ( ! function_exists( 'ashtanga_core_add_general_page_sidebar_meta_box_callback' ) ) {
	/**
	 * Function that set current meta box callback as general callback functions
	 *
	 * @param array $callbacks
	 *
	 * @return array
	 */
	function ashtanga_core_add_general_page_sidebar_meta_box_callback( $callbacks ) {
		$callbacks['page-sidebar'] = 'ashtanga_core_add_page_sidebar_meta_box';

		return $callbacks;
	}

	add_filter( 'ashtanga_core_filter_general_meta_box_callbacks', 'ashtanga_core_add_general_page_sidebar_meta_box_callback' );
}
