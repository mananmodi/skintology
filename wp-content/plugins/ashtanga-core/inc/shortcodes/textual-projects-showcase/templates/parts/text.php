<?php if ( ! empty( $item_text ) ) : ?>
	<?php
	$item_text = explode( ' ', $item_text );

	$item_classes   = array();
	$item_classes[] = 'qodef-e-text';
	$item_classes[] = 'elementor-repeater-item-' . $_id;

	$item_classes = implode( ' ', $item_classes );
	?>
	<?php foreach ( $item_text as $text_fragment ) : ?>
		<span <?php qode_framework_class_attribute( $item_classes ); ?> <?php qode_framework_inline_style( $item_styles ); ?>>
			<?php echo esc_html( $text_fragment ); ?>
		</span>
	<?php endforeach; ?>
<?php endif; ?>
