<?php if ( ! empty( $item['author_name'] ) ) : ?>
	<span class="qodef-m-author-name">
		<?php echo qode_framework_wp_kses_html( 'content', $item['author_name'] ); ?>
	</span>
<?php endif; ?>
