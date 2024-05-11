<article <?php post_class( 'qodef-blog-item qodef-e' ); ?>>
	<div class="qodef-e-inner">
		<?php
		// Include post media
		if ( ashtanga_post_has_media() ) {
			ashtanga_template_part( 'blog', 'templates/parts/post-info/media', 'date-on-image' );
		} else {
			ashtanga_template_part( 'blog', 'templates/parts/post-info/media' );
		}
		?>
		<div class="qodef-e-content">
			<div class="qodef-e-top-holder">
				<div class="qodef-e-info qodef-e-info-cat">
					<?php
					// Include post category info
					ashtanga_template_part( 'blog', 'templates/parts/post-info/author' );

					// Include post category info
					ashtanga_template_part( 'blog', 'templates/parts/post-info/categories' );

					if ( ! ashtanga_post_has_media() ) {
						ashtanga_template_part( 'blog', 'templates/parts/post-info/date' );
					}
					?>
				</div>
			</div>
			<div class="qodef-e-text">
				<?php
				// Include post title
				ashtanga_template_part( 'blog', 'templates/parts/post-info/title', '', array( 'title_tag' => 'h2' ) );

				// Include post excerpt
				ashtanga_template_part( 'blog', 'templates/parts/post-info/excerpt' );

				// Hook to include additional content after blog single content
				do_action( 'ashtanga_action_after_blog_single_content' );
				?>
			</div>
			<div class="qodef-e-bottom-holder">
				<div class="qodef-e-left">
					<?php
					// Include post read more
					ashtanga_template_part( 'blog', 'templates/parts/post-info/read-more' );
					?>
				</div>
				<div class="qodef-e-right qodef-e-info">
					<?php
					// Include post social share
					ashtanga_template_part( 'blog', 'templates/parts/post-info/social-share' );
					?>
				</div>
			</div>
		</div>
	</div>
</article>
