<?php

if ( ! function_exists( 'ashtanga_core_add_social_links_widget' ) ) {
	/**
	 * function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function ashtanga_core_add_social_links_widget( $widgets ) {
		$widgets[] = 'AshtangaCore_Social_Links_Widget';

		return $widgets;
	}

	add_filter( 'ashtanga_core_filter_register_widgets', 'ashtanga_core_add_social_links_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class AshtangaCore_Social_Links_Widget extends QodeFrameworkWidget {
		private $social_networks = array(
			'instagram'   => 'Ig',
			'linkedin'    => 'Ln',
			'facebook'    => 'Fb',
			'pinterest'   => 'Pin',
			'behance'     => 'Beh',
			'youtube'     => 'Yt',
			'tumblr'      => 'Tb',
			'google-plus' => 'G+',
			'vk'          => 'Vk',
			'twitter'     => 'Tw',
			'dribbble'    => 'Db',
			'flickr'      => 'Fl',
			'soundcloud'  => 'Sc',
			'vimeo'       => 'Vm',
			'vine'        => 'Vi',
			'twitch'      => 'Tw',
			'whatsapp'    => 'Wa',
			'snapchat'    => 'Sp',
			'skype'       => 'Sk',
			'reddit'      => 'Rd',
			'mixcloud'    => 'Mc',
			'xing'        => 'Xg',
			'rss'         => 'Rss',
			'email'       => 'Em',
		);

		public function map_widget() {
			$this->set_base( 'ashtanga_core_social_links' );
			$this->set_name( esc_html__( 'Ashtanga Social Links', 'ashtanga-core' ) );
			$this->set_description( esc_html__( 'Add a social links element into widget areas', 'ashtanga-core' ) );
			$this->set_widget_option(
				array(
					'field_type' => 'text',
					'name'       => 'social_links_title',
					'title'      => esc_html__( 'Title', 'ashtanga-core' ),
				)
			);
			$this->set_widget_option(
				array(
					'field_type'    => 'select',
					'name'          => 'social_links_title_tag',
					'title'         => esc_html__( 'Title Tag', 'ashtanga-core' ),
					'options'       => ashtanga_core_get_select_type_options_pool( 'title_tag' ),
					'default_value' => 'h5',
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'text',
					'name'       => 'social_links_title_gap',
					'title'      => esc_html__( 'Title Gap', 'ashtanga-core' ),
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'text',
					'name'       => 'social_links_items_gap',
					'title'      => esc_html__( 'Items Gap', 'ashtanga-core' ),
				)
			);
			$this->set_widget_option(
				array(
					'field_type'    => 'select',
					'name'          => 'alignment',
					'title'         => esc_html__( 'Alignment', 'ashtanga-core' ),
					'options'       => array(
						'left'   => esc_html__( 'Left', 'ashtanga-core' ),
						'center' => esc_html__( 'Center', 'ashtanga-core' ),
						'right'  => esc_html__( 'Right', 'ashtanga-core' ),
					),
					'default_value' => 'left',
				)
			);
			$this->set_widget_option(
				array(
					'field_type'    => 'select',
					'name'          => 'alignment_responsive',
					'title'         => esc_html__( 'Alignment Responsive', 'ashtanga-core' ),
					'options'       => array(
						''       => esc_html__( 'Default', 'ashtanga-core' ),
						'left'   => esc_html__( 'Left', 'ashtanga-core' ),
						'center' => esc_html__( 'Center', 'ashtanga-core' ),
						'right'  => esc_html__( 'Right', 'ashtanga-core' ),
					),
					'default_value' => '',
				)
			);

			$networks = $this->social_networks;

			foreach ( $networks as $network => $short_text ) {
				$this->set_widget_option(
					array(
						'field_type' => 'text',
						'name'       => $network . '_link',
						// translators: %s: Social network name.
						'title'      => sprintf( esc_html__( '%s Link', 'ashtanga-core' ), ucwords( str_replace( '-', ' ', $network ) ) ),
					)
				);
				$this->set_widget_option(
					array(
						'field_type'    => 'select',
						'name'          => $network . '_target',
						// translators: %s: Social network name.
						'title'         => sprintf( esc_html__( '%s Link Target', 'ashtanga-core' ), ucwords( str_replace( '-', ' ', $network ) ) ),
						'options'       => ashtanga_core_get_select_type_options_pool( 'link_target', false ),
						'default_value' => '_blank',
					)
				);
				$this->set_widget_option(
					array(
						'field_type' => 'color',
						'name'       => $network . '_color',
						// translators: %s: Social network name.
						'title'      => sprintf( esc_html__( '%s Link Color', 'ashtanga-core' ), ucwords( str_replace( '-', ' ', $network ) ) ),
					)
				);
				$this->set_widget_option(
					array(
						'field_type' => 'color',
						'name'       => $network . '_hover_color',
						// translators: %s: Social network name.
						'title'      => sprintf( esc_html__( '%s Link Hover Color', 'ashtanga-core' ), ucwords( str_replace( '-', ' ', $network ) ) ),
					)
				);
			}
		}

		public function render( $atts ) {
			$networks  = $this->social_networks;
			$links     = array();
			$title_tag = isset( $atts['social_links_title_tag'] ) && ! empty( $atts['social_links_title_tag'] ) ? $atts['social_links_title_tag'] : 'h5';

			foreach ( $networks as $network => $short_text ) {
				$link   = $atts[ $network . '_link' ];
				$target = isset( $atts[ $network . '_target' ] ) && ! empty( $atts[ $network . '_target' ] ) ? $atts[ $network . '_target' ] : '_blank';

				$item_styles = array();

				if ( ! empty( $atts[ $network . '_color' ] ) ) {
					$item_styles[] = '--qode-link-color: ' . $atts[ $network . '_color' ];
				}

				if ( ! empty( $atts[ $network . '_hover_color' ] ) ) {
					$item_styles[] = '--qode-link-hover-color: ' . $atts[ $network . '_hover_color' ];
				}

				if ( ! empty( $link ) ) {
					$links[ $network ] = array(
						'url'    => $link,
						'target' => $target,
						'text'   => $short_text,
						'styles' => $item_styles,
					);
				}
			}

			$holder_classes   = array( 'qodef-social-links-widget' );
			$holder_classes[] = ! empty( $atts['alignment'] ) ? 'qodef-alignment--' . $atts['alignment'] : 'qodef-alignment--left';
			$holder_classes[] = ! empty( $atts['alignment_responsive'] ) ? 'qodef-alignment-responsive--' . $atts['alignment_responsive'] : '';

			$styles = array();

			if ( ! empty( $atts['social_links_title_gap'] ) ) {
				if ( qode_framework_string_ends_with_space_units( $atts['social_links_title_gap'], true ) ) {
					$styles[] = '--qode-title-gap: ' . $atts['social_links_title_gap'];
				} else {
					$styles[] = '--qode-title-gap: ' . intval( $atts['social_links_title_gap'] ) . 'px';
				}
			}

			if ( ! empty( $atts['social_links_items_gap'] ) ) {
				if ( qode_framework_string_ends_with_space_units( $atts['social_links_items_gap'], true ) ) {
					$styles[] = '--qode-items-gap: ' . $atts['social_links_items_gap'];
				} else {
					$styles[] = '--qode-items-gap: ' . intval( $atts['social_links_items_gap'] ) . 'px';
				}
			}

			if ( ! empty( $links ) ) {
				?>
				<div class="<?php echo esc_attr( implode( ' ', $holder_classes ) ); ?>" <?php qode_framework_inline_style( $styles ); ?>>
					<?php if ( ! empty( $atts['social_links_title'] ) ) { ?>
						<<?php echo esc_attr( $title_tag ); ?> class="qodef-social-links-title"><?php echo esc_html( $atts['social_links_title'] ); ?></<?php echo esc_attr( $title_tag ); ?>>
					<?php } ?>
					<div class="qodef-social-links-holder">
						<?php foreach ( $links as $link ) { ?>
							<a itemprop="url" class="qodef-social-link" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>" <?php qode_framework_inline_style( $link['styles'] ); ?>>
								<?php echo esc_html( $link['text'] ); ?>
							</a>
						<?php } ?>
					</div>
				</div>
				<?php
			}
		}
	}
}
