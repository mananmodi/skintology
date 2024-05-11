<?php

if ( ! function_exists( 'ashtanga_core_add_yith_wishlist_options' ) ) {
	/**
	 * Function that add general options for this module
	 *
	 * @param object $page
	 */
	function ashtanga_core_add_yith_wishlist_options( $page ) {

		if ( $page ) {

			if ( qode_framework_is_installed( 'yith-wishlist' ) ) {

				$yith_wishlist_tab = $page->add_tab_element(
					array(
						'name'        => 'tab-yith-wishlist',
						'icon'        => 'fa fa-cog',
						'title'       => esc_html__( 'YITH Wishlist', 'ashtanga-core' ),
						'description' => esc_html__( 'Settings related to YITH Wishlist', 'ashtanga-core' ),
					)
				);

				$yith_wishlist_tab->add_field_element(
					array(
						'field_type'    => 'yesno',
						'name'          => 'qodef_enable_woo_yith_wishlist_predefined_style',
						'title'         => esc_html__( 'Enable Predefined Style', 'ashtanga-core' ),
						'description'   => esc_html__( 'Enabling this option will set predefined style for YITH Wishlist plugin', 'ashtanga-core' ),
						'options'       => ashtanga_core_get_select_type_options_pool( 'no_yes', false ),
						'default_value' => 'yes',
					)
				);
			}
		}
	}

	add_action( 'ashtanga_core_action_after_woo_options_map', 'ashtanga_core_add_yith_wishlist_options' );
}
