<?php
// Hook to include additional content before page content holder
do_action( 'ashtanga_action_before_page_content_holder' );
?>
<main id="qodef-page-content" class="qodef-grid qodef-layout--template <?php echo esc_attr( ashtanga_get_page_grid_sidebar_classes() ); ?> <?php echo esc_attr( ashtanga_get_grid_gutter_classes() ); ?>" <?php echo ashtanga_get_grid_gutter_styles(); ?> role="main">
	<div class="qodef-grid-inner">
		<?php
		// Include page content loop
		ashtanga_template_part( 'content', 'templates/parts/loop' );

		// Include page content sidebar
		ashtanga_template_part( 'sidebar', 'templates/sidebar' );
		?>
	</div>
</main>
<?php
// Hook to include additional content after main page content holder
do_action( 'ashtanga_action_after_page_content_holder' );
?>
