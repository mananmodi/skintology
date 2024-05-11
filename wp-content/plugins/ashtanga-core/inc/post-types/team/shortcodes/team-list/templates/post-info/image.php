<?php if ( has_post_thumbnail() ) {
	$images_proportion   = isset( $images_proportion ) && ! empty( $images_proportion ) ? esc_attr( $images_proportion ) : 'full';
	$custom_image_width  = isset( $custom_image_width ) && '' !== $custom_image_width ? intval( $custom_image_width ) : 0;
	$custom_image_height = isset( $custom_image_height ) && '' !== $custom_image_height ? intval( $custom_image_height ) : 0;

	$image_classes = array( 'qodef-e-media-image' );
	$image_shape   = get_post_meta( get_the_ID(), 'qodef_team_member_image_shape', true );
	if ( ! empty( $image_shape ) ) {
		$image_classes[] = 'qodef-image-shape--' . $image_shape;
	}
	?>
	<div <?php qode_framework_class_attribute( $image_classes ); ?>>
		<?php if ( $has_single ) { ?>
			<a itemprop="url" href="<?php the_permalink(); ?>">
		<?php } ?>
			<?php echo ashtanga_core_get_list_shortcode_item_image( $images_proportion, 0, $custom_image_width, $custom_image_height ); ?>
		<?php if ( $has_single ) { ?>
			</a>
		<?php } ?>
	</div>
<?php } ?>
