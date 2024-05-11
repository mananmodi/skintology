<div class="qodef-e-media">
	<?php
	switch ( get_post_format() ) {
		case 'gallery':
			ashtanga_template_part( 'blog', 'templates/parts/post-format/gallery' );
			break;
		case 'video':
			ashtanga_template_part( 'blog', 'templates/parts/post-format/video' );
			break;
		case 'audio':
			ashtanga_template_part( 'blog', 'templates/parts/post-format/audio' );
			break;
		default:
			ashtanga_template_part( 'blog', 'templates/parts/post-info/image' );
			break;
	}
	?>
</div>
