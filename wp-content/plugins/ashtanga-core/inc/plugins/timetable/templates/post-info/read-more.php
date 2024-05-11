<?php
// option on single timetable event to disable single
$timetable_disable_url = get_post_meta(get_the_ID(), "timetable_disable_url", true);

if ( ! post_password_required() && class_exists( 'AshtangaCore_Button_Shortcode' ) ) { ?>
	<?php if ( $timetable_disable_url !== '1' ) { ?>
		<div class="qodef-e-read-more">
			<?php
			$button_params = array(
				'link'          => get_the_permalink(),
				'button_layout' => 'textual',
				'text'          => esc_html__( 'Read More', 'ashtanga-core' )
			);
			
			echo AshtangaCore_Button_Shortcode::call_shortcode( $button_params ); ?>
		</div>
	<?php } ?>
<?php } ?>