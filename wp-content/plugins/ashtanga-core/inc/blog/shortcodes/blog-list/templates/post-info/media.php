<div class="qodef-e-media">
	<?php
	switch ( get_post_format() ) {
		case 'gallery':
			ashtanga_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/gallery', '', $params );
			break;
		case 'video':
			ashtanga_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/video', '', $params );
			break;
		case 'audio':
			ashtanga_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/audio', '', $params );
			break;
		default:
			ashtanga_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/image', '', $params );
			break;
	}
	?>
</div>
