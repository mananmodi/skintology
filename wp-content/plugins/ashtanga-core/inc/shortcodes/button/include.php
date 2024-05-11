<?php

include_once ASHTANGA_CORE_SHORTCODES_PATH . '/button/class-ashtangacore-button-shortcode.php';

foreach ( glob( ASHTANGA_CORE_SHORTCODES_PATH . '/button/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
