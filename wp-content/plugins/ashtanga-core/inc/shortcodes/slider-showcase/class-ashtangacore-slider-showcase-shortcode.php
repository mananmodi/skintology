<?php

if ( ! function_exists( 'ashtanga_core_add_slider_showcase_shortcode' ) ) {
	/**
	 * Function that is adding shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes - Array of registered shortcodes
	 *
	 * @return array
	 */
	function ashtanga_core_add_slider_showcase_shortcode( $shortcodes ) {
		$shortcodes[] = 'AshtangaCore_Slider_Showcase_Shortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'ashtanga_core_filter_register_shortcodes', 'ashtanga_core_add_slider_showcase_shortcode' );
}

if ( class_exists( 'AshtangaCore_List_Shortcode' ) ) {
	class AshtangaCore_Slider_Showcase_Shortcode extends AshtangaCore_List_Shortcode {

		public function map_shortcode() {
			$this->set_shortcode_path( ASHTANGA_CORE_SHORTCODES_URL_PATH . '/slider-showcase' );
			$this->set_base( 'ashtanga_core_slider_showcase' );
			$this->set_name( esc_html__( 'Slider Showcase', 'ashtanga-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays slider of images', 'ashtanga-core' ) );
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
					'name'       => 'logo',
					'title'      => esc_html__( 'Logo', 'ashtanga-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'repeater',
					'name'       => 'children',
					'title'      => esc_html__( 'Child elements', 'ashtanga-core' ),
					'items'      => array(
						array(
							'field_type' => 'image',
							'name'       => 'item_main_image_1',
							'multiple'   => 'no',
							'title'      => esc_html__( 'Main Image 1', 'ashtanga-core' ),
						),
						array(
							'field_type' => 'image',
							'name'       => 'item_main_image_2',
							'multiple'   => 'no',
							'title'      => esc_html__( 'Main Image 2', 'ashtanga-core' ),
						),
						array(
							'field_type' => 'link',
							'name'       => 'item_link',
							'title'      => esc_html__( 'Link', 'ashtanga-core' ),
						),
						array(
							'field_type'    => 'select',
							'name'          => 'item_target',
							'title'         => esc_html__( 'Link Target', 'ashtanga-core' ),
							'options'       => ashtanga_core_get_select_type_options_pool( 'link_target', false ),
							'default_value' => '_self',
						)
					),
				)
			);
			$this->map_list_options(
				array(
					'exclude_behavior'      => array( 'columns', 'masonry', 'justified-gallery' ),
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
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['items']          = $this->parse_repeater_items( $atts['children'] );
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['holder_styles']  = $this->get_holder_styles( $atts );
			$atts['item_classes']   = $this->get_item_classes( $atts );
			$atts['slider_attr']    = $this->get_slider_data( $atts );

			return ashtanga_core_get_template_part( 'shortcodes/slider-showcase', 'templates/slider-showcase', '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-slider-showcase';

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
	}
}
