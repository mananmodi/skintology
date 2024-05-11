<?php

include_once ASHTANGA_CORE_INC_PATH . '/blog/shortcodes/blog-list/class-ashtangacore-blog-list-shortcode.php';

foreach ( glob( ASHTANGA_CORE_INC_PATH . '/blog/shortcodes/blog-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
