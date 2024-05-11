<?php

if ( ! function_exists( 'ashtanga_core_add_author_list_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function ashtanga_core_add_author_list_shortcode( $shortcodes ) {
		$shortcodes[] = 'AshtangaCore_Author_List_Shortcode';

		return $shortcodes;
	}

	add_filter( 'ashtanga_core_filter_register_shortcodes', 'ashtanga_core_add_author_list_shortcode' );
}

if ( class_exists( 'AshtangaCore_List_Shortcode' ) ) {
	class AshtangaCore_Author_List_Shortcode extends AshtangaCore_List_Shortcode {

		public function __construct() {
			$this->set_layouts( apply_filters( 'ashtanga_core_filter_author_list_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'ashtanga_core_filter_author_list_extra_options', array() ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( ASHTANGA_CORE_SHORTCODES_URL_PATH . '/author-list' );
			$this->set_base( 'ashtanga_core_author_list' );
			$this->set_name( esc_html__( 'Author List', 'ashtanga-core' ) );
			$this->set_description( esc_html__( 'Shortcode that display list of authors', 'ashtanga-core' ) );
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'ashtanga-core' ),
				)
			);
			$this->map_list_options(
				array(
					'exclude_option' => array( 'images_proportion' ),
				)
			);
			$this->map_query_options();
			$this->map_layout_options( array( 'layouts' => $this->get_layouts() ) );
			$this->map_additional_options();
			$this->map_extra_options();

			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'image_size',
					'title'       => esc_html__( 'Image Size', 'ashtanga-core' ),
					'description' => esc_html__( 'Enter image size in px', 'ashtanga-core' ),
				)
			);
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['holder_styles']  = $this->get_holder_styles( $atts );
			$atts['item_classes']   = $this->get_item_classes( $atts );
			$atts['query_result']   = new \WP_User_Query( ashtanga_core_get_author_query_params( $atts ) );

			if ( isset( $atts['posts_per_page'] ) && ! empty( $atts['posts_per_page'] ) ) {
				$atts['max_num_pages'] = ceil( $atts['query_result']->get_total() / $atts['posts_per_page'] );
				$atts['next_page']     = 2;
			} else {
				$atts['max_num_pages'] = 1;
				$atts['next_page']     = 1;
			}

			$atts['slider_attr'] = $this->get_slider_data( $atts );
			$atts['data_attr']   = ashtanga_core_get_author_pagination_data( ASHTANGA_CORE_REL_PATH, 'shortcodes', 'author-list', $atts );

			$atts['this_shortcode'] = $this;

			return ashtanga_core_get_template_part( 'shortcodes/author-list', 'templates/content', $atts['behavior'], $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-author-list';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-item-layout--' . $atts['layout'] : '';

			if ( ! empty( $atts['pagination_type'] ) ) {
				if ( 'no-pagination' === $atts['pagination_type'] ) {
					$holder_classes[] = 'qodef-author-pagination--off';
				} else {
					$holder_classes[] = 'qodef-author-pagination--on';
				}
			}

			$list_classes            = $this->get_list_classes( $atts );
			$hover_animation_classes = $this->get_hover_animation_classes( $atts );
			$holder_classes          = array_merge( $holder_classes, $list_classes, $hover_animation_classes );

			if ( in_array( 'qodef-pagination--on', $holder_classes, true ) ) {
				$key = array_search( 'qodef-pagination--on', $holder_classes );
				unset( $holder_classes[ $key ] );
			}

			return implode( ' ', $holder_classes );
		}

		private function get_holder_styles( $atts ) {
			$holder_styles = array();

			$list_styles   = $this->get_list_styles( $atts );
			$holder_styles = array_merge( $holder_styles, $list_styles );

			return $holder_styles;
		}

		private function get_item_classes( $atts ) {
			$item_classes = $this->init_item_classes();

			$list_item_classes = $this->get_list_item_classes( $atts );

			$item_classes = array_merge( $item_classes, $list_item_classes );

			return implode( ' ', $item_classes );
		}

		public function get_title_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['text_transform'] ) ) {
				$styles[] = 'text-transform: ' . $atts['text_transform'];
			}

			return $styles;
		}
	}
}
