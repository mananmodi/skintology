<div <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_style( $holder_styles ); ?> <?php qode_framework_inline_attr( $slider_attr, 'data-options' ); ?>>
	<div class="swiper-wrapper">
		<?php
		// Include items
		if ( ! empty( $items ) ) {
			foreach ( $items as $item ) {
				$image_1_url = wp_get_attachment_image_src( $item['item_main_image_1'], 'full' )[0];
				$style_1     = ! empty( $image_1_url ) ? 'background-image: url( ' . esc_url( $image_1_url ) . ')' : '';
				$image_2_url = wp_get_attachment_image_src( $item['item_main_image_2'], 'full' )[0];
				$style_2     = ! empty( $image_2_url ) ? 'background-image: url( ' . esc_url( $image_2_url ) . ')' : '';
				?>
				<div class="<?php echo esc_attr( $item_classes ); ?>">
					<div class="qodef-e-image-holder qodef--left" <?php qode_framework_inline_style( $style_1 ); ?>>
						<?php if ( ! empty( $item['item_link'] ) ) { ?>
							<a itemprop="url" href="<?php echo esc_url( $item['item_link'] ); ?>" target="<?php echo esc_attr( $item['item_target'] ); ?>">
						<?php } ?>
								<?php echo wp_get_attachment_image( $item['item_main_image_1'], 'full', '', array( 'class' => 'qodef-e-img-1' ) ); ?>
						<?php if ( ! empty( $item['item_link'] ) ) { ?>
							</a>
						<?php } ?>
					</div>
					<div class="qodef-e-image-holder qodef--right" <?php qode_framework_inline_style( $style_2 ); ?>>
						<?php if ( ! empty( $item['item_link'] ) ) { ?>
							<a itemprop="url" href="<?php echo esc_url( $item['item_link'] ); ?>" target="<?php echo esc_attr( $item['item_target'] ); ?>">
						<?php } ?>
								<?php echo wp_get_attachment_image( $item['item_main_image_2'], 'full', '', array( 'class' => 'qodef-e-img-2' ) ); ?>
						<?php if ( ! empty( $item['item_link'] ) ) { ?>
							</a>
						<?php } ?>
					</div>
				</div>
			<?php }
		}
		?>
	</div>
	<?php ashtanga_core_template_part( 'content', 'templates/swiper-nav', '', $params ); ?>
	<?php ashtanga_core_template_part( 'content', 'templates/swiper-pag', '', $params ); ?>
	<div class="qodef-e-logo">
		<?php echo wp_get_attachment_image( $logo, 'full', '' ); ?>
	</div>
</div>

