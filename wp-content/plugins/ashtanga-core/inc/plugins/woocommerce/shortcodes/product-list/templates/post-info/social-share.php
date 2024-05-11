<?php
$social_share_enabled = 'yes' === ashtanga_core_get_post_value_through_levels( 'qodef_woo_enable_social_share' );
$social_share_layout  = ashtanga_core_get_post_value_through_levels( 'qodef_social_share_layout' );

if ( class_exists( 'AshtangaCore_Social_Share_Shortcode' ) && $social_share_enabled ) { ?>
	<div class="qodef-woo-product-social-share">
		<?php
		$params = array(
			'title'  => esc_html__( 'Share:', 'ashtanga-core' ),
			'layout' => $social_share_layout,
		);

		echo AshtangaCore_Social_Share_Shortcode::call_shortcode( $params );
		?>
	</div>
<?php } ?>
