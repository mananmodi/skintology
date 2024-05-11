<?php

include_once ASHTANGA_CORE_SHORTCODES_PATH . '/call-to-action/class-ashtangacore-call-to-action-shortcode.php';

foreach ( glob( ASHTANGA_CORE_SHORTCODES_PATH . '/call-to-action/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
