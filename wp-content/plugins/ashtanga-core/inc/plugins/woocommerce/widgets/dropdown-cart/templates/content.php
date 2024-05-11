<?php if ( is_object( WC()->cart ) ) { ?>
	<div class="qodef-widget-dropdown-cart-content">
		<?php
		// Hook to include additional content before cart items
		do_action( 'ashtanga_core_action_woocommerce_before_side_area_cart_content' );

		if ( ! WC()->cart->is_empty() ) {
			ashtanga_core_template_part( 'plugins/woocommerce/widgets/dropdown-cart', 'templates/parts/loop' );

			ashtanga_core_template_part( 'plugins/woocommerce/widgets/dropdown-cart', 'templates/parts/order-details' );

			ashtanga_core_template_part( 'plugins/woocommerce/widgets/dropdown-cart', 'templates/parts/button' );
		} else {
			// Include posts not found
			ashtanga_core_template_part( 'plugins/woocommerce/widgets/dropdown-cart', 'templates/parts/posts-not-found' );
		}
		?>
	</div>
<?php } ?>
