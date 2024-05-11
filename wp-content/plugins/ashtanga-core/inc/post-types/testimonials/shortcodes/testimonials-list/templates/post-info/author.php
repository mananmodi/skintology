<?php
$author     = get_post_meta( get_the_ID(), 'qodef_testimonials_author', true );
$author_job = get_post_meta( get_the_ID(), 'qodef_testimonials_author_job', true );

if ( ! empty( $author ) ) { ?>
	<div class="qodef-e-author">
		<div class="qodef-e-author-name"><?php echo esc_html( $author ); ?></div>
		<?php if ( ! empty( $author_job ) ) { ?>
			<div class="qodef-e-author-job"><?php echo esc_html( $author_job ); ?></div>
		<?php } ?>
	</div>
<?php } ?>
