<div <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_style( $holder_styles ); ?> <?php qode_framework_inline_attr( $data_attr, 'data-options' ); ?>>
	<div class="qodef-grid-inner">
		<?php
		// Include global masonry template from theme
		ashtanga_core_theme_template_part( 'masonry', 'templates/sizer-gutter', '', $params['behavior'] );

		// Include items
		ashtanga_core_template_part( 'shortcodes/author-list', 'templates/loop', '', $params );
		?>
	</div>
	<?php
	// Include global pagination from theme
	ashtanga_core_template_part( 'shortcodes/author-list', 'templates/pagination', $params['pagination_type'], $params );
	?>
</div>
