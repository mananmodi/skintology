<?php

include_once ASHTANGA_CORE_SHORTCODES_PATH . '/tabs/class-ashtangacore-tab-shortcode.php';
include_once ASHTANGA_CORE_SHORTCODES_PATH . '/tabs/class-ashtangacore-tab-child-shortcode.php';

foreach ( glob( ASHTANGA_CORE_SHORTCODES_PATH . '/tabs/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
