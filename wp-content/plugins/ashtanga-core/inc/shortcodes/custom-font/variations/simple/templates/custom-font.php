<<?php echo esc_attr( $title_tag ); ?> <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_style( $holder_styles ); ?>  <?php qode_framework_inline_attr( $parallax_data, 'data-parallax' ); ?> <?php qode_framework_inline_attr( $parallax_touch_data, 'data-parallax-touch' ); ?>>
	<span class="qodef-custom-font-inner">
		<?php echo qode_framework_wp_kses_html( 'content', $title ); ?>
	</span>
</<?php echo esc_attr( $title_tag ); ?>>
