<?php

if ( ! function_exists( 'ashtanga_core_add_image_gallery_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function ashtanga_core_add_image_gallery_shortcode( $shortcodes ) {
		$shortcodes[] = 'AshtangaCore_Image_Gallery_Shortcode';

		return $shortcodes;
	}

	add_filter( 'ashtanga_core_filter_register_shortcodes', 'ashtanga_core_add_image_gallery_shortcode' );
}

if ( class_exists( 'AshtangaCore_List_Shortcode' ) ) {
	class AshtangaCore_Image_Gallery_Shortcode extends AshtangaCore_List_Shortcode {

		public function map_shortcode() {
			$this->set_shortcode_path( ASHTANGA_CORE_SHORTCODES_URL_PATH . '/image-gallery' );
			$this->set_base( 'ashtanga_core_image_gallery' );
			$this->set_name( esc_html__( 'Image Gallery', 'ashtanga-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds image gallery element', 'ashtanga-core' ) );
			$this->set_scripts(
				array(
					'jquery-magnific-popup' => array(
						'registered' => true,
					),
				)
			);
			$this->set_necessary_styles(
				array(
					'magnific-popup' => array(
						'registered' => true,
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'ashtanga-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'image',
					'name'       => 'images',
					'multiple'   => 'yes',
					'title'      => esc_html__( 'Images', 'ashtanga-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'image_size',
					'title'       => esc_html__( 'Image Size', 'ashtanga-core' ),
					'description' => esc_html__( 'For predefined image sizes input thumbnail, medium, large or full. If you wish to set a custom image size, type in the desired image dimensions in pixels (e.g. 400x400).', 'ashtanga-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'image_action',
					'title'      => esc_html__( 'Image Action', 'ashtanga-core' ),
					'options'    => array(
						''            => esc_html__( 'No Action', 'ashtanga-core' ),
						'open-popup'  => esc_html__( 'Open Popup', 'ashtanga-core' ),
						'custom-link' => esc_html__( 'Custom Link', 'ashtanga-core' ),
					),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'target',
					'title'         => esc_html__( 'Custom Link Target', 'ashtanga-core' ),
					'options'       => ashtanga_core_get_select_type_options_pool( 'link_target' ),
					'default_value' => '_self',
					'dependency'    => array(
						'show' => array(
							'image_action' => array(
								'values'        => 'custom-link',
								'default_value' => '',
							),
						),
					),
				)
			);
			$this->map_list_options(
				array(
					'exclude_behavior'      => array( 'justified-gallery' ),
					'exclude_option'        => array( 'images_proportion' ),
					'group'                 => esc_html__( 'Gallery Settings', 'ashtanga-core' ),
					'include_slider_option' => array(
						'slider_direction',
						'slider_hidden_slides',
						'slider_mousewheel_navigation',
						'slider_centered_slides',
						'slider_drag_cursor',
					),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'show_image_caption',
					'title'         => esc_html__( 'Show Image Caption', 'ashtanga-core' ),
					'options'       => ashtanga_core_get_select_type_options_pool( 'no_yes', false ),
					'default_value' => 'no',
					'group'         => esc_html__( 'Image Caption', 'ashtanga-core' ),

				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'caption_color',
					'title'      => esc_html__( 'Caption Color', 'ashtanga-core' ),
					'group'      => esc_html__( 'Image Caption', 'ashtanga-core' ),
					'dependency' => array(
						'show' => array(
							'show_image_caption' => array(
								'values'        => 'yes',
								'default_value' => 'no',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'caption_background_color',
					'title'      => esc_html__( 'Caption Background Color', 'ashtanga-core' ),
					'group'      => esc_html__( 'Image Caption', 'ashtanga-core' ),
					'dependency' => array(
						'show' => array(
							'show_image_caption' => array(
								'values'        => 'yes',
								'default_value' => 'no',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'caption_font_size',
					'title'      => esc_html__( 'Caption Font Size', 'ashtanga-core' ),
					'group'      => esc_html__( 'Image Caption', 'ashtanga-core' ),
					'dependency' => array(
						'show' => array(
							'show_image_caption' => array(
								'values'        => 'yes',
								'default_value' => 'no',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'caption_line_height',
					'title'      => esc_html__( 'Caption Line Height', 'ashtanga-core' ),
					'group'      => esc_html__( 'Image Caption', 'ashtanga-core' ),
					'dependency' => array(
						'show' => array(
							'show_image_caption' => array(
								'values'        => 'yes',
								'default_value' => 'no',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'caption_font_weight',
					'title'      => esc_html__( 'Caption Font Weight', 'ashtanga-core' ),
					'options'    => ashtanga_core_get_select_type_options_pool( 'font_weight' ),
					'group'      => esc_html__( 'Image Caption', 'ashtanga-core' ),
					'dependency' => array(
						'show' => array(
							'show_image_caption' => array(
								'values'        => 'yes',
								'default_value' => 'no',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'caption_text_transform',
					'title'      => esc_html__( 'Caption Text Transform', 'ashtanga-core' ),
					'options'    => ashtanga_core_get_select_type_options_pool( 'text_transform' ),
					'group'      => esc_html__( 'Image Caption', 'ashtanga-core' ),
					'dependency' => array(
						'show' => array(
							'show_image_caption' => array(
								'values'        => 'yes',
								'default_value' => 'no',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'select',
					'name'        => 'enable_custom_caption_layout',
					'title'       => esc_html__( 'Custom Caption Layout', 'ashtanga-core' ),
					'description' => esc_html__( 'Left Caption layout will display Image caption with alt text and Bellow Caption layout will display caption with image description.', 'ashtanga-core' ),
					'options'     =>
						array(
							'default' => '',
							'left'    => esc_html__( 'Left', 'ashtanga-core' ),
							'bellow'  => esc_html__( 'Bellow Image', 'ashtanga-core' )
						),
					'group'       => esc_html__( 'Image Caption', 'ashtanga-core' ),
					'dependency'  => array(
						'show' => array(
							'show_image_caption' => array(
								'values'        => 'yes',
								'default_value' => 'no',
							),
						),
					),
				)
			);

			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'show_image_alt_text',
					'title'         => esc_html__( 'Show Image Alt Text', 'ashtanga-core' ),
					'options'       => ashtanga_core_get_select_type_options_pool( 'no_yes', false ),
					'default_value' => 'no',
					'group'         => esc_html__( 'Image Alt Text', 'ashtanga-core' ),

				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'alt_color',
					'title'      => esc_html__( 'Alt Color', 'ashtanga-core' ),
					'group'      => esc_html__( 'Image Alt Text', 'ashtanga-core' ),
					'dependency' => array(
						'show' => array(
							'show_image_alt_text' => array(
								'values'        => 'yes',
								'default_value' => 'no',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'alt_background_color',
					'title'      => esc_html__( 'Alt Background Color', 'ashtanga-core' ),
					'group'      => esc_html__( 'Image Alt Text', 'ashtanga-core' ),
					'dependency' => array(
						'show' => array(
							'show_image_alt_text' => array(
								'values'        => 'yes',
								'default_value' => 'no',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'alt_font_size',
					'title'      => esc_html__( 'Alt Font Size', 'ashtanga-core' ),
					'group'      => esc_html__( 'Image Alt Text', 'ashtanga-core' ),
					'dependency' => array(
						'show' => array(
							'show_image_alt_text' => array(
								'values'        => 'yes',
								'default_value' => 'no',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'alt_line_height',
					'title'      => esc_html__( 'Alt Line Height', 'ashtanga-core' ),
					'group'      => esc_html__( 'Image Alt Text', 'ashtanga-core' ),
					'dependency' => array(
						'show' => array(
							'show_image_alt_text' => array(
								'values'        => 'yes',
								'default_value' => 'no',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'alt_font_weight',
					'title'      => esc_html__( 'Alt Font Weight', 'ashtanga-core' ),
					'options'    => ashtanga_core_get_select_type_options_pool( 'font_weight' ),
					'group'      => esc_html__( 'Image Alt Text', 'ashtanga-core' ),
					'dependency' => array(
						'show' => array(
							'show_image_alt_text' => array(
								'values'        => 'yes',
								'default_value' => 'no',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'alt_text_transform',
					'title'      => esc_html__( 'Alt Text Transform', 'ashtanga-core' ),
					'options'    => ashtanga_core_get_select_type_options_pool( 'text_transform' ),
					'group'      => esc_html__( 'Image Alt Text', 'ashtanga-core' ),
					'dependency' => array(
						'show' => array(
							'show_image_alt_text' => array(
								'values'        => 'yes',
								'default_value' => 'no',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'content_vertical_align',
					'title'         => esc_html__( 'Content Vertical Alignment', 'ashtanga-core' ),
					'options'       => array(
						'top'    => esc_html__( 'Top', 'ashtanga-core' ),
						'middle' => esc_html__( 'Middle', 'ashtanga-core' ),
						'bottom' => esc_html__( 'Bottom', 'ashtanga-core' ),
					),
					'default_value' => 'bottom',
					'group'         => esc_html__( 'Additional', 'ashtanga-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'content_horizontal_align',
					'title'         => esc_html__( 'Content Horizontal Alignment', 'ashtanga-core' ),
					'options'       => array(
						'left'   => esc_html__( 'Left', 'ashtanga-core' ),
						'center' => esc_html__( 'Center', 'ashtanga-core' ),
						'right'  => esc_html__( 'Right', 'ashtanga-core' ),
					),
					'default_value' => 'left',
					'group'         => esc_html__( 'Additional', 'ashtanga-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'enable_zigzap_layout',
					'title'         => esc_html__( 'Enable ZigZag Layout', 'ashtanga-core' ),
					'options'       => ashtanga_core_get_select_type_options_pool( 'no_yes', false ),
					'default_value' => 'no',
					'group'         => esc_html__( 'Additional', 'ashtanga-core' ),
					'dependency'    => array(
						'show' => array(
							'behavior' => array(
								'values'        => 'slider',
								'default_value' => 'columns',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'enable_image_border',
					'title'         => esc_html__( 'Enable Image Border', 'ashtanga-core' ),
					'options'       => ashtanga_core_get_select_type_options_pool( 'no_yes' ),
					'group'         => esc_html__( 'Additional', 'ashtanga-core' ),
					'default_value' => '',
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'enable_box_shadow',
					'title'         => esc_html__( 'Enable Box Shadow', 'ashtanga-core' ),
					'options'       => ashtanga_core_get_select_type_options_pool( 'no_yes' ),
					'group'         => esc_html__( 'Additional', 'ashtanga-core' ),
					'default_value' => '',
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'slider_layout',
					'title'         => esc_html__( 'Slider Layout', 'ashtanga-core' ),
					'description'   => esc_html__( 'This option will override some basic slider settings in order to provide desired custom layout.', 'ashtanga-core' ),
					'options'       => array(
						''                  => esc_html__( 'Default', 'ashtanga-core' ),
						'centered-original' => esc_html__( 'Centered Original', 'ashtanga-core' ),
						'centered-custom'   => esc_html__( 'Centered Custom', 'ashtanga-core' ),
					),
					'default_value' => '',
					'dependency'    => array(
						'show' => array(
							'behavior' => array(
								'values'        => 'slider',
								'default_value' => 'columns'
							)
						)
					),
					'group'         => esc_html__( 'Additional', 'ashtanga-core' ),
				)
			);
		}

		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'ashtanga_core_image_gallery', $params );
			$html = str_replace( "\n", '', $html );

			return $html;
		}

		public function load_assets() {
			$atts = $this->get_atts();

			if ( isset( $atts['image_action'] ) && 'open-popup' === $atts['image_action'] ) {
				wp_enqueue_style( 'magnific-popup' );
				wp_enqueue_script( 'jquery-magnific-popup' );
			}
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['holder_classes']  = $this->get_holder_classes( $atts );
			$atts['holder_styles']   = $this->get_holder_styles( $atts );
			$atts['item_classes']    = $this->get_item_classes( $atts );
			$atts['slider_attr']     = $this->get_slider_data( $atts );
			$atts['images']          = $this->generate_images_params( $atts );
			$atts['caption_styles']  = $this->get_caption_styles( $atts );
			$atts['alt_text_styles'] = $this->get_alt_text_styles( $atts );

			return ashtanga_core_get_template_part( 'shortcodes/image-gallery', 'templates/image-gallery', $atts['behavior'], $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-image-gallery';
			$holder_classes[] = ! empty( $atts['image_action'] ) && 'open-popup' === $atts['image_action'] ? 'qodef-magnific-popup qodef-popup-gallery' : '';
			$holder_classes[] = ! empty( $atts['enable_custom_caption_layout'] ) ? 'qodef-custom-caption-layout--' . $atts['enable_custom_caption_layout'] : '';
			$holder_classes[] = isset( $atts['enable_bellow_caption_layout'] ) && 'yes' === $atts['enable_bellow_caption_layout'] ? 'qodef-bellow-caption-layout--enabled' : '';
			$holder_classes[] = ! empty( $atts['content_vertical_align'] ) ? 'qodef-content-vertical-align--' . $atts['content_vertical_align'] : '';
			$holder_classes[] = ! empty( $atts['content_horizontal_align'] ) ? 'qodef-content-horizontal-align--' . $atts['content_horizontal_align'] : '';
			$holder_classes[] = isset( $atts['enable_zigzap_layout'] ) && 'yes' === $atts['enable_zigzap_layout'] ? 'qodef-zigzag-layout--enabled' : '';
			$holder_classes[] = 'yes' === $atts['enable_image_border'] ? 'qodef-image-border--enabled' : '';
			$holder_classes[] = 'yes' === $atts['enable_box_shadow'] ? 'qodef-box-shadow--enabled' : '';

			$list_classes   = $this->get_list_classes( $atts );
			$holder_classes = array_merge( $holder_classes, $list_classes );

			return implode( ' ', $holder_classes );
		}

		private function get_holder_styles( $atts ) {
			$holder_styles = array();

			$list_styles   = $this->get_list_styles( $atts );
			$holder_styles = array_merge( $holder_styles, $list_styles );

			return $holder_styles;
		}

		public function get_item_classes( $atts ) {
			$item_classes   = $this->init_item_classes();
			$item_classes[] = 'qodef-image-wrapper';

			$list_item_classes = $this->get_list_item_classes( $atts );

			$item_classes = array_merge( $item_classes, $list_item_classes );

			return implode( ' ', $item_classes );
		}

		private function generate_images_params( $atts ) {
			$image_ids = array();
			$images    = array();
			$i         = 0;

			if ( ! empty( $atts['images'] ) ) {
				$image_ids = explode( ',', $atts['images'] );
			}

			$image_size = $this->generate_image_size( $atts );

			foreach ( $image_ids as $id ) {
				if ( is_array( wp_get_attachment_image_src( $id ) ) ) {
					$image['image_id']   = intval( $id );
					$image_original      = wp_get_attachment_image_src( $id, 'full' );
					$image['url']        = $this->generate_image_url( $id, $atts, $image_original[0] );
					$image['alt']        = get_post_meta( $id, '_wp_attachment_image_alt', true );
					$image['image_size'] = $image_size;

					$images[ $i ] = $image;
					$i ++;
				}
			}

			return $images;
		}

		private function generate_image_size( $atts ) {
			$image_size = trim( $atts['image_size'] );
			preg_match_all( '/\d+/', $image_size, $matches ); /* check if numeral width and height are entered */
			if ( in_array( $image_size, array( 'thumbnail', 'thumb', 'medium', 'large', 'full' ), true ) ) {
				return $image_size;
			} elseif ( ! empty( $matches[0] ) ) {
				return array(
					$matches[0][0],
					$matches[0][1],
				);
			} else {
				return 'full';
			}
		}

		private function generate_image_url( $id, $atts, $default ) {
			if ( 'custom-link' === $atts['image_action'] ) {
				$url = get_post_meta( $id, 'qodef_image_gallery_custom_link', true );
				if ( empty( $url ) ) {
					$url = $default;
				}
			} else {
				$url = $default;
			}

			return $url;
		}

		private function get_caption_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['caption_color'] ) ) {
				$styles[] = 'color: ' . $atts['caption_color'];
			}

			if ( ! empty( $atts['caption_background_color'] ) ) {
				$styles[] = 'background-color: ' . $atts['caption_background_color'];
			}

			if ( ! empty( $atts['caption_font_size'] ) ) {
				if ( qode_framework_string_ends_with_typography_units( $atts['caption_font_size'] ) ) {
					$styles[] = 'font-size: ' . $atts['caption_font_size'];
				} else {
					$styles[] = 'font-size: ' . intval( $atts['caption_font_size'] ) . 'px';
				}
			}

			if ( ! empty( $atts['caption_line_height'] ) ) {
				if ( qode_framework_string_ends_with_typography_units( $atts['caption_line_height'] ) ) {
					$styles[] = 'line-height: ' . $atts['caption_line_height'];
				} else {
					$styles[] = 'line-height: ' . intval( $atts['caption_line_height'] ) . 'px';
				}
			}

			if ( ! empty( $atts['caption_font_weight'] ) ) {
				$styles[] = 'font-weight: ' . $atts['caption_font_weight'];
			}

			if ( ! empty( $atts['caption_text_transform'] ) ) {
				$styles[] = 'text-transform: ' . $atts['caption_text_transform'];
			}

			return $styles;
		}

		private function get_alt_text_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['alt_text_color'] ) ) {
				$styles[] = 'color: ' . $atts['alt_text_color'];
			}

			if ( ! empty( $atts['alt_text_background_color'] ) ) {
				$styles[] = 'background-color: ' . $atts['alt_text_background_color'];
			}

			if ( ! empty( $atts['alt_text_font_size'] ) ) {
				if ( qode_framework_string_ends_with_typography_units( $atts['alt_text_font_size'] ) ) {
					$styles[] = 'font-size: ' . $atts['alt_text_font_size'];
				} else {
					$styles[] = 'font-size: ' . intval( $atts['alt_text_font_size'] ) . 'px';
				}
			}

			if ( ! empty( $atts['alt_text_line_height'] ) ) {
				if ( qode_framework_string_ends_with_typography_units( $atts['alt_text_line_height'] ) ) {
					$styles[] = 'line-height: ' . $atts['alt_text_line_height'];
				} else {
					$styles[] = 'line-height: ' . intval( $atts['alt_text_line_height'] ) . 'px';
				}
			}

			if ( ! empty( $atts['alt_text_font_weight'] ) ) {
				$styles[] = 'font-weight: ' . $atts['alt_text_font_weight'];
			}

			if ( ! empty( $atts['alt_text_text_transform'] ) ) {
				$styles[] = 'text-transform: ' . $atts['alt_text_text_transform'];
			}

			return $styles;
		}
	}
}
