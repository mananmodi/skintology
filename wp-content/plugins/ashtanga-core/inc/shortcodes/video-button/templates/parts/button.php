<?php if ( ! empty( $video_link ) ) { ?>
	<a itemprop="url" class="qodef-m-play qodef-magnific-popup qodef-popup-item"
	   href="<?php echo esc_url( $video_link ); ?>" data-type="iframe">
		<span class="qodef-m-play-inner" <?php echo qode_framework_get_inline_style( $play_button_styles ); ?>>
			<?php echo ashtanga_core_get_svg_icon( 'play' ); ?>
		</span>
	</a>
<?php } ?>
