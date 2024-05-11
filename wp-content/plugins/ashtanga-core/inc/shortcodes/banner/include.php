<?php

include_once ASHTANGA_CORE_SHORTCODES_PATH . '/banner/class-ashtangacore-banner-shortcode.php';

foreach ( glob( ASHTANGA_CORE_INC_PATH . '/shortcodes/banner/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
