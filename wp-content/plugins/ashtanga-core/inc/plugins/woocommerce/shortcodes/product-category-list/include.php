<?php

include_once ASHTANGA_CORE_PLUGINS_PATH . '/woocommerce/shortcodes/product-category-list/media-custom-fields.php';
include_once ASHTANGA_CORE_PLUGINS_PATH . '/woocommerce/shortcodes/product-category-list/class-ashtangacore-product-category-list-shortcode.php';

foreach ( glob( ASHTANGA_CORE_PLUGINS_PATH . '/woocommerce/shortcodes/product-category-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
