<?php if ( 'svg-icon' === $icon_type && ! empty ( $svg_icon ) ) { ?>
	<span class="qodef-m-icon" <?php qode_framework_inline_style( $custom_icon_styles ); ?>>
		<?php if ( ! empty( $link ) ) : ?>
			<a itemprop="url" href="<?php echo esc_url( $link ); ?>" target="<?php echo esc_attr( $target ); ?>">
		<?php endif; ?>
			<?php echo qode_framework_wp_kses_html( 'svg custom', $svg_icon ); ?>
		<?php if ( ! empty( $link ) ) : ?>
			</a>
		<?php endif; ?>
	</span>
<?php }
