<?php

if ( ! function_exists( 'ashtanga_core_add_textual_projects_showcase_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function ashtanga_core_add_textual_projects_showcase_shortcode( $shortcodes ) {
		$shortcodes[] = 'AshtangaCore_Textual_Projects_Showcase_Shortcode';

		return $shortcodes;
	}

	add_filter( 'ashtanga_core_filter_register_shortcodes', 'ashtanga_core_add_textual_projects_showcase_shortcode' );
}

if ( class_exists( 'AshtangaCore_Shortcode' ) ) {
	class AshtangaCore_Textual_Projects_Showcase_Shortcode extends AshtangaCore_Shortcode {

		public function __construct() {
			$this->set_extra_options( apply_filters( 'ashtanga_core_filter_textual_projects_extra_options', array() ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( ASHTANGA_CORE_SHORTCODES_URL_PATH . '/textual-projects-showcase' );
			$this->set_base( 'ashtanga_core_textual_projects_showcase' );
			$this->set_name( esc_html__( 'Textual Project Showcase', 'ashtanga-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays textual projects showcase', 'ashtanga-core' ) );

			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'ashtanga-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'appear',
					'title'      => esc_html__( 'Appear Animation', 'ashtanga-core' ),
					'options'    => ashtanga_core_get_select_type_options_pool( 'yes_no', false ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'text',
					'name'          => 'space_between',
					'title'         => esc_html__( 'Space Between Items', 'ashtanga-core' ),
					'default_value' => '',
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'image_hover',
					'title'         => esc_html__( 'Image Hover', 'ashtanga-core' ),
					'options'       => array(
						''             => esc_html__( 'None', 'ashtanga-core' ),
						'change-image' => esc_html__( 'Change Image', 'ashtanga-core' ),
						'zoom'         => esc_html__( 'Zoom Image', 'ashtanga-core' ),
					),
					'default_value' => '',
				)
			);

			$this->set_option(
				array(
					'field_type' => 'repeater',
					'name'       => 'children',
					'title'      => esc_html__( 'Item Elements', 'ashtanga-core' ),
					'items'      => array(
						array(
							'field_type'    => 'select',
							'name'          => 'item_type',
							'title'         => esc_html__( 'Type', 'ashtanga-core' ),
							'options'       => array(
								'image' => esc_html__( 'Image', 'ashtanga-core' ),
								'text'  => esc_html__( 'Text', 'ashtanga-core' ),
							),
							'default_value' => 'image',
						),
						array(
							'field_type' => 'image',
							'name'       => 'item_image',
							'title'      => esc_html__( 'Image', 'ashtanga-core' ),
							'dependency' => array(
								'show' => array(
									'item_type' => array(
										'values'        => array( 'image' ),
										'default_value' => 'image',
									),
								),
							),
						),
						array(
							'field_type' => 'image',
							'name'       => 'item_image_hover',
							'title'      => esc_html__( 'Hover Image', 'ashtanga-core' ),
							'dependency' => array(
								'show' => array(
									'item_type' => array(
										'values'        => array( 'image' ),
										'default_value' => 'image',
									),
								),
							),
						),
						array(
							'field_type' => 'text',
							'name'       => 'item_image_width',
							'title'      => esc_html__( 'Width', 'ashtanga-core' ),
							'responsive' => true,
							'dependency' => array(
								'show' => array(
									'item_type' => array(
										'values'        => array( 'image' ),
										'default_value' => 'image',
									),
								),
							),
						),
						array(
							'field_type'    => 'textarea',
							'name'          => 'item_text',
							'title'         => esc_html__( 'Text', 'ashtanga-core' ),
							'default_value' => '',
							'dependency'    => array(
								'show' => array(
									'item_type' => array(
										'values'        => array( 'text' ),
										'default_value' => '',
									),
								),
							),
						),
						array(
							'field_type'    => 'select',
							'name'          => 'item_alignment',
							'title'         => esc_html__( 'Item Alignment', 'ashtanga-core' ),
							'options'       => array(
								'flex-start' => esc_html__( 'Top', 'ashtanga-core' ),
								'center'     => esc_html__( 'Center', 'ashtanga-core' ),
								'flex-end'   => esc_html__( 'Bottom', 'ashtanga-core' ),
							),
							'default_value' => 'center',
						),
						array(
							'field_type' => 'text',
							'name'       => 'border_radius',
							'title'      => esc_html__( 'Image Border radius', 'ashtanga-core' ),
							'group'      => esc_html__( 'Text Style', 'ashtanga-core' ),
							'dependency' => array(
								'show' => array(
									'item_type' => array(
										'values'        => array( 'image' ),
										'default_value' => 'image',
									),
								),
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'text_color',
					'title'      => esc_html__( 'Text Color', 'ashtanga-core' ),
					'group'      => esc_html__( 'Text Style', 'ashtanga-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'font_size',
					'title'      => esc_html__( 'Font Size', 'ashtanga-core' ),
					'group'      => esc_html__( 'Text Style', 'ashtanga-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'line_height',
					'title'      => esc_html__( 'Line Height', 'ashtanga-core' ),
					'group'      => esc_html__( 'Text Style', 'ashtanga-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'font_size_680',
					'title'       => esc_html__( 'Font Size', 'ashtanga-core' ),
					'description' => esc_html__( 'Set responsive style value for screen size 680', 'ashtanga-core' ),
					'group'       => esc_html__( 'Screen Size 680 Text Style', 'ashtanga-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'line_height_680',
					'title'       => esc_html__( 'Line Height', 'ashtanga-core' ),
					'description' => esc_html__( 'Set responsive style value for screen size 680', 'ashtanga-core' ),
					'group'       => esc_html__( 'Screen Size 680 Text Style', 'ashtanga-core' ),
				)
			);
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['holder_styles']  = $this->get_holder_styles( $atts );
			$atts['items']          = $this->parse_repeater_items( $atts['children'] );

			$atts['this_shortcode'] = $this;

			return ashtanga_core_get_template_part( 'shortcodes/textual-projects-showcase', 'templates/content', '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes   = $this->init_holder_classes();
			$holder_classes[] = 'qodef-textual-projects-showcase';
			$holder_classes[] = ! empty( $atts['image_hover'] ) ? 'qodef-image-hover--' . esc_attr( $atts['image_hover'] ) : '';
			$holder_classes[] = ( 'yes' === $atts['appear'] ) ? 'qodef-has-appear' : '';

			return implode( ' ', $holder_classes );
		}

		private function get_holder_styles( $atts ) {
			$styles = array();

			if ( '' !== $atts['space_between'] && $atts['space_between']) {
				if ( qode_framework_string_ends_with_space_units( $atts['space_between'] ) ) {
					$styles[] = '--space-between: ' . $atts['space_between'];
				} else {
					$styles[] = '--space-between: ' . intval( $atts['space_between'] ) . 'px';
				}
			}

			if ( '' !== $atts['font_size']  && $atts['font_size']) {
				if ( qode_framework_string_ends_with_space_units( $atts['font_size'] ) ) {
					$styles[] = '--fs: ' . $atts['font_size'];
				} else {
					$styles[] = '--fs: ' . intval( $atts['font_size'] ) . 'px';
				}
			}

			if ( '' !== $atts['line_height']  && $atts['line_height']) {
				if ( qode_framework_string_ends_with_space_units( $atts['line_height'] ) ) {
					$styles[] = '--lh: ' . $atts['line_height'];
				} else {
					$styles[] = '--lh: ' . intval( $atts['line_height'] ) . 'px';
				}
			}

			if ( '' !== $atts['font_size_680'] && $atts['font_size_680']) {
				if ( qode_framework_string_ends_with_space_units( $atts['font_size_680'] ) ) {
					$styles[] = '--fs680: ' . $atts['font_size_680'];
				} else {
					$styles[] = '--fs680: ' . intval( $atts['font_size_680'] ) . 'px';
				}
			}

			if ( '' !== $atts['line_height_680'] && $atts['line_height_680']) {
				if ( qode_framework_string_ends_with_space_units( $atts['line_height_680'] ) ) {
					$styles[] = '--lh680: ' . $atts['line_height_680'];
				} else {
					$styles[] = '--lh680: ' . intval( $atts['line_height_680'] ) . 'px';
				}
			}

			if ( ! empty( $atts['text_color'] )  && $atts['text_color']) {
				$styles[] = '--text-color: ' . $atts['text_color'];
			}

			return $styles;
		}

		public function get_item_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['item_alignment'] ) &&  $atts['item_alignment']) {
				$styles[] = '--align-self: ' . $atts['item_alignment'];
			}

			if ( '' !== $atts['item_image_width'] && $atts['item_image_width']) {
				if ( qode_framework_string_ends_with_space_units( $atts['item_image_width'] ) ) {
					$styles[] = '--image-width: ' . $atts['item_image_width'];
				} else {
					$styles[] = '--image-width: ' . intval( $atts['item_image_width'] ) . 'px';
				}
			}

			if ( '' !== $atts['border_radius']  && $atts['border_radius']) {
				if ( qode_framework_string_ends_with_space_units( $atts['border_radius'] ) ) {
					$styles[] = '--image-border-radius: ' . $atts['border_radius'];
				} else {
					$styles[] = '--image-border-radius: ' . intval( $atts['border_radius'] ) . 'px';
				}
			}

			return $styles;
		}
	}
}
