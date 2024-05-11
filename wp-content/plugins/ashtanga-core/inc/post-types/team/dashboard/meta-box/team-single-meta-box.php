<?php

if ( ! function_exists( 'ashtanga_core_add_team_single_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function ashtanga_core_add_team_single_meta_box() {
		$qode_framework = qode_framework_get_framework_root();
		$has_single     = ashtanga_core_team_has_single();

		$page = $qode_framework->add_options_page(
			array(
				'scope' => array( 'team' ),
				'type'  => 'meta',
				'slug'  => 'team',
				'title' => esc_html__( 'Team Single', 'ashtanga-core' ),
			)
		);

		if ( $page ) {
			$section = $page->add_section_element(
				array(
					'name'        => 'qodef_team_general_section',
					'title'       => esc_html__( 'General Settings', 'ashtanga-core' ),
					'description' => esc_html__( 'General information about team member.', 'ashtanga-core' ),
				)
			);

			if ( $has_single ) {
				$section->add_field_element(
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
			}

			$section->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_team_page_background_image',
					'title'       => esc_html__( 'Page Background Image', 'ashtanga-core' ),
					'description' => esc_html__( 'Set background image', 'ashtanga-core' ),
				)
			);

			$section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_team_page_background_repeat',
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

			$section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_team_page_background_size',
					'title'       => esc_html__( 'Page Background Image Size', 'ashtanga-core' ),
					'description' => esc_html__( 'Set background image size', 'ashtanga-core' ),
					'options'     => array(
						''        => esc_html__( 'Default', 'ashtanga-core' ),
						'contain' => esc_html__( 'Contain', 'ashtanga-core' ),
						'cover'   => esc_html__( 'Cover', 'ashtanga-core' ),
					),
				)
			);

			$section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_team_member_role',
					'title'       => esc_html__( 'Role', 'ashtanga-core' ),
					'description' => esc_html__( 'Enter team member role', 'ashtanga-core' ),
				)
			);

			$section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_team_member_image_shape',
					'title'         => esc_html__( 'Image shape', 'ashtanga-core' ),
					'description'   => esc_html__( 'Enabling this option will change the shape of team member\'s featured image on team lists', 'ashtanga-core' ),
					'options'       => array(
						''             => esc_html__( 'Default', 'ashtanga-core' ),
						'artistic'     => esc_html__( 'Artistic', 'ashtanga-core' ),
						'double-curve' => esc_html__( 'Double Curve', 'ashtanga-core' ),
					),
					'default_value' => '',
				)
			);

			$section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_team_member_margin',
					'title'       => esc_html__( 'Team Member Custom Margin', 'ashtanga-core' ),
					'description' => esc_html__( 'Choose team member margin when it appears in team list (ex. 5% 5% 5% 5%)', 'ashtanga-core' ),
				)
			);

			$social_icons_repeater = $section->add_repeater_element(
				array(
					'name'        => 'qodef_team_member_social_icons',
					'title'       => esc_html__( 'Social Networks', 'stronger-core' ),
					'description' => esc_html__( 'Populate team member social networks info', 'stronger-core' ),
					'button_text' => esc_html__( 'Add New Network', 'stronger-core' ),
				)
			);

			$social_icons_repeater->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_team_member_icon_source',
					'title'         => esc_html__( 'Team Member Icon Source', 'stronger-core' ),
					'options'       => ashtanga_core_get_select_type_options_pool( 'icon_source', false, array( 'predefined' ), array( 'text' => esc_html__( 'Text', 'ashtanga-core' ) ) ),
					'default_value' => 'svg_path',
				)
			);

			$social_icons_repeater->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_team_social_text',
					'title'       => esc_html__( 'Text', 'ashtanga-core' ),
					'description' => esc_html__( 'Enter two chars representing social network, eg. "Fb" for "Facebook"', 'ashtanga-core' ),
					'dependency'  => array(
						'show' => array(
							'qodef_team_member_icon_source' => array(
								'values'        => 'text',
								'default_value' => 'text',
							),
						),
					),
				)
			);
			$social_icons_repeater->add_field_element(
				array(
					'field_type' => 'iconpack',
					'name'       => 'qodef_team_member_icon',
					'title'      => esc_html__( 'Icon', 'stronger-core' ),
					'dependency' => array(
						'show' => array(
							'qodef_team_member_icon_source' => array(
								'values'        => 'icon_pack',
								'default_value' => 'text',
							),
						),
					),
				)
			);

			$social_icons_repeater->add_field_element(
				array(
					'field_type'  => 'textarea',
					'name'        => 'qodef_team_member_svg_path',
					'title'       => esc_html__( 'Team Member Icon SVG Path', 'stronger-core' ),
					'description' => esc_html__( 'Enter your search open icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'stronger-core' ),
					'dependency' => array(
						'show' => array(
							'qodef_team_member_icon_source' => array(
								'values'        => 'svg_path',
								'default_value' => 'text',
							),
						),
					),
				)
			);

			$social_icons_repeater->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_team_member_icon_link',
					'title'      => esc_html__( 'Icon Link', 'stronger-core' ),
				)
			);

			$social_icons_repeater->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_team_member_icon_target',
					'title'      => esc_html__( 'Icon Target', 'stronger-core' ),
					'options'    => ashtanga_core_get_select_type_options_pool( 'link_target' ),
				)
			);

			// Hook to include additional options after module options
			do_action( 'ashtanga_core_action_after_team_meta_box_map', $page, $has_single );
		}
	}

	add_action( 'ashtanga_core_action_default_meta_boxes_init', 'ashtanga_core_add_team_single_meta_box' );
}
