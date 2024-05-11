<div <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_style( $holder_styles ); ?> <?php qode_framework_inline_attr( $slider_attr, 'data-options' ); ?>>
	<div class="swiper-wrapper">
		<?php
		// Include items
		if ( ! empty( $items ) ) {
			foreach ( $items as $item ) {
				ashtanga_core_template_part( 'shortcodes/video-gallery', 'templates/parts/video', '', array_merge( $params, array( 'item' => $item ) ) );
			}
		}
		?>
	</div>
	<?php ashtanga_core_template_part( 'content', 'templates/swiper-nav', '', $params ); ?>
	<?php ashtanga_core_template_part( 'content', 'templates/swiper-pag', '', $params ); ?>
</div>
