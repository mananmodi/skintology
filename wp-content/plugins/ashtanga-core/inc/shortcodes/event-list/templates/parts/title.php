<?php if ( isset( $item['title'] ) && ! empty( $item['title'] ) ) { ?>
	<<?php echo esc_attr( $title_tag ); ?> class="qodef-e-title" <?php qode_framework_inline_style( $title_styles ); ?>>
	<?php if ( ! empty( $item['title_link'] ) ) : ?>
		<a itemprop="url" href="<?php echo esc_url( $item['title_link'] ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
	<?php endif; ?>
	<?php echo esc_html( $item['title'] ); ?>
	<?php if ( ! empty( $item['title_link'] ) ) : ?>
		</a>
	<?php endif; ?>
	</<?php echo esc_attr( $title_tag ); ?>>
<?php } ?>
