<?php

if ( ! function_exists( 'ashtanga_core_add_social_share_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function ashtanga_core_add_social_share_widget( $widgets ) {
		$widgets[] = 'AshtangaCore_Social_Share_Widget';

		return $widgets;
	}

	add_filter( 'ashtanga_core_filter_register_widgets', 'ashtanga_core_add_social_share_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class AshtangaCore_Social_Share_Widget extends QodeFrameworkWidget {

		public function map_widget() {
			$widget_mapped = $this->import_shortcode_options(
				array(
					'shortcode_base' => 'ashtanga_core_social_share',
				)
			);

			if ( $widget_mapped ) {
				$this->set_base( 'ashtanga_core_social_share' );
				$this->set_name( esc_html__( 'Ashtanga Social Share', 'ashtanga-core' ) );
				$this->set_description( esc_html__( 'Add a social share element into widget areas', 'ashtanga-core' ) );
			}
		}

		public function render( $atts ) {
			echo AshtangaCore_Social_Share_Shortcode::call_shortcode( $atts ); // XSS OK
		}
	}
}
