<div <?php qode_framework_class_attribute( $holder_classes ); ?>>
	<?php if ( ! empty( $items ) ) { ?>
		<?php foreach ( $items as $key => $item ) : ?>
		<div class="qodef-e-event-list-simple-item">
			<div class="qodef-e-event-list-simple-items">
				<div class="qodef-e-event-title">
					<?php ashtanga_core_template_part( 'shortcodes/event-list-simple', 'templates/parts/title', '', array_merge( $params, array( 'item' => $item ) ) ); ?>
				</div>
				<?php ashtanga_core_template_part( 'shortcodes/event-list-simple', 'templates/parts/time', '', array_merge( $params, array( 'item' => $item ) ) ); ?>
				<?php ashtanga_core_template_part( 'shortcodes/event-list-simple', 'templates/parts/day', '', array_merge( $params, array( 'item' => $item ) ) ); ?>
				<?php ashtanga_core_template_part( 'shortcodes/event-list-simple', 'templates/parts/button', '', array_merge( $params, array( 'item' => $item ) ) ); ?>
			</div>
		</div>
		<?php endforeach; ?>
	<?php } ?>
</div>
