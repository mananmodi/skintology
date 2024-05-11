<?php

if ( ! function_exists( 'ashtanga_core_add_video_gallery_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function ashtanga_core_add_video_gallery_shortcode( $shortcodes ) {
		$shortcodes[] = 'AshtangaCore_Video_Gallery_Shortcode';

		return $shortcodes;
	}

	add_filter( 'ashtanga_core_filter_register_shortcodes', 'ashtanga_core_add_video_gallery_shortcode' );
}

if ( class_exists( 'AshtangaCore_List_Shortcode' ) ) {
	class AshtangaCore_Video_Gallery_Shortcode extends AshtangaCore_List_Shortcode {

		public function map_shortcode() {
			$this->set_shortcode_path( ASHTANGA_CORE_SHORTCODES_URL_PATH . '/video-gallery' );
			$this->set_base( 'ashtanga_core_video_gallery' );
			$this->set_name( esc_html__( 'Video Gallery', 'ashtanga-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds video gallery element', 'ashtanga-core' ) );
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
					'field_type'    => 'select',
					'name'          => 'video_action',
					'title'         => esc_html__( 'Video Action', 'ashtanga-core' ),
					'options'       => array(
						'inline-play' => esc_html__( 'Inline Play', 'ashtanga-core' ),
						'open-popup'  => esc_html__( 'Open Popup', 'ashtanga-core' ),
					),
					'default_value' => 'inline-play',
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
					'name'          => 'video_icon_type',
					'title'         => esc_html__( 'Video Icon Type', 'ashtanga-core' ),
					'options'       => array(
						''       => esc_html__( 'Default', 'ashtanga-core' ),
						'simple' => esc_html__( 'Simple', 'ashtanga-core' ),
					),
					'default_value' => '',
					'dependency'    => array(
						'show' => array(
							'video_action' => array(
								'values'        => 'open-popup',
								'default_value' => 'inline-play'
							)
						)
					),
					'group'         => esc_html__( 'Additional Features', 'ashtanga-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'slider_layout',
					'title'         => esc_html__( 'Slider Layout', 'ashtanga-core' ),
					'description'   => esc_html__( 'This option will override some basic slider settings in order to provide desired custom layout.', 'ashtanga-core' ),
					'options'       => array(
						''                => esc_html__( 'Default', 'ashtanga-core' ),
						'centered-custom' => esc_html__( 'Centered Custom', 'ashtanga-core' ),
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
					'group'         => esc_html__( 'Additional Features', 'ashtanga-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'repeater',
					'name'       => 'children',
					'title'      => esc_html__( 'Video Items', 'ashtanga-core' ),
					'items'      => array(
						array(
							'field_type' => 'text',
							'name'       => 'video_url',
							'title'      => esc_html__( 'Url', 'ashtanga-core' ),
						),
						array(
							'field_type'  => 'image',
							'name'        => 'video_image',
							'title'       => esc_html__( 'Image', 'ashtanga-core' ),
							'description' => esc_html__( 'Only for Open Popup video action', 'ashtanga-core' ),
						),
						array(
							'field_type' => 'text',
							'name'       => 'video_text',
							'title'      => esc_html__( 'Text', 'ashtanga-core' ),
						),
					),
				)
			);
		}

		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'ashtanga_core_video_gallery', $params );
			$html = str_replace( "\n", '', $html );

			return $html;
		}

		public function load_assets() {
			$atts = $this->get_atts();

			if ( isset( $atts['video_action'] ) && 'open-popup' === $atts['video_action'] ) {
				wp_enqueue_style( 'magnific-popup' );
				wp_enqueue_script( 'jquery-magnific-popup' );
			}
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['holder_styles']  = $this->get_holder_styles( $atts );
			$atts['item_classes']   = $this->get_item_classes( $atts );
			$atts['slider_attr']    = $this->get_slider_data( $atts );

			$atts['this_object'] = $this;
			$atts['items']       = $this->parse_repeater_items( $atts['children'] );

			return ashtanga_core_get_template_part( 'shortcodes/video-gallery', 'templates/video-gallery', $atts['behavior'], $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-video-gallery';
			$holder_classes[] = ! empty( $atts['video_action'] ) && 'open-popup' === $atts['video_action'] ? 'qodef-magnific-popup qodef-popup-gallery' : '';
			$holder_classes[] = isset( $atts['video_icon_type'] ) && '' !== $atts['video_icon_type'] ? 'qodef-video-icon-type--' . $atts['video_icon_type'] : '';
			$holder_classes[] = isset( $atts['enable_custom_layout'] ) && 'yes' === $atts['enable_custom_layout'] ? 'qodef-custom-layout--enabled' : '';

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
			$item_classes[] = 'qodef-video-wrapper';

			$list_item_classes = $this->get_list_item_classes( $atts );

			$item_classes = array_merge( $item_classes, $list_item_classes );

			return implode( ' ', $item_classes );
		}
	}
}
