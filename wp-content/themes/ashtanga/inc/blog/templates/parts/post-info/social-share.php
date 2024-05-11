<?php
$social_share_enabled = 'yes' === ashtanga_get_post_value_through_levels( 'qodef_blog_enable_social_share' );

if ( class_exists( 'AshtangaCore_Social_Share_Shortcode' ) && $social_share_enabled ) { ?>
	<div class="qodef-e-info-item qodef-e-info-social-share">
		<?php
		$params = array(
			'layout' => 'text',
			'title'  => '',
		);

		echo AshtangaCore_Social_Share_Shortcode::call_shortcode( $params );
		?>
	</div>
<?php } ?>
