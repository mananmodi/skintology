<?php

include_once ASHTANGA_CORE_SHORTCODES_PATH . '/image-with-text/class-ashtangacore-image-with-text-shortcode.php';

foreach ( glob( ASHTANGA_CORE_SHORTCODES_PATH . '/image-with-text/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
