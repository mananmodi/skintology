<li <?php wc_product_class( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="qodef-e-media">
				<?php ashtanga_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/image', '', $params ); ?>
				<div class="qodef-e-media-inner">
					<?php
					if ( $content_type !== 'simple' ) {
						ashtanga_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/add-to-cart' );
					}
					// Hook to include additional content inside product list item image
					do_action( 'ashtanga_core_action_product_list_item_additional_hover_content' );
					?>
				</div>
				<?php ashtanga_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/link' ); ?>
			</div>
		<?php } ?>
		<div class="qodef-e-content">
			<div class="qodef-woo-product-title-holder">
				<?php ashtanga_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/title', '', $params ); ?>
				<div class="qodef-price-holder">
					<?php ashtanga_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/price', '', $params ); ?>
					<?php if ( $content_type === 'simple' ) {
						ashtanga_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/add-to-cart' );
					} ?>
				</div>
			</div>
			<div class="qodef-e-info-holder">
				<div class="qodef-e-info">
					<?php
					// Include post category info
					ashtanga_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/categories', '', $params );
					?>
				</div>
			</div>
			<?php ashtanga_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/rating', '', $params ); ?>
			<?php
			// Hook to include additional content inside product list item content
			do_action( 'ashtanga_core_action_product_list_item_additional_content' );
			?>
		</div>
	</div>
</li>
