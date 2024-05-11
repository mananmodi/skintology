<?php

include_once ASHTANGA_CORE_INC_PATH . '/social-share/shortcodes/social-share/class-ashtangacore-social-share-shortcode.php';

foreach ( glob( ASHTANGA_CORE_INC_PATH . '/social-share/shortcodes/social-share/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
