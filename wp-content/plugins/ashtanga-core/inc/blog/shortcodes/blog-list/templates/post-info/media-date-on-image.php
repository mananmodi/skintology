<div class="qodef-e-media">
	<?php
	switch ( get_post_format() ) {
		case 'gallery':
			ashtanga_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/gallery', 'date-on-image', $params );
			break;
		case 'video':
			ashtanga_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/video', 'date-on-image', $params );
			break;
		case 'audio':
			ashtanga_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/audio', 'date-on-image', $params );
			break;
		default:
			ashtanga_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/image', 'date-on-image', $params );
			break;
	}
	?>
</div>
