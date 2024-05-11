<?php if ( ! empty( $video_url ) ) { ?>
	<a itemprop="url" class="qodef-m-play qodef-magnific-popup qodef-popup-item" href="<?php echo esc_url( $video_url ); ?>" data-type="iframe">
		<span class="qodef-m-play-inner">
			<?php
			if ( isset( $video_icon_type ) && 'simple' === $video_icon_type ) {
				echo ashtanga_core_get_svg_icon( 'play-simple' );
			} else {
				echo ashtanga_core_get_svg_icon( 'play' );
			}
			?>
		</span>
	</a>
<?php } ?>
