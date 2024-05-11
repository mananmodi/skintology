<div class="<?php echo esc_attr( $item_classes ); ?>">
	<?php
	if ( 'open-popup' === $video_action ) {
		ashtanga_core_template_part( 'shortcodes/video-gallery', 'templates/parts/image', '', array_merge( $params, $item ) );
		ashtanga_core_template_part( 'shortcodes/video-gallery', 'templates/parts/button', '', array_merge( $params, $item ) );
		ashtanga_core_template_part( 'shortcodes/video-gallery', 'templates/parts/text', '', $item );
	} else {
		$settings = apply_filters(
			'ashtanga_filter_video_post_format_settings',
			array(
				'width'  => 1100, // Aspect ratio is 16:9
				'height' => round( 1100 * 9 / 16 ),
				'loop'   => true,
			)
		);

		$oembed = wp_oembed_get( $item['video_url'] );
		if ( ! empty( $oembed ) ) {
			echo wp_oembed_get( $item['video_url'], $settings ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		} else { ?>
			<div class="qodef-e-media-video">
				<?php
				// Init video player
				echo wp_video_shortcode( array_merge( array( 'src' => esc_url( $item['video_url'] ) ), $settings ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				?>
			</div>
			<?php
		}
	}
	?>
</div>
