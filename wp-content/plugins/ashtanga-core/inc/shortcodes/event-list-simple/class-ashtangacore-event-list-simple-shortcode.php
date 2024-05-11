<?php

if ( ! function_exists( 'ashtanga_core_add_event_list_simple_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list simple for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function ashtanga_core_add_event_list_simple_shortcode( $shortcodes ) {
		$shortcodes[] = 'AshtangaCore_Event_List_Simple_Shortcode';

		return $shortcodes;
	}

	add_filter( 'ashtanga_core_filter_register_shortcodes', 'ashtanga_core_add_event_list_simple_shortcode' );
}

if ( class_exists( 'AshtangaCore_List_Shortcode' ) ) {
	class AshtangaCore_Event_List_Simple_Shortcode extends AshtangaCore_List_Shortcode {

		public function map_shortcode() {
			$this->set_shortcode_path( ASHTANGA_CORE_SHORTCODES_URL_PATH . '/event-list-simple' );
			$this->set_base( 'ashtanga_core_event_list_simple' );
			$this->set_name( esc_html__( 'Event List Simple', 'ashtanga-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds event list simple holder', 'ashtanga-core' ) );
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
					'name'          => 'title_tag',
					'title'         => esc_html__( 'Title Tag', 'ashtanga-core' ),
					'options'       => ashtanga_core_get_select_type_options_pool( 'title_tag' ),
					'default_value' => 'h4',
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'title_font_style',
					'title'         => esc_html__( 'Title style', 'ashtanga-core' ),
					'options'       => ashtanga_core_get_select_type_options_pool( 'font_style' ),
					'default_value' => 'normal',
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'title_line_height',
					'title'      => esc_html__( 'Title Line Height', 'ashtanga-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'title_color',
					'title'      => esc_html__( 'Title Color', 'ashtanga-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'link_target',
					'title'         => esc_html__( 'Link Target', 'ashtanga-core' ),
					'options'       => ashtanga_core_get_select_type_options_pool( 'link_target' ),
					'default_value' => '_self',
				)
			);
			$this->set_option(
				array(
					'field_type' => 'repeater',
					'name'       => 'children',
					'title'      => esc_html__( 'Event List Simple Items', 'ashtanga-core' ),
					'items'      => array(
						array(
							'field_type'    => 'text',
							'name'          => 'title',
							'title'         => esc_html__( 'Title', 'ashtanga-core' ),
							'default_value' => '',
						),
						array(
							'field_type'    => 'text',
							'name'          => 'title_link',
							'title'         => esc_html__( 'Link', 'ashtanga-core' ),
							'default_value' => '',
						),
						array(
							'field_type'    => 'textarea',
							'name'          => 'time',
							'title'         => esc_html__( 'Time', 'ashtanga-core' ),
							'default_value' => '',
						),
						array(
							'field_type'    => 'textarea',
							'name'          => 'day',
							'title'         => esc_html__( 'Day', 'ashtanga-core' ),
							'default_value' => '',
						),
					),
				)
			);
			$this->map_extra_options();
		}

		public function render( $options, $content = null ) {
			parent::render( $options );

			$atts                   = $this->get_atts();
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['this_object']    = $this;
			$atts['items']          = $this->parse_repeater_items( $atts['children'] );
			$atts['title_styles']   = $this->get_title_styles( $atts );

			return ashtanga_core_get_template_part( 'shortcodes/event-list-simple', 'templates/event-list-simple', '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-event-list-simple';

			return implode( ' ', $holder_classes );
		}

		private function get_title_styles( $atts ) {
			$styles = array();

			$line_height = $atts['title_line_height'];
			if ( ! empty( $line_height ) ) {
				if ( qode_framework_string_ends_with_typography_units( $line_height ) ) {
					$styles[] = 'line-height: ' . $line_height;
				} else {
					$styles[] = 'line-height: ' . intval( $line_height ) . 'px';
				}
			}

			if ( ! empty( $atts['title_color'] ) ) {
				$styles[] = 'color: ' . $atts['title_color'];
			}

			if ( ! empty( $atts['title_font_style'] ) ) {
				$styles[] = 'font-style: ' . $atts['title_font_style'];
			}

			return $styles;
		}
	}
}
