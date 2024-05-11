<?php

include_once ASHTANGA_CORE_SHORTCODES_PATH . '/author-list/helper.php';
include_once ASHTANGA_CORE_SHORTCODES_PATH . '/author-list/class-ashtangacore-author-list-shortcode.php';

foreach ( glob( ASHTANGA_CORE_INC_PATH . '/shortcodes/author-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
