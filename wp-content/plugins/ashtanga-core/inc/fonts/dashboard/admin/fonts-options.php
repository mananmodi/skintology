<?php

if ( ! function_exists( 'ashtanga_core_add_fonts_options' ) ) {
	/**
	 * Function that add options for this module
	 */
	function ashtanga_core_add_fonts_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => ASHTANGA_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'fonts',
				'title'       => esc_html__( 'Fonts', 'ashtanga-core' ),
				'description' => esc_html__( 'Global Fonts Options', 'ashtanga-core' ),
				'icon'        => 'fa fa-cog',
			)
		);

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_google_fonts',
					'title'         => esc_html__( 'Enable Google Fonts', 'ashtanga-core' ),
					'default_value' => 'yes',
					'args'          => array(
						'custom_class' => 'qodef-enable-google-fonts',
					),
				)
			);

			$google_fonts_section = $page->add_section_element(
				array(
					'name'       => 'qodef_google_fonts_section',
					'title'      => esc_html__( 'Google Fonts Options', 'ashtanga-core' ),
					'dependency' => array(
						'show' => array(
							'qodef_enable_google_fonts' => array(
								'values'        => 'yes',
								'default_value' => '',
							),
						),
					),
				)
			);

			$page_repeater = $google_fonts_section->add_repeater_element(
				array(
					'name'        => 'qodef_choose_google_fonts',
					'title'       => esc_html__( 'Google Fonts to Include', 'ashtanga-core' ),
					'description' => esc_html__( 'Choose Google Fonts which you want to use on your website', 'ashtanga-core' ),
					'button_text' => esc_html__( 'Add New Google Font', 'ashtanga-core' ),
				)
			);

			$page_repeater->add_field_element(
				array(
					'field_type'  => 'googlefont',
					'name'        => 'qodef_choose_google_font',
					'title'       => esc_html__( 'Google Font', 'ashtanga-core' ),
					'description' => esc_html__( 'Choose Google Font', 'ashtanga-core' ),
					'args'        => array(
						'include' => 'google-fonts',
					),
				)
			);

			$google_fonts_section->add_field_element(
				array(
					'field_type'  => 'checkbox',
					'name'        => 'qodef_google_fonts_weight',
					'title'       => esc_html__( 'Google Fonts Weight', 'ashtanga-core' ),
					'description' => esc_html__( 'Choose a default Google Fonts weights for your website. Impact on page load time', 'ashtanga-core' ),
					'options'     => array(
						'100'  => esc_html__( '100 Thin', 'ashtanga-core' ),
						'100i' => esc_html__( '100 Thin Italic', 'ashtanga-core' ),
						'200'  => esc_html__( '200 Extra-Light', 'ashtanga-core' ),
						'200i' => esc_html__( '200 Extra-Light Italic', 'ashtanga-core' ),
						'300'  => esc_html__( '300 Light', 'ashtanga-core' ),
						'300i' => esc_html__( '300 Light Italic', 'ashtanga-core' ),
						'400'  => esc_html__( '400 Regular', 'ashtanga-core' ),
						'400i' => esc_html__( '400 Regular Italic', 'ashtanga-core' ),
						'500'  => esc_html__( '500 Medium', 'ashtanga-core' ),
						'500i' => esc_html__( '500 Medium Italic', 'ashtanga-core' ),
						'600'  => esc_html__( '600 Semi-Bold', 'ashtanga-core' ),
						'600i' => esc_html__( '600 Semi-Bold Italic', 'ashtanga-core' ),
						'700'  => esc_html__( '700 Bold', 'ashtanga-core' ),
						'700i' => esc_html__( '700 Bold Italic', 'ashtanga-core' ),
						'800'  => esc_html__( '800 Extra-Bold', 'ashtanga-core' ),
						'800i' => esc_html__( '800 Extra-Bold Italic', 'ashtanga-core' ),
						'900'  => esc_html__( '900 Ultra-Bold', 'ashtanga-core' ),
						'900i' => esc_html__( '900 Ultra-Bold Italic', 'ashtanga-core' ),
					),
				)
			);

			$google_fonts_section->add_field_element(
				array(
					'field_type'  => 'checkbox',
					'name'        => 'qodef_google_fonts_subset',
					'title'       => esc_html__( 'Google Fonts Style', 'ashtanga-core' ),
					'description' => esc_html__( 'Choose a default Google Fonts style for your website. Impact on page load time', 'ashtanga-core' ),
					'options'     => array(
						'latin'        => esc_html__( 'Latin', 'ashtanga-core' ),
						'latin-ext'    => esc_html__( 'Latin Extended', 'ashtanga-core' ),
						'cyrillic'     => esc_html__( 'Cyrillic', 'ashtanga-core' ),
						'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'ashtanga-core' ),
						'greek'        => esc_html__( 'Greek', 'ashtanga-core' ),
						'greek-ext'    => esc_html__( 'Greek Extended', 'ashtanga-core' ),
						'vietnamese'   => esc_html__( 'Vietnamese', 'ashtanga-core' ),
					),
				)
			);

			$page_repeater = $page->add_repeater_element(
				array(
					'name'        => 'qodef_custom_fonts',
					'title'       => esc_html__( 'Custom Fonts', 'ashtanga-core' ),
					'description' => esc_html__( 'Add custom fonts', 'ashtanga-core' ),
					'button_text' => esc_html__( 'Add New Custom Font', 'ashtanga-core' ),
				)
			);

			$page_repeater->add_field_element(
				array(
					'field_type' => 'file',
					'name'       => 'qodef_custom_font_ttf',
					'title'      => esc_html__( 'Custom Font TTF', 'ashtanga-core' ),
					'args'       => array(
						'allowed_type' => 'application/octet-stream',
					),
				)
			);

			$page_repeater->add_field_element(
				array(
					'field_type' => 'file',
					'name'       => 'qodef_custom_font_otf',
					'title'      => esc_html__( 'Custom Font OTF', 'ashtanga-core' ),
					'args'       => array(
						'allowed_type' => 'application/octet-stream',
					),
				)
			);

			$page_repeater->add_field_element(
				array(
					'field_type' => 'file',
					'name'       => 'qodef_custom_font_woff',
					'title'      => esc_html__( 'Custom Font WOFF', 'ashtanga-core' ),
					'args'       => array(
						'allowed_type' => 'application/octet-stream',
					),
				)
			);

			$page_repeater->add_field_element(
				array(
					'field_type' => 'file',
					'name'       => 'qodef_custom_font_woff2',
					'title'      => esc_html__( 'Custom Font WOFF2', 'ashtanga-core' ),
					'args'       => array(
						'allowed_type' => 'application/octet-stream',
					),
				)
			);

			$page_repeater->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_custom_font_name',
					'title'      => esc_html__( 'Custom Font Name', 'ashtanga-core' ),
				)
			);

			// Hook to include additional options after module options
			do_action( 'ashtanga_core_action_after_page_fonts_options_map', $page );
		}
	}

	add_action( 'ashtanga_core_action_default_options_init', 'ashtanga_core_add_fonts_options', ashtanga_core_get_admin_options_map_position( 'fonts' ) );
}
