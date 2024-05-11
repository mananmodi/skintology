<?php
$short_description = get_post_meta( get_the_ID(), 'qodef_timetable_events_showcase_short_description', true );

if ( '' !== $short_description ) { ?>
	<div itemprop="description" class="qodef-e-short-description"><?php echo esc_html( $short_description ); ?></div>
<?php }
