<?php

include_once ASHTANGA_CORE_SHORTCODES_PATH . '/text-marquee/class-ashtangacore-text-marquee-shortcode.php';

foreach ( glob( ASHTANGA_CORE_INC_PATH . '/shortcodes/text-marquee/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
