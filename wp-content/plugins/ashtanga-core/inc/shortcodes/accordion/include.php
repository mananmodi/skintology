<?php

include_once ASHTANGA_CORE_SHORTCODES_PATH . '/accordion/class-ashtangacore-accordion-shortcode.php';
include_once ASHTANGA_CORE_SHORTCODES_PATH . '/accordion/class-ashtangacore-accordion-child-shortcode.php';

foreach ( glob( ASHTANGA_CORE_SHORTCODES_PATH . '/accordion/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
