<?php

include_once ASHTANGA_CORE_SHORTCODES_PATH . '/icon-with-text/class-ashtangacore-icon-with-text-shortcode.php';

foreach ( glob( ASHTANGA_CORE_SHORTCODES_PATH . '/icon-with-text/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
