<?php
$video_meta      = get_post_meta( get_the_ID(), 'qodef_post_format_video_url', true );
$blog_list_image = get_post_meta( get_the_ID(), 'qodef_blog_list_image', true );
$has_image       = ! empty( $blog_list_image ) || has_post_thumbnail();

if ( ! empty( $video_meta ) ) {

	if ( $has_image ) {
		ashtanga_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/image', 'video', $params );
	} else {
		// Video player settings
		$settings = apply_filters(
			'ashtanga_filter_video_post_format_settings',
			array(
				'width'  => 1100, // Aspect ration is 16:9
				'height' => round( 1100 * 9 / 16 ),
				'loop'   => true,
			)
		);

		$oembed = wp_oembed_get( $video_meta );
		if ( ! empty( $oembed ) ) {
			echo wp_oembed_get( $video_meta, $settings ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		} else { ?>
			<div class="qodef-e-media-video">
				<?php
				// Init video player
				echo wp_video_shortcode( array_merge( array( 'src' => esc_url( $video_meta ) ), $settings ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				?>
			</div>
		<?php }
	}
} else {
	// Include featured image
	ashtanga_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/image', '', $params );
}
