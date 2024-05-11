<?php

include_once ASHTANGA_CORE_SHORTCODES_PATH . '/stacked-images/class-ashtangacore-stacked-images-shortcode.php';

foreach ( glob( ASHTANGA_CORE_SHORTCODES_PATH . '/stacked-images/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
