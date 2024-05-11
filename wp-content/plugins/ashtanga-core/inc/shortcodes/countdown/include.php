<?php

include_once ASHTANGA_CORE_SHORTCODES_PATH . '/countdown/class-ashtangacore-countdown-shortcode.php';

foreach ( glob( ASHTANGA_CORE_SHORTCODES_PATH . '/countdown/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
