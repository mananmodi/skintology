<?php

if ( ! function_exists( 'ashtanga_core_add_twitter_list_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function ashtanga_core_add_twitter_list_widget( $widgets ) {
		if ( qode_framework_is_installed( 'twitter' ) ) {
			$widgets[] = 'AshtangaCore_Twitter_List_Widget';
		}

		return $widgets;
	}

	add_filter( 'ashtanga_core_filter_register_widgets', 'ashtanga_core_add_twitter_list_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class AshtangaCore_Twitter_List_Widget extends QodeFrameworkWidget {

		public function map_widget() {
			$this->set_widget_option(
				array(
					'name'       => 'widget_title',
					'field_type' => 'text',
					'title'      => esc_html__( 'Title', 'ashtanga-core' ),
				)
			);
			$widget_mapped = $this->import_shortcode_options(
				array(
					'shortcode_base' => 'ashtanga_core_twitter_list',
				)
			);
			if ( $widget_mapped ) {
				$this->set_base( 'ashtanga_core_twitter_list' );
				$this->set_name( esc_html__( 'Ashtanga Twitter List', 'ashtanga-core' ) );
				$this->set_description( esc_html__( 'Add a twitter list element into widget areas', 'ashtanga-core' ) );
			}
		}

		public function render( $atts ) {
			echo AshtangaCore_Twitter_List_Shortcode::call_shortcode( $atts ); // XSS OK
		}
	}
}
