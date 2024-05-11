<?php

include_once ASHTANGA_CORE_PLUGINS_PATH . '/woocommerce/shortcodes/product-list/class-ashtangacore-product-list-shortcode.php';

foreach ( glob( ASHTANGA_CORE_PLUGINS_PATH . '/woocommerce/shortcodes/product-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
