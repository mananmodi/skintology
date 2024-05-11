<?php

include_once ASHTANGA_CORE_SHORTCODES_PATH . '/pricing-table/class-ashtangacore-pricing-table-shortcode.php';

foreach ( glob( ASHTANGA_CORE_SHORTCODES_PATH . '/pricing-table/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
