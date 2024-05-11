<?php if ( ! empty( $item['title_link'] ) ) : ?>
	<div class="qodef-e-read-more">
		<a itemprop="url" href="<?php echo esc_url( $item['title_link'] ); ?>" target="_self">
			<?php echo ashtanga_core_get_svg_icon( 'event-button-arrow', 'qodef-m-arrow' ); ?>
		</a>
	</div>
<?php endif; ?>
