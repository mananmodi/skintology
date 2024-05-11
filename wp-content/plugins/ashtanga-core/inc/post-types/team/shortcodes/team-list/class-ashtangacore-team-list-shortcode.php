<?php

if ( ! function_exists( 'ashtanga_core_add_team_list_shortcode' ) ) {
	/**
	 * Function that isadding shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes - Array of registered shortcodes
	 *
	 * @return array
	 */
	function ashtanga_core_add_team_list_shortcode( $shortcodes ) {
		$shortcodes[] = 'AshtangaCore_Team_List_Shortcode';

		return $shortcodes;
	}

	add_filter( 'ashtanga_core_filter_register_shortcodes', 'ashtanga_core_add_team_list_shortcode' );
}

if ( class_exists( 'AshtangaCore_List_Shortcode' ) ) {
	class AshtangaCore_Team_List_Shortcode extends AshtangaCore_List_Shortcode {

		public function __construct() {
			$this->set_post_type( 'team' );
			$this->set_post_type_taxonomy( 'team-category' );
			$this->set_layouts( apply_filters( 'ashtanga_core_filter_team_list_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'ashtanga_core_filter_team_list_extra_options', array() ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( ASHTANGA_CORE_CPT_URL_PATH . '/team/shortcodes/team-list' );
			$this->set_base( 'ashtanga_core_team_list' );
			$this->set_name( esc_html__( 'Team List', 'ashtanga-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays list of teams', 'ashtanga-core' ) );
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
					'name'       => 'appear',
					'title'      => esc_html__( 'Appear Animation', 'ashtanga-core' ),
					'options'    => ashtanga_core_get_select_type_options_pool( 'no_yes', false ),
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
			$this->map_list_options(
				array(
					'exclude_behavior' => array( 'justified-gallery' ),
				)
			);
			$this->map_query_options( array( 'post_type' => $this->get_post_type() ) );
			$this->map_layout_options( array( 'layouts' => $this->get_layouts() ) );

			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'enable_gallery_zig_zag',
					'title'         => esc_html__( 'Enable Zig Zag Layout', 'ashtanga-core' ),
					'group'         => esc_html__( 'Additional Features', 'ashtanga-core' ),
					'description'   => esc_html__( 'This option creates zig-zag effect when List Appearance is set to Gallery', 'ashtanga-core' ),
					'options'       => ashtanga_core_get_select_type_options_pool( 'yes_no' ),
					'default_value' => 'no',
					'dependency'    => array(
						'show' => array(
							'behavior' => array(
								'values'        => 'columns',
								'default_value' => 'columns',
							),
						),
					),
				)
			);

			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'custom_margin',
					'title'         => esc_html__( 'Use Item Custom Margin', 'ashtanga-core' ),
					'description'   => esc_html__( 'If you set this option to “Yes”, the margin values defined in the Team Member Custom Margin field will be applied', 'ashtanga-core' ),
					'options'       => ashtanga_core_get_select_type_options_pool( 'no_yes', false ),
					'default_value' => 'no',
					'dependency'    => array(
						'show' => array(
							'behavior' => array(
								'values'        => array( 'columns', 'masonry' ),
								'default_value' => 'columns',
							),
						),
					),
					'group'         => esc_html__( 'Layout', 'ashtanga-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'disable_custom_margin',
					'title'         => esc_html__( 'Disable Custom Margin', 'ashtanga-core' ),
					'options'       => array(
						''     => esc_html__( 'Never', 'ashtanga-core' ),
						'1440' => esc_html__( 'Below 1440px', 'ashtanga-core' ),
						'1280' => esc_html__( 'Below 1280px', 'ashtanga-core' ),
						'1024' => esc_html__( 'Below 1024px', 'ashtanga-core' ),
						'768'  => esc_html__( 'Below 768px', 'ashtanga-core' ),
						'680'  => esc_html__( 'Below 680px', 'ashtanga-core' ),
						'480'  => esc_html__( 'Below 480px', 'ashtanga-core' ),
					),
					'default_value' => '',
					'group'         => esc_html__( 'Layout', 'ashtanga-core' ),
				)
			);
			$this->map_additional_options();
			$this->map_extra_options();
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'enable_image_shape_modification',
					'title'         => esc_html__( 'Enable Image Shape Modification', 'ashtanga-core' ),
					'description'   => esc_html__( 'Enabling this option will change the shape of team member featured image in team list.', 'ashtanga-core' ),
					'options'       => ashtanga_core_get_select_type_options_pool( 'no_yes', false ),
					'default_value' => 'no',
					'group'         => esc_html__( 'Additional Features', 'ashtanga-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'enable_custom_layout',
					'title'         => esc_html__( 'Enable Custom Layout', 'ashtanga-core' ),
					'options'       => ashtanga_core_get_select_type_options_pool( 'no_yes', false ),
					'default_value' => 'no',
					'group'         => esc_html__( 'Additional Features', 'ashtanga-core' ),
					'dependency'    => array(
						'show' => array(
							'behavior' => array(
								'values'        => 'slider',
								'default_value' => 'columns',
							),
						),
					),
				)
			);
		}

		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'ashtanga_core_team_list', $params );
			$html = str_replace( "\n", '', $html );

			return $html;
		}

		public function render( $options, $content = null ) {
			parent::render( $options );

			$atts = $this->get_atts();

			$atts['post_type']       = $this->get_post_type();
			$atts['taxonomy_filter'] = $this->get_post_type_filter_taxonomy( $atts );

			// Additional query args
			$atts['additional_query_args'] = $this->get_additional_query_args( $atts );

			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['holder_styles']  = $this->get_holder_styles( $atts );
			$atts['item_classes']   = $this->get_item_classes( $atts );
			$atts['query_result']   = new WP_Query( ashtanga_core_get_query_params( $atts ) );
			$atts['slider_attr']    = $this->get_slider_data( $atts );
			$atts['has_single']     = ashtanga_core_team_has_single();
			$atts['data_attr']      = ashtanga_core_get_pagination_data( ASHTANGA_CORE_REL_PATH, 'post-types/team/shortcodes', 'team-list', 'team', $atts );

			$atts['this_shortcode'] = $this;

			return ashtanga_core_get_template_part( 'post-types/team/shortcodes/team-list', 'templates/content', $atts['behavior'], $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-team-list';
			$holder_classes[] = isset( $atts['skin'] ) && ! empty( $atts['skin'] ) ? 'qodef-skin--' . $atts['skin'] : '';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-item-layout--' . $atts['layout'] : '';
			$holder_classes[] = 'yes' === $atts['enable_gallery_zig_zag'] && 'columns' === $atts['behavior'] ? 'qodef-zig-zag--enabled' : '';
			$holder_classes[] = 'yes' === $atts['enable_image_shape_modification'] ? 'qodef-image-shape-modification--enabled' : '';
			$holder_classes[] = ! empty( $atts['disable_custom_margin'] ) ? 'qodef-disable-custom-margin-on--' . $atts['disable_custom_margin'] : '';
			$holder_classes[] = isset( $atts['enable_custom_layout'] ) && 'yes' === $atts['enable_custom_layout'] ? 'qodef-custom-layout--enabled' : '';
			$holder_classes[] = ( 'yes' === $atts['appear'] ) ? 'qodef-has-appear' : '';

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

		private function get_item_classes( $atts ) {
			$item_classes = $this->init_item_classes();

			$list_item_classes = $this->get_list_item_classes( $atts );

			if ( isset( $atts['custom_margin'] ) && 'yes' === $atts['custom_margin'] ) {
				$list_item_classes[] = 'qodef-custom-margin';
			}

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

		public function get_list_item_style( $atts ) {
			$styles = array();

			if ( isset( $atts['custom_margin'] ) && 'yes' === $atts['custom_margin'] ) {
				$margin = get_post_meta( get_the_ID(), 'qodef_team_member_margin', true );

				if ( isset( $margin ) && '' !== $margin ) {
					$styles[] = 'margin: ' . get_post_meta( get_the_ID(), 'qodef_team_member_margin', true );
				}
			}

			return $styles;
		}
	}
}
