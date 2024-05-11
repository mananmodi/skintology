<?php

include_once ASHTANGA_CORE_SHORTCODES_PATH . '/single-image/class-ashtangacore-single-image-shortcode.php';

foreach ( glob( ASHTANGA_CORE_SHORTCODES_PATH . '/single-image/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
