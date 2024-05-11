<?php

if ( ! class_exists( 'AshtangaCore_Timetable' ) ) {
	class AshtangaCore_Timetable {
		private static $instance;

		public function __construct() {
			// Include helper functions
			include_once ASHTANGA_CORE_PLUGINS_PATH . '/timetable/helper.php';

			if ( qode_framework_is_installed( 'timetable' ) ) {
				// Init
				$this->init();

				// Add module body classes
				add_filter( 'body_class', array( $this, 'add_body_classes' ) );
			}
		}

		/**
		 * @return AshtangaCore_Timetable
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		function init() {
			// Set dashboard admin options map position
			add_filter( 'ashtanga_core_filter_admin_options_map_position', array( $this, 'set_map_position' ), 10, 2 );

			// Include options
			include_once ASHTANGA_CORE_PLUGINS_PATH . '/timetable/dashboard/admin/timetable-options.php';
			include_once ASHTANGA_CORE_PLUGINS_PATH . '/timetable/dashboard/admin/timetable-social-share-options.php';

			// Include meta boxes
			include_once ASHTANGA_CORE_PLUGINS_PATH . '/timetable/dashboard/meta-box/timetable-meta-box.php';

			// Include shortcodes
			add_action( 'qode_framework_action_before_shortcodes_register', array( $this, 'include_shortcodes' ) );

			// Include widgets
			add_action( 'qode_framework_action_before_widgets_register', array( $this, 'include_widgets' ) );
		}

		function include_shortcodes() {
			foreach ( glob( ASHTANGA_CORE_PLUGINS_PATH . '/timetable/shortcodes/*/include.php' ) as $shortcode ) {
				include_once $shortcode;
			}
		}

		function include_widgets() {
			foreach ( glob( ASHTANGA_CORE_PLUGINS_PATH . '/timetable/widgets/*/include.php' ) as $widget ) {
				include_once $widget;
			}
		}

		function set_map_position( $position, $map ) {

			if ( 'timetable' === $map ) {
				$position = 56;
			}

			return $position;
		}

		function add_body_classes( $classes ) {
			$predefined_style = ashtanga_core_get_option_value( 'admin', 'qodef_enable_timetable_predefined_style' );

			if ( 'yes' === $predefined_style ) {
				$classes[] = 'qodef-timetable--predefined';
			}

			return $classes;
		}
	}

	AshtangaCore_Timetable::get_instance();
}

if ( ! function_exists( 'ashtanga_core_set_timetable_single_body_class' ) ) {
	/**
	 * Function that adds class
	 *
	 * @param array $classes
	 *
	 * @return array
	 */
	function ashtanga_core_set_timetable_single_body_class( $classes ) {

		if ( qode_framework_is_installed( 'timetable' ) ) {
			$slug = timetable_events_settings()['slug'];

			if ( is_singular( $slug ) ) {
				$classes[] = 'qodef-timetable-single-page';
			}
		}

		return $classes;
	}

	add_filter( 'body_class', 'ashtanga_core_set_timetable_single_body_class' );
}

if ( ! function_exists( 'ashtanga_core_set_timetable_single_sidebar_layout' ) ) {
	/**
	 * Function that return sidebar layout
	 *
	 * @param string $layout
	 *
	 * @return string
	 */
	function ashtanga_core_set_timetable_single_sidebar_layout( $layout ) {

		if ( qode_framework_is_installed( 'timetable' ) ) {
			$slug = timetable_events_settings()['slug'];

			if ( is_singular( $slug ) ) {
				$option = ashtanga_core_get_post_value_through_levels( 'qodef_timetable_single_sidebar_layout' );

				if ( ! empty( $option ) ) {
					$layout = $option;
				}

				$meta_option = get_post_meta( get_the_ID(), 'qodef_page_sidebar_layout', true );

				if ( ! empty( $meta_option ) ) {
					$layout = $meta_option;
				}
			}
		}

		return $layout;
	}

	add_filter( 'ashtanga_filter_sidebar_layout', 'ashtanga_core_set_timetable_single_sidebar_layout' );
}

if ( ! function_exists( 'ashtanga_core_set_timetable_single_custom_sidebar_name' ) ) {
	/**
	 * Function that return sidebar name
	 *
	 * @param string $sidebar_name
	 *
	 * @return string
	 */
	function ashtanga_core_set_timetable_single_custom_sidebar_name( $sidebar_name ) {

		if ( qode_framework_is_installed( 'timetable' ) ) {
			$slug = timetable_events_settings()['slug'];

			if ( is_singular( $slug ) ) {
				$sidebar_name = 'sidebar-event';

				$option = ashtanga_core_get_post_value_through_levels( 'qodef_timetable_single_custom_sidebar' );

				if ( ! empty( $option ) ) {
					$sidebar_name = $option;
				}

				$meta_option = get_post_meta( get_the_ID(), 'qodef_page_custom_sidebar', true );

				if ( ! empty( $meta_option ) ) {
					$sidebar_name = $meta_option;
				}

				return $sidebar_name;
			}
		}

		return $sidebar_name;
	}

	add_filter( 'ashtanga_filter_sidebar_name', 'ashtanga_core_set_timetable_single_custom_sidebar_name' );
}

if ( ! function_exists( 'ashtanga_core_set_timetable_single_sidebar_grid_gutter_classes' ) ) {
	/**
	 * Function that returns grid gutter classes
	 *
	 * @param string $classes
	 *
	 * @return string
	 */
	function ashtanga_core_set_timetable_single_sidebar_grid_gutter_classes( $classes ) {

		if ( qode_framework_is_installed( 'timetable' ) ) {
			$slug = timetable_events_settings()['slug'];

			if ( is_singular( $slug ) ) {
				$option = ashtanga_core_get_post_value_through_levels( 'qodef_timetable_single_sidebar_grid_gutter' );

				if ( ! empty( $option ) ) {
					$classes = 'qodef-gutter--' . esc_attr( $option );
				}

				$meta_option = get_post_meta( get_the_ID(), 'qodef_page_sidebar_grid_gutter', true );

				if ( ! empty( $meta_option ) ) {
					$classes = 'qodef-gutter--' . esc_attr( $meta_option );
				}
			}
		}

		return $classes;
	}

	add_filter( 'ashtanga_filter_grid_gutter_classes', 'ashtanga_core_set_timetable_single_sidebar_grid_gutter_classes' );
}

if ( ! function_exists( 'ashtanga_core_set_timetable_single_sidebar_grid_gutter_styles' ) ) {
	/**
	 * Function that returns grid gutter styles
	 *
	 * @param array $styles
	 *
	 * @return array
	 */
	function ashtanga_core_set_timetable_single_sidebar_grid_gutter_styles( $styles ) {

		if ( qode_framework_is_installed( 'timetable' ) ) {
			$slug = timetable_events_settings()['slug'];

			if ( is_singular( $slug ) ) {
				$styles = ashtanga_core_get_gutter_custom_styles( 'qodef_timetable_single_sidebar_grid_gutter_', 'qodef_page_sidebar_grid_gutter_' );
			}
		}

		return $styles;
	}

	add_filter( 'ashtanga_filter_grid_gutter_styles', 'ashtanga_core_set_timetable_single_sidebar_grid_gutter_styles' );
}
