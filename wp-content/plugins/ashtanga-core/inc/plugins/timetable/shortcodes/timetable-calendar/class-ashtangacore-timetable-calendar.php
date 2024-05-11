<?php

if ( ! function_exists( 'ashtanga_core_add_timetable_calendar_shortcode' ) ) {
	/**
	 * Function that is adding shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes - Array of registered shortcodes
	 *
	 * @return array
	 */
	function ashtanga_core_add_timetable_calendar_shortcode( $shortcodes ) {
		$shortcodes[] = 'AshtangaCore_Timetable_Calendar_Shortcode';

		return $shortcodes;
	}

	add_filter( 'ashtanga_core_filter_register_shortcodes', 'ashtanga_core_add_timetable_calendar_shortcode' );
}

if ( class_exists( 'AshtangaCore_Shortcode' ) ) {
	class AshtangaCore_Timetable_Calendar_Shortcode extends AshtangaCore_Shortcode {

		public function map_shortcode() {
			$this->set_shortcode_path( ASHTANGA_CORE_PLUGINS_URL_PATH . '/timetable/shortcodes/timetable-calendar' );
			$this->set_base( 'ashtanga_core_timetable_calendar' );
			$this->set_name( esc_html__( 'Timetable Calendar', 'ashtanga-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays timetable calendar', 'ashtanga-core' ) );
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
					'name'       => 'skin',
					'title'      => esc_html__( 'Skin', 'ashtanga-core' ),
					'options'    => ashtanga_core_get_select_type_options_pool( 'shortcode_skin' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'html',
					'name'          => 'content',
					'title'         => esc_html__( 'Content', 'ashtanga-core' ),
					'default_value' => esc_html__( '[tt_timetable]', 'ashtanga-core' ),
				)
			);
		}

		public function render( $options, $content = null ) {
			parent::render( $options );

			$atts = $this->get_atts();

			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['content']        = $this->get_editor_content( $content, $options );

			return ashtanga_core_get_template_part( 'plugins/timetable/shortcodes/timetable-calendar', 'templates/timetable-calendar', '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-timetable-calendar';
			$holder_classes[] = isset( $atts['skin'] ) && ! empty( $atts['skin'] ) ? 'qodef-timetable-skin--' . $atts['skin'] : '';

			return implode( ' ', $holder_classes );
		}
	}
}
