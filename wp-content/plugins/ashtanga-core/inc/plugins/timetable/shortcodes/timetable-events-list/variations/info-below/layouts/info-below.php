<article <?php post_class( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<div class="qodef-e-img-holder">
			<?php ashtanga_core_template_part( 'plugins/timetable', 'templates/post-info/image', '', $params ); ?>
		</div>
		<div class="qodef-e-bottom-holder">
			<?php ashtanga_core_template_part( 'plugins/timetable', 'templates/post-info/title', 'info-below', $params ); ?>
			<?php ashtanga_core_template_part( 'plugins/timetable', 'templates/post-info/excerpt', '', $params ); ?>
			<?php ashtanga_core_template_part( 'plugins/timetable', 'templates/post-info/read-more', '', $params ); ?>
		</div>
	</div>
</article>
