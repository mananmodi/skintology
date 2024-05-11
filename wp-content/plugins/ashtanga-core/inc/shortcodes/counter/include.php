<?php

include_once ASHTANGA_CORE_SHORTCODES_PATH . '/counter/class-ashtangacore-counter-shortcode.php';

foreach ( glob( ASHTANGA_CORE_SHORTCODES_PATH . '/counter/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
