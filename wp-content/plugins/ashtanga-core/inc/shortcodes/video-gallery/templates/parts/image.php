<?php if ( ! empty( $video_url ) ) : ?>
	<?php if ( isset( $video_icon_type ) && 'simple' === $video_icon_type ) : ?>
		<a itemprop="url" class="qodef-magnific-popup qodef-popup-item" href="<?php echo esc_url( $video_url ); ?>" data-type="iframe">
	<?php endif; ?>
	<div class="qodef-e-image">
	<?php echo wp_get_attachment_image( $video_image, 'full' ); ?>
	</div><?php	if ( isset( $video_icon_type ) && 'simple' === $video_icon_type ) : ?></a><?php endif; ?>
<?php endif; ?>
