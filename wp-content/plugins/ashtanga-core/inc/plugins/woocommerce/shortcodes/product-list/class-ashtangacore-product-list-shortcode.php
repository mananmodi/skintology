<?php

if ( ! function_exists( 'ashtanga_core_add_product_list_shortcode' ) ) {
	/**
	 * Function that is adding shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes - Array of registered shortcodes
	 *
	 * @return array
	 */
	function ashtanga_core_add_product_list_shortcode( $shortcodes ) {
		$shortcodes[] = 'AshtangaCore_Product_List_Shortcode';

		return $shortcodes;
	}

	add_filter( 'ashtanga_core_filter_register_shortcodes', 'ashtanga_core_add_product_list_shortcode' );
}

if ( class_exists( 'AshtangaCore_List_Shortcode' ) ) {
	class AshtangaCore_Product_List_Shortcode extends AshtangaCore_List_Shortcode {

		public function __construct() {
			$this->set_post_type( 'product' );
			$this->set_post_type_taxonomy( 'product_cat' );
			$this->set_post_type_additional_taxonomies( array( 'product_tag', 'product_type' ) );
			$this->set_layouts( apply_filters( 'ashtanga_core_filter_product_list_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'ashtanga_core_filter_product_list_extra_options', array() ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( ASHTANGA_CORE_PLUGINS_URL_PATH . '/woocommerce/shortcodes/product-list' );
			$this->set_base( 'ashtanga_core_product_list' );
			$this->set_name( esc_html__( 'Product List', 'ashtanga-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays list of products', 'ashtanga-core' ) );
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'ashtanga-core' ),
				)
			);
			$this->map_list_options();
			$this->map_query_options( array( 'post_type' => $this->get_post_type() ) );
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'filterby',
					'title'         => esc_html__( 'Filter By', 'ashtanga-core' ),
					'options'       => array(
						''             => esc_html__( 'Default', 'ashtanga-core' ),
						'on_sale'      => esc_html__( 'On Sale', 'ashtanga-core' ),
						'featured'     => esc_html__( 'Featured', 'ashtanga-core' ),
						'top_rated'    => esc_html__( 'Top Rated', 'ashtanga-core' ),
						'best_selling' => esc_html__( 'Best Selling', 'ashtanga-core' ),
					),
					'default_value' => '',
					'group'         => esc_html__( 'Query', 'ashtanga-core' ),
				)
			);
			$this->map_layout_options( array( 'layouts' => $this->get_layouts() ) );
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'content_type',
					'title'         => esc_html__( 'Content Type', 'ashtanga-core' ),
					'options'       => array(
						''       => esc_html__( 'Default', 'ashtanga-core' ),
						'simple' => esc_html__( 'Simple', 'ashtanga-core' ),
					),
					'default_value' => '',
					'group'         => esc_html__( 'Layout', 'ashtanga-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'image_display',
					'title'         => esc_html__( 'Image Display', 'ashtanga-core' ),
					'options'       => array(
						''       => esc_html__( 'Default', 'ashtanga-core' ),
						'custom' => esc_html__( 'Custom', 'ashtanga-core' ),
					),
					'default_value' => '',
					'dependency'    => array(
						'show' => array(
							'content_type' => array(
								'values'        => 'simple',
								'default_value' => '',
							),
						),
					),
					'group'         => esc_html__( 'Layout', 'ashtanga-core' ),
				)
			);
			$this->map_additional_options();
			$this->map_extra_options();
		}

		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'ashtanga_core_product_list', $params );
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

			$atts['unique'] = rand( 0, 1000 );

			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['holder_styles']  = $this->get_holder_styles( $atts );
			$atts['query_result']   = new WP_Query( ashtanga_core_get_query_params( $atts ) );
			$atts['slider_attr']    =  $this->get_slider_data( $atts, array( 'unique' => $atts['unique'] ) );
			$atts['data_attr']      = ashtanga_core_get_pagination_data( ASHTANGA_CORE_REL_PATH, 'plugins/woocommerce/shortcodes', 'product-list', 'product', $atts );

			$atts['this_shortcode'] = $this;

			return ashtanga_core_get_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/content', $atts['behavior'], $atts );
		}

		public function get_additional_query_args( $atts ) {
			$args = parent::get_additional_query_args( $atts );

			if ( ! empty( $atts['filterby'] ) ) {
				switch ( $atts['filterby'] ) {
					case 'on_sale':
						$sale_products         = wc_get_product_ids_on_sale();
						$args['no_found_rows'] = 1;
						$args['post__in']      = array_merge( array( 0 ), $sale_products );

						if ( ! empty( $atts['additional_params'] ) && 'id' === $atts['additional_params'] && ! empty( $atts['post_ids'] ) ) {
							$post_ids          = array_map( 'intval', explode( ',', $atts['post_ids'] ) );
							$new_sale_products = array();

							foreach ( $post_ids as $post_id ) {
								if ( in_array( $post_id, $sale_products, true ) ) {
									$new_sale_products[] = $post_id;
								}
							}

							if ( ! empty( $new_sale_products ) ) {
								$args['post__in'] = $new_sale_products;
							}
						}

						break;
					case 'featured':
						$featured_tax_query   = WC()->query->get_tax_query();
						$featured_tax_query[] = array(
							'taxonomy'         => 'product_visibility',
							'terms'            => 'featured',
							'field'            => 'name',
							'operator'         => 'IN',
							'include_children' => false,
						);

						if ( isset( $args['tax_query'] ) && ! empty( $args['tax_query'] ) ) {
							$args['tax_query'] = array_merge( $args['tax_query'], $featured_tax_query );
						} else {
							$args['tax_query'] = $featured_tax_query;
						}

						break;
					case 'top_rated':
						$args['meta_key'] = '_wc_average_rating';
						$args['order']    = 'DESC';
						$args['orderby']  = 'meta_value_num';
						break;
					case 'best_selling':
						$args['meta_key'] = 'total_sales';
						$args['order']    = 'DESC';
						$args['orderby']  = 'meta_value_num';
						break;
				}
			}

			return $args;
		}


		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = ! empty( $atts['behavior'] ) && $atts['behavior'] === 'slider' ? 'qodef-content-grid' : '';
			$holder_classes[] = 'qodef-woo-shortcode';
			$holder_classes[] = 'qodef-woo-product-list';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-item-layout--' . $atts['layout'] : '';

			$holder_classes[] = ! empty( $atts['content_type'] ) ? 'qodef-item-content-type--' . $atts['content_type'] : '';
			$holder_classes[] = 'simple' === $atts['content_type'] && ! empty( $atts['image_display'] ) ? 'qodef-item-image-display--' . $atts['image_display'] : '';

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
			$item_classes      = $this->init_item_classes();
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
