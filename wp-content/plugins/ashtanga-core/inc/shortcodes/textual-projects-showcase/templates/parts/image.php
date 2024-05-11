<?php
$item_classes   = array();
$item_classes[] = 'elementor-repeater-item-' . $_id;
$item_classes   = implode( ' ', $item_classes );
?>
<div class="qodef-e-image <?php echo esc_attr( $item_classes ); ?>" <?php qode_framework_inline_style( $item_styles ); ?>>
	<?php
	echo wp_get_attachment_image( $item_image, 'full', false, array( 'class' => 'qodef--main' ) );
	echo wp_get_attachment_image( $item_image_hover, 'full', false, array( 'class' => 'qodef--hover' ) );
	?>
</div>
