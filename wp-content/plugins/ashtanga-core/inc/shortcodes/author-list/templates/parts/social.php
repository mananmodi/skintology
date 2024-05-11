<?php

$author_socials = ashtanga_core_get_author_social_networks( $author_params['ID'] );

if ( ! empty( $author_socials ) ) {
	?>
	<div class="qodef-e-social-icons">
		<?php foreach ( $author_socials as $social ) { ?>
			<a itemprop="url" class="<?php echo esc_attr( $social['class'] ); ?>" href="<?php echo esc_url( $social['url'] ); ?>" target="_blank">
				<span><?php echo esc_html( $social['text'] ); ?></span>
			</a>
		<?php } ?>
	</div>
<?php } ?>
