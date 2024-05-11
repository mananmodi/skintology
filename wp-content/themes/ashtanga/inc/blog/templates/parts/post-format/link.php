<?php
$link_url_meta  = get_post_meta( get_the_ID(), 'qodef_post_format_link', true );
$link_url       = ! empty( $link_url_meta ) ? $link_url_meta : get_the_permalink();
$link_text_meta = get_post_meta( get_the_ID(), 'qodef_post_format_link_text', true );

if ( ! empty( $link_url ) ) {
	$link_text = ! empty( $link_text_meta ) ? $link_text_meta : get_the_title();
	$title_tag = isset( $title_tag ) && ! empty( $title_tag ) ? $title_tag : 'h5';
	?>

	<?php
	$blog_list_image_id = get_post_meta( get_the_ID(), 'qodef_blog_list_image', true );
	$has_featured = ! empty( $blog_list_image_id ) || has_post_thumbnail();

	$bg_image_styles = '';

	if ( $has_featured ) {

		if ( ! empty( $blog_list_image_id ) ) {
			$bg_image_url = wp_get_attachment_image_src( $blog_list_image_id, 'full' );
		} else {
			$bg_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
		}

		$bg_image_styles .= ' background-image: url(' . $bg_image_url[0] . ');';
		$bg_image_styles .= ' background-repeat: no-repeat;';
		$bg_image_styles .= ' background-size: cover;';
		$bg_image_styles .= ' background-position-x: right;';
	}
	?>

	<div class="qodef-e-link">
	<div class="qodef-image-holder" style="<?php echo esc_attr( $bg_image_styles ); ?>"></div>
	<div class="qodef-e-link-mark"><?php ashtanga_render_svg_icon( 'link', 'qodef-e-link-icon' ); ?></div>
	<div class="qodef-e-link-content">
		<<?php echo esc_attr( $title_tag ); ?> class="qodef-e-link-text"><?php echo esc_html( $link_text ); ?></<?php echo esc_attr( $title_tag ); ?>>
	</div>
	<a itemprop="url" class="qodef-e-link-url" href="<?php echo esc_url( $link_url ); ?>" target="_blank"></a>
	</div>
<?php } ?>
