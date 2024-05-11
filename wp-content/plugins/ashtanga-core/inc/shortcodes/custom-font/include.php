<?php

include_once ASHTANGA_CORE_SHORTCODES_PATH . '/custom-font/class-ashtangacore-custom-font-shortcode.php';

foreach ( glob( ASHTANGA_CORE_SHORTCODES_PATH . '/custom-font/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
