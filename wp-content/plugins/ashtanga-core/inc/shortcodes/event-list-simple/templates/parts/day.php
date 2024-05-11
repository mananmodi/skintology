<?php if ( ! empty( $item['day'] ) ) : ?>
	<span class="qodef-e-event-list-simple-day">
		<?php echo qode_framework_wp_kses_html( 'content', $item['day'] ); ?>
	</span>
<?php endif; ?>
