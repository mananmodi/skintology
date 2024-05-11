<?php

include_once ASHTANGA_CORE_SHORTCODES_PATH . '/image-marquee/class-ashtangacore-image-marquee-shortcode.php';

foreach ( glob( ASHTANGA_CORE_INC_PATH . '/shortcodes/image-marquee/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
