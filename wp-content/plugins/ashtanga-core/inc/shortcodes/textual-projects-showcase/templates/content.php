<div <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_style( $holder_styles ); ?>>
	<?php
	foreach ( $items as $item ) {
		$item_styles         = $this_shortcode->get_item_styles( $item );
		$item['item_styles'] = $item_styles;
		if ( 'text' === $item['item_type'] ) {
			ashtanga_core_template_part( 'shortcodes/textual-projects-showcase', 'templates/parts/text', '', $item );
		}
		if ( 'image' === $item['item_type'] ) {
			ashtanga_core_template_part( 'shortcodes/textual-projects-showcase', 'templates/parts/image', '', $item );
		}
	}
	?>
</div>
