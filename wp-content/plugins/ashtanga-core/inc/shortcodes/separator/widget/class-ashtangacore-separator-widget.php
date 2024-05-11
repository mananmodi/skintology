<?php

if ( ! function_exists( 'ashtanga_core_add_separator_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function ashtanga_core_add_separator_widget( $widgets ) {
		$widgets[] = 'AshtangaCore_Separator_Widget';

		return $widgets;
	}

	add_filter( 'ashtanga_core_filter_register_widgets', 'ashtanga_core_add_separator_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class AshtangaCore_Separator_Widget extends QodeFrameworkWidget {

		public function map_widget() {
			$widget_mapped = $this->import_shortcode_options(
				array(
					'shortcode_base' => 'ashtanga_core_separator',
				)
			);

			if ( $widget_mapped ) {
				$this->set_base( 'ashtanga_core_separator' );
				$this->set_name( esc_html__( 'Ashtanga Separator', 'ashtanga-core' ) );
				$this->set_description( esc_html__( 'Add a separator element into widget areas', 'ashtanga-core' ) );
			}
		}

		public function render( $atts ) {
			echo AshtangaCore_Separator_Shortcode::call_shortcode( $atts ); // XSS OK
		}
	}
}
