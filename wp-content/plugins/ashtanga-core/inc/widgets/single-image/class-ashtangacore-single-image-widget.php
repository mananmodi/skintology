<?php

if ( ! function_exists( 'ashtanga_core_add_single_image_widget' ) ) {
	/**
	 * function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function ashtanga_core_add_single_image_widget( $widgets ) {
		$widgets[] = 'AshtangaCore_Single_Image_Widget';

		return $widgets;
	}

	add_filter( 'ashtanga_core_filter_register_widgets', 'ashtanga_core_add_single_image_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class AshtangaCore_Single_Image_Widget extends QodeFrameworkWidget {

		public function map_widget() {
			$this->set_base( 'ashtanga_core_single_image' );
			$this->set_name( esc_html__( 'Ashtanga Single Image', 'ashtanga-core' ) );

			$this->set_widget_option(
				array(
					'field_type' => 'image',
					'name'       => 'dark_skin_image',
					'title'      => esc_html__( 'Dark Skin Image', 'ashtanga-core' ),
				)
			);

			$this->set_widget_option(
				array(
					'field_type'    => 'select',
					'name'          => 'retina_scaling',
					'title'         => esc_html__( 'Enable Retina Scaling', 'ashtanga-core' ),
					'description'   => esc_html__( 'Image uploaded should be two times the height.', 'ashtanga-core' ),
					'options'       => ashtanga_core_get_select_type_options_pool( 'yes_no' ),
					'default_value' => '',
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'image',
					'name'       => 'light_skin_image',
					'title'      => esc_html__( 'Light Skin Image', 'ashtanga-core' ),
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'text',
					'name'       => 'single_image_link',
					'title'      => esc_html__( 'Link', 'ashtanga-core' ),
				)
			);
			$this->set_widget_option(
				array(
					'field_type'    => 'select',
					'name'          => 'single_image_link_target',
					'options'       => ashtanga_core_get_select_type_options_pool( 'link_target' ),
					'title'         => esc_html__( 'Link target', 'ashtanga-core' ),
					'default_value' => '_self',
				)
			);
		}

		public function render( $atts ) {
			$dark_image_url  = wp_get_attachment_image_src( $atts['dark_skin_image'], 'full' );
			$light_image_url = wp_get_attachment_image_src( $atts['light_skin_image'], 'full' );
			?>
			<div class="qodef-single-image-widget widget">
				<?php if ( ! empty( $atts['single_image_link'] ) ) { ?>
				<a itemprop="url" href="<?php echo esc_url( $atts['single_image_link'] ); ?>"
				   target="<?php echo esc_attr( $atts['single_image_link_target'] ); ?>">
					<?php } ?>
					<div class="qodef-single-image-dark-skin">
						<?php if ( isset( $atts['retina_scaling'] ) && 'yes' === $atts['retina_scaling'] ) { ?>
							<img itemprop="image" src="<?php echo esc_url( $dark_image_url[0] ); ?>"
							     width="<?php echo round( $dark_image_url[1] / 2 ); ?>"
							     height="<?php echo round( $dark_image_url[2] / 2 ); ?>"
							     alt="<?php echo esc_attr( $dark_image_url[3] ); ?>"/>
							<?php
						} else {
							echo wp_get_attachment_image( $atts['dark_skin_image'], 'full' );
						} ?></div>
					<div class="qodef-single-image-light-skin">
						<?php if ( isset( $atts['retina_scaling'] ) && 'yes' === $atts['retina_scaling'] && $light_image_url ) { ?>
							<img itemprop="image" src="<?php echo esc_url( $light_image_url[0] ); ?>"
							     width="<?php echo round( $light_image_url[1] / 2 ); ?>"
							     height="<?php echo round( $light_image_url[2] / 2 ); ?>"
							     alt="<?php echo esc_attr( $light_image_url[3] ); ?>"/>
							<?php
						} else {
							echo wp_get_attachment_image( $atts['light_skin_image'], 'full' );
						} ?>
					</div>
					<?php if ( ! empty( $atts['single_image_link'] ) ) { ?>
				</a>
			<?php } ?>
			</div>
			<?php
		}
	}
}
