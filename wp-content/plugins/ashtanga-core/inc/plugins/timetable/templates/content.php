<?php
// Hook to include additional content before page content holder
do_action( 'ashtanga_core_action_before_event_content_holder' );
?>
	<main id="qodef-page-content" class="qodef-grid qodef-layout--template <?php echo esc_attr( ashtanga_core_get_page_grid_sidebar_classes() ); ?> <?php echo esc_attr( ashtanga_core_get_grid_gutter_classes() ); ?>" <?php echo ashtanga_core_get_grid_gutter_styles(); ?>>
		<div class="qodef-grid-inner">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<div class="qodef-event qodef-grid-item <?php echo esc_attr( ashtanga_core_get_page_content_sidebar_classes() ); ?>">
					<div class="qodef-media-holder">
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="qodef-media-image">
								<?php the_post_thumbnail( 'full' ); ?>
							</div>
						<?php endif; ?>
					</div>
					<div class="qodef-content">
						<?php the_content(); ?>
					</div>
				</div>
			<?php endwhile; ?>
			<?php
			// Include page content sidebar
			ashtanga_core_theme_template_part( 'sidebar', 'templates/sidebar' );
			?>
		</div>
	</main>
<?php
// Hook to include additional content after main page content holder
do_action( 'ashtanga_core_action_after_event_content_holder' );
