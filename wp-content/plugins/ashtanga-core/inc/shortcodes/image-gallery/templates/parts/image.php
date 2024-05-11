<?php
$image_alt = '';
if ( isset( $show_image_alt_text ) && 'yes' === $show_image_alt_text ) {
	$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
}
$image_caption = '';
if ( isset( $show_image_caption ) && 'yes' === $show_image_caption ) {
	$image_caption = wp_get_attachment_caption( $image_id );
}

$image_description = '';
$attachment        = get_post( $image_id );
$image_description = $attachment->post_content;
?>
<div class="<?php echo esc_attr( $item_classes ); ?>">
	<?php if ( 'open-popup' === $image_action ) { ?>
	<a class="qodef-popup-item" itemprop="image" href="<?php echo esc_url( $url ); ?>" data-type="image">
		<?php } elseif ( 'custom-link' === $image_action && ! empty( $url ) ) { ?>
		<a itemprop="url" href="<?php echo esc_url( $url ); ?>" target="<?php echo esc_attr( $target ); ?>">
			<?php } ?>
			<?php
			if ( is_array( $image_size ) && count( $image_size ) ) {
				echo qode_framework_generate_thumbnail( $image_id, $image_size[0], $image_size[1] );
			} else {
				echo wp_get_attachment_image( $image_id, $image_size );
			}
			?>
			<?php if ( 'open-popup' === $image_action || ( 'custom-link' === $image_action && ! empty( $url ) ) ) { ?>
		</a>
	<?php } ?>
		<?php if ( ! empty( $image_alt ) || ! empty( $image_caption ) ) { ?>
			<div class="qodef-e-additional-info">
				<div class="qodef-e-additional-info-inner">
					<?php if ( ! empty( $image_alt ) ) { ?>
						<div class="qodef-e-alt-text" <?php qode_framework_inline_style( $alt_text_styles ); ?>>
							<?php echo esc_html( $image_alt ); ?>
						</div>
					<?php } ?>
					<?php if ( $image_description != '' && 'bellow' === $enable_custom_caption_layout ) { ?>
						<div class="qodef-e-description"><?php echo esc_html( $image_description ); ?></div>
					<?php } ?>
					<?php if ( ! empty( $image_caption ) ) { ?>
						<div class="qodef-e-caption" <?php qode_framework_inline_style( $caption_styles ); ?>>
							<?php echo esc_html( $image_caption ); ?>
						</div>
					<?php } ?>
				</div>
			</div>
		<?php } ?>
</div>
