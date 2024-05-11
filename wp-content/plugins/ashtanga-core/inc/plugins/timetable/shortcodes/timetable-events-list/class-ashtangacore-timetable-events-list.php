<?php

if ( ! function_exists( 'ashtanga_core_add_timetable_events_list_shortcode' ) ) {
	/**
	 * Function that is adding shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes - Array of registered shortcodes
	 *
	 * @return array
	 */
	function ashtanga_core_add_timetable_events_list_shortcode( $shortcodes ) {
		$shortcodes[] = 'AshtangaCore_Timetable_Events_List_Shortcode';

		return $shortcodes;
	}

	add_filter( 'ashtanga_core_filter_register_shortcodes', 'ashtanga_core_add_timetable_events_list_shortcode' );
}

if ( class_exists( 'AshtangaCore_List_Shortcode' ) ) {
	class AshtangaCore_Timetable_Events_List_Shortcode extends AshtangaCore_List_Shortcode {

		public function __construct() {
			$timetable_events_settings = timetable_events_settings();

			$this->set_post_type( $timetable_events_settings['slug'] );
			$this->set_post_type_taxonomy( 'events_category' );
			$this->set_layouts( apply_filters( 'ashtanga_core_filter_timetable_events_list_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'ashtanga_core_filter_timetable_events_list_extra_options', array() ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( ASHTANGA_CORE_PLUGINS_URL_PATH . '/timetable/shortcodes/timetable-events-list' );
			$this->set_base( 'ashtanga_core_timetable_events_list' );
			$this->set_name( esc_html__( 'Timetable Events List', 'ashtanga-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays timetable event list', 'ashtanga-core' ) );
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'ashtanga-core' ),
				)
			);
			$this->map_list_options();
			$this->map_query_options( array( 'post_type' => $this->get_post_type() ) );
			$this->map_layout_options(
				array(
					'layouts' => $this->get_layouts(),
				)
			);

			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'excerpt_length',
					'title'      => esc_html__( 'Excerpt Length', 'ashtanga-core' ),
					'group'      => esc_html__( 'Layout', 'ashtanga-core' ),
				)
			);
			$this->map_additional_options();
			$this->map_extra_options();
		}

		public function render( $options, $content = null ) {
			parent::render( $options );

			$atts = $this->get_atts();

			$atts['post_type']       = $this->get_post_type();
			$atts['taxonomy_filter'] = $this->get_post_type_taxonomy();

			// Additional query args
			$atts['additional_query_args'] = $this->get_additional_query_args( $atts );

			$atts['query_result']   = new WP_Query( ashtanga_core_get_query_params( $atts ) );
			$atts['space_value']    = ashtanga_core_get_space_value( $atts['space'] );
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['holder_styles']  = $this->get_holder_styles( $atts );

			$atts['unique']      = wp_unique_id();
			$atts['slider_attr'] = $this->get_slider_data(
				$atts,
				array(
					'unique'            => $atts['unique'],
					'outsideNavigation' => 'yes',
				)
			);

			$atts['data_attr'] = ashtanga_core_get_pagination_data( ASHTANGA_CORE_REL_PATH, 'plugins/timetable/shortcodes', 'timetable-events-list', $atts['post_type'], $atts );

			$atts['this_shortcode'] = $this;

			return ashtanga_core_get_template_part( 'plugins/timetable/shortcodes/timetable-events-list', 'templates/content', $atts['behavior'], $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-timetable-events-list';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-item-layout--' . $atts['layout'] : '';

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
