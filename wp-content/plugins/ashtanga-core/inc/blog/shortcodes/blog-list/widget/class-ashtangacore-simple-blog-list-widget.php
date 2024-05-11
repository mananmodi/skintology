<?php

if ( ! function_exists( 'ashtanga_core_add_simple_blog_list_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function ashtanga_core_add_simple_blog_list_widget( $widgets ) {
		$widgets[] = 'AshtangaCore_Simple_Blog_List_Widget';

		return $widgets;
	}

	add_filter( 'ashtanga_core_filter_register_widgets', 'ashtanga_core_add_simple_blog_list_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class AshtangaCore_Simple_Blog_List_Widget extends QodeFrameworkWidget {

		public function map_widget() {
			$this->set_widget_option(
				array(
					'field_type' => 'text',
					'name'       => 'widget_title',
					'title'      => esc_html__( 'Title', 'ashtanga-core' ),
				)
			);

			$this->set_widget_option(
				array(
					'field_type' => 'select',
					'name'       => 'layout',
					'title'      => esc_html__( 'Item Layout', 'ashtanga-core' ),
					'options'    => apply_filters( 'ashtanga_core_filter_simple_blog_list_widget_layouts', array() ),
				)
			);

			$widget_mapped = $this->import_shortcode_options(
				array(
					'shortcode_base' => 'ashtanga_core_blog_list',
					'exclude'        => array(
						'custom_class',
						'behavior',
						'space',
						'vertical_space',
						'masonry_images_proportion',
						'images_proportion',
						'custom_image_width',
						'custom_image_height',
						'columns',
						'columns_responsive',
						'columns_1440',
						'columns_1366',
						'columns_1024',
						'columns_768',
						'columns_680',
						'columns_480',
						'slider_loop',
						'slider_autoplay',
						'slider_speed',
						'slider_speed_animation',
						'slider_navigation',
						'slider_pagination',
						'layout',
						'excerpt_length',
						'enable_filter',
						'pagination_type',
						'pagination_top_margin',
					),
				)
			);

			if ( $widget_mapped ) {
				$this->set_base( 'ashtanga_core_simple_blog_list' );
				$this->set_name( esc_html__( 'Ashtanga Simple Blog List', 'ashtanga-core' ) );
				$this->set_description( esc_html__( 'Display a list of blog posts', 'ashtanga-core' ) );
			}
		}

		public function render( $atts ) {
			$atts['is_widget_element'] = 'yes';

			// force atts
			$atts['behavior']           = 'columns';
			$atts['space']              = 'no'; // spacing inherited from widgets map
			$atts['vertical_space']     = 'no'; // spacing inherited from widgets map
			$atts['images_proportion']  = 'thumbnail';
			$atts['columns']            = 1;
			$atts['columns_responsive'] = 'predefined';

			echo AshtangaCore_Blog_List_Shortcode::call_shortcode( $atts ); // XSS OK
		}
	}
}
