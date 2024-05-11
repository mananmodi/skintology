<div class="qodef-woo-product-list-slider">
	<div <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_style( $holder_styles ); ?> <?php qode_framework_inline_attr( $slider_attr, 'data-options' ); ?>>
	<ul class="swiper-wrapper">
		<?php
		// Include items
		ashtanga_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/loop', '', $params );
		?>
	</ul>
	<?php ashtanga_core_template_part( 'content', 'templates/swiper-pag', '', $params ); ?>
</div>
<?php if ( 'no' !== $slider_navigation ) { ?>
	<?php ashtanga_core_template_part( 'content', 'templates/swiper-nav', '', $params ); ?>
<?php } ?>
</div>

