<?php if ( ! empty( $item['time'] ) ) : ?>
	<span class="qodef-e-event-list-time">
		<?php echo qode_framework_wp_kses_html( 'content', $item['time'] ); ?>
	</span>
<?php endif; ?>
