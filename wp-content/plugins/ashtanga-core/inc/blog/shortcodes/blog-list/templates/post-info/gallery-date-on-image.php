<?php
$gallery_meta = get_post_meta( get_the_ID(), 'qodef_post_format_gallery_images', true );

if ( ! empty( $gallery_meta ) ) { ?>
	<div class="qodef-e-media-gallery qodef-swiper-container">
		<div class="swiper-wrapper">
			<?php
			$gallery_images = explode( ',', $gallery_meta );

			foreach ( $gallery_images as $image_id ) {
				?>
				<div class="qodef-e-media-gallery-item swiper-slide">
					<?php if ( ! is_single() ) { ?>
					<a itemprop="url" href="<?php the_permalink(); ?>">
						<?php } ?>
						<?php echo wp_get_attachment_image( $image_id, 'full' ); ?>
						<?php if ( ! is_single() ) { ?>
					</a>
				<?php } ?>
				</div>
			<?php } ?>
		</div>
		<div class="qodef-swiper-nav-holder">
			<div class="swiper-button-prev"><?php ashtanga_core_render_svg_icon( 'pagination-arrow-left' ); ?></div>
			<div class="swiper-button-next"><?php ashtanga_core_render_svg_icon( 'pagination-arrow-right' ); ?></div>
		</div>
		<div class="qodef-e-date-on-image">
			<?php // Include post date info
			ashtanga_core_theme_template_part( 'blog', 'templates/parts/post-info/date-short' ); ?>
		</div>
	</div>
<?php } else {
	// Include featured image
	ashtanga_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/image', 'date-on-image', $params );
} ?>
