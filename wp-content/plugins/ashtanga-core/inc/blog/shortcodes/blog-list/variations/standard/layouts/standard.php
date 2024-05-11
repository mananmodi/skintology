<article <?php post_class( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<?php
		// Include post media
		if ( ashtanga_core_post_has_media() ) {
			ashtanga_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/media', 'date-on-image', $params );
		} else {
			ashtanga_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/media', '', $params );
		}
		?>
		<div class="qodef-e-content">
			<div class="qodef-e-top-holder">
				<div class="qodef-e-info qodef-e-info-cat">
					<?php
					// Include post author info
					ashtanga_core_theme_template_part( 'blog', 'templates/parts/post-info/author' );

					// Include post category info
					ashtanga_core_theme_template_part( 'blog', 'templates/parts/post-info/categories' );

					// Include post data info
					if ( ! ashtanga_core_post_has_media() ) {
						ashtanga_core_theme_template_part( 'blog', 'templates/parts/post-info/date' );
					}
					?>
				</div>
			</div>
			<div class="qodef-e-text">
				<?php
				// Include post title
				ashtanga_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/title', '', $params );

				// Include post excerpt
				ashtanga_core_theme_template_part( 'blog', 'templates/parts/post-info/excerpt', '', $params );

				// Hook to include additional content after blog single content
				do_action( 'ashtanga_action_after_blog_single_content' );
				?>
			</div>
			<div class="qodef-e-bottom-holder">
				<div class="qodef-e-left">
					<?php
					// Include post read more
					ashtanga_core_theme_template_part( 'blog', 'templates/parts/post-info/read-more' );
					?>
				</div>
				<div class="qodef-e-right qodef-e-info">
					<?php
					// Include post social share
					ashtanga_core_theme_template_part( 'blog', 'templates/parts/post-info/social-share' );
					?>
				</div>
			</div>
		</div>
	</div>
</article>

