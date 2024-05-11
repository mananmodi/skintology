<button type="submit" <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_attrs( $data_attrs ); ?> <?php qode_framework_inline_style( $styles ); ?>>
	<span class="qodef-btn-text"><?php echo esc_html( $text ); ?></span>
	<?php echo ashtanga_core_get_svg_icon( 'button-arrow', 'qodef-m-arrow' ); ?>
</button>
