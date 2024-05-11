<div <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_style( $holder_styles ); ?>>
	<div class="qodef-grid-inner">
		<?php
		// include global masonry template from theme
		ashtanga_core_theme_template_part( 'masonry', 'templates/sizer-gutter', '', $params['behavior'] );

		// include items
		if ( ! empty( $items ) ) {
			foreach ( $items as $item ) {
				ashtanga_core_template_part( 'shortcodes/video-gallery', 'templates/parts/video', '', array_merge( $params, array( 'item' => $item ) ) );
			}
		}
		?>
	</div>
</div>
