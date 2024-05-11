<?php

if ( ! function_exists( 'ashtanga_core_add_team_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function ashtanga_core_add_team_options() {
		$qode_framework = qode_framework_get_framework_root();
		$has_single     = ashtanga_core_team_has_single();

		if ( $has_single ) {

			$page = $qode_framework->add_options_page(
				array(
					'scope'       => ASHTANGA_CORE_OPTIONS_NAME,
					'type'        => 'admin',
					'slug'        => 'team',
					'layout'      => 'tabbed',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Team', 'ashtanga-core' ),
					'description' => esc_html__( 'Global Team Options', 'ashtanga-core' ),
				)
			);

			if ( $page ) {
				$archive_tab = $page->add_tab_element(
					array(
						'name'        => 'tab-archive',
						'icon'        => 'fa fa-cog',
						'title'       => esc_html__( 'Archive Settings', 'ashtanga-core' ),
						'description' => esc_html__( 'Settings related to team archive pages', 'ashtanga-core' ),
					)
				);

				do_action( 'ashtanga_core_action_after_team_options_archive', $archive_tab );

				$single_tab = $page->add_tab_element(
					array(
						'name'        => 'tab-single',
						'icon'        => 'fa fa-cog',
						'title'       => esc_html__( 'Single Settings', 'ashtanga-core' ),
						'description' => esc_html__( 'Settings related to team single pages', 'ashtanga-core' ),
					)
				);

				$single_tab->add_field_element(
					array(
						'field_type'  => 'select',
						'name'        => 'qodef_team_single_layout',
						'title'       => esc_html__( 'Single Layout', 'ashtanga-core' ),
						'description' => esc_html__( 'Choose default layout for team single', 'ashtanga-core' ),
						'options'     => array(
							'' => esc_html__( 'Default', 'ashtanga-core' ),
						),
					)
				);

				do_action( 'ashtanga_core_action_after_team_options_single', $single_tab );

				// Hook to include additional options after module options
				do_action( 'ashtanga_core_action_after_team_options_map', $page );
			}
		}
	}

	add_action( 'ashtanga_core_action_default_options_init', 'ashtanga_core_add_team_options', ashtanga_core_get_admin_options_map_position( 'team' ) );
}
