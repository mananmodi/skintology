<?php
$categories = wp_get_post_terms(get_the_ID(), 'events_category');

if( !empty( $categories ) ) {
	?>
		<?php foreach ($categories as $cat) { ?>
			<a itemprop="url" class="qodef-e-category" href="<?php echo esc_url(get_term_link($cat->term_id)); ?>">
				<?php echo esc_html($cat->name); ?>
			</a>
		<?php } ?>
<?php } ?>
<div class="qodef-info-separator-end"></div>
