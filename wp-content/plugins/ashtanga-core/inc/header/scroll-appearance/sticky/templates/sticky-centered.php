<div class="qodef-header-sticky qodef-custom-header-layout <?php echo implode( ' ', apply_filters( 'ashtanga_core_filter_sticky_header_class', array() ) ); ?>">
	<div class="qodef-header-sticky-inner <?php echo implode( ' ', apply_filters( 'ashtanga_filter_header_inner_class', array(), 'sticky' ) ); ?>">
		<div class="qodef-header-wrapper">
			<div class="qodef-header-logo">
				<?php
				// Include logo
				ashtanga_core_get_header_logo_image( array( 'sticky_logo' => true ) ); ?>
			</div>
			<?php ashtanga_core_get_header_widget_area( 'two', 'sticky-header-widget-area', 'sticky' ); ?>

			<?php // Include main navigation
			ashtanga_core_template_part( 'header', 'templates/parts/navigation', '', array( 'menu_id' => 'qodef-sticky-navigation-menu' ) );

			// Include widget area one
			ashtanga_core_get_header_widget_area( 'one', 'sticky-header-widget-area', 'sticky' ); ?>
		</div>

		<?php do_action( 'ashtanga_core_action_after_sticky_header' ); ?>
	</div>
</div>