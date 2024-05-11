<div <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_style( $holder_styles ); ?>>
	<div class="qodef-grid-inner">
		<?php
		// include global masonry template from theme
		ashtanga_core_theme_template_part( 'masonry', 'templates/sizer-gutter', '', $params['behavior'] );

		// include items
		if ( ! empty( $images ) ) {
			foreach ( $images as $image ) {

				// override image size w/ attachment meta value if masonry fixed - begin
				if ( 'fixed' === $masonry_images_proportion ) {
					$image_size_meta = ashtanga_core_get_custom_image_size_meta( 'attachment', 'qodef_image_gallery_masonry_size', $image['image_id'] );

					$image['image_size']   = $image_size_meta['size'];
					$image['item_classes'] = $item_classes . ' ' . $image_size_meta['class'];
				}
				// override image size w/ attachment meta value if masonry fixed - end

				ashtanga_core_template_part( 'shortcodes/image-gallery', 'templates/parts/image', '', array_merge( $params, $image ) );
			}
		}
		?>
	</div>
</div>
