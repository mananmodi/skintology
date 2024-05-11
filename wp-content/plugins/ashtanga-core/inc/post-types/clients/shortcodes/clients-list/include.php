<?php

include_once ASHTANGA_CORE_CPT_PATH . '/clients/shortcodes/clients-list/class-ashtangacore-clients-list-shortcode.php';

foreach ( glob( ASHTANGA_CORE_CPT_PATH . '/clients/shortcodes/clients-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
