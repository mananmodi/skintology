<article <?php post_class( 'qodef-blog-item qodef-e' ); ?>>
	<div class="qodef-e-inner">
		<?php
		// Include post format part
		ashtanga_template_part( 'blog', 'templates/parts/post-format/link' );
		?>
		<div class="qodef-e-content">
			<div class="qodef-e-top-holder">
				<div class="qodef-e-info qodef-e-info-cat">
					<?php
					// Include post category info
					ashtanga_template_part( 'blog', 'templates/parts/post-info/author' );

					// Include post category info
					ashtanga_template_part( 'blog', 'templates/parts/post-info/categories' );

					// Include post date
					ashtanga_template_part( 'blog', 'templates/parts/post-info/date' );
					?>
				</div>
				<div class="qodef-e-text">
					<?php
					// Include post content
					the_content();

					// Hook to include additional content after blog single content
					do_action( 'ashtanga_action_after_blog_single_content' );
					?>
				</div>
				<div class="qodef-e-bottom-holder">
					<div class="qodef-e-left qodef-e-info qodef-e-info-tags">
						<?php
						// Include post social share
						ashtanga_template_part( 'blog', 'templates/parts/post-info/tags' );
						?>
					</div>
					<div class="qodef-e-right qodef-e-info">
						<?php
						// Include post tags info
						ashtanga_template_part( 'blog', 'templates/parts/post-info/social-share' );
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</article>
