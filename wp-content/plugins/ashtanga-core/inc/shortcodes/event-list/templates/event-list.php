<div <?php qode_framework_class_attribute( $holder_classes ); ?>>
	<div class="qodef-e-event-list-item-dafault">
		<div class="qodef-e-event-list-items-dafault">
			<div class="qodef-e-event-title"><?php echo esc_html__('class', 'ashtanga-core'); ?></div>
			<div class="qodef-e-event-list-time"><?php echo esc_html__('time', 'ashtanga-core'); ?></div>
			<div class="qodef-e-event-list-day"><?php echo esc_html__('day', 'ashtanga-core'); ?></div>
			<div class="qodef-e-read-more"></div>
		</div>
	</div>
	<?php if ( ! empty( $items ) ) { ?>
		<?php foreach ( $items as $key => $item ) : ?>
		<div class="qodef-e-event-list-item">
			<div class="qodef-e-event-list-items">
				<div class="qodef-e-event-title">
					<?php ashtanga_core_template_part( 'shortcodes/event-list', 'templates/parts/title', '', array_merge( $params, array( 'item' => $item ) ) ); ?>
					<div class="qodef-e-event-image">
						<?php ashtanga_core_template_part( 'shortcodes/event-list', 'templates/parts/image', '', $item ); ?>
						<?php ashtanga_core_template_part( 'shortcodes/event-list', 'templates/parts/author-name', '', array_merge( $params, array( 'item' => $item ) ) ); ?>
					</div>
				</div>
				<?php ashtanga_core_template_part( 'shortcodes/event-list', 'templates/parts/time', '', array_merge( $params, array( 'item' => $item ) ) ); ?>
				<?php ashtanga_core_template_part( 'shortcodes/event-list', 'templates/parts/day', '', array_merge( $params, array( 'item' => $item ) ) ); ?>
				<?php ashtanga_core_template_part( 'shortcodes/event-list', 'templates/parts/button', '', array_merge( $params, array( 'item' => $item ) ) ); ?>
			</div>
		</div>
		<?php endforeach; ?>
	<?php } ?>
</div>
