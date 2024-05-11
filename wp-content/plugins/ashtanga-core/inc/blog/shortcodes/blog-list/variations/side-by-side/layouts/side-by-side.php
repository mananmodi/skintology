<article <?php post_class( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<?php
		// Include post media
		ashtanga_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/media', 'image', $params );
		?>
		<div class="qodef-e-content">
			<div class="qodef-e-text">
				<?php
				// Include post title
				ashtanga_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/title', '', $params );
				?>
			</div>
			<div class="qodef-e-bottom-holder">
				<div class="qodef-e-info">
					<?php
					// Include post category info
					ashtanga_core_theme_template_part( 'blog', 'templates/parts/post-info/date' );
					?>
				</div>
			</div>
		</div>
	</div>
</article>
